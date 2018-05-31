<?php

require(__DIR__ . '/lib/Colors.php');
require(__DIR__ . '/lib/Client.php');
require(__DIR__ . '/lib/Common.php');

use Beanstalk\Client;
use Common\Common;

/**
 * websocket server
 * Class WebSocket
 */
class WebSocket {
    /* @var $application */
    /* @var $runTimePath */
    /* @var $redis Redis */
    /* @var $beanstalk */
    /* @var @os */
    public static $application;
    public        $runTimePath;
    public        $colors;
    public        $redis;
    public        $beanstalk;
    public        $os;
    public        $fdTimer = [];


    /**
     * 检测并创建项目运行时目录
     *
     * @return bool
     */
    private function initRuntime() {
        $result            = true;
        $this->runTimePath = dir(__DIR__)->path . '/runtime/logs/swoole';

        if (!is_dir($this->runTimePath)) {
            if (mkdir($this->runTimePath, 0755, true)) {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    private function checkSystem() {
        return $this->os = PHP_OS;
    }

    /**
     * 连接redis
     *
     * @param $config
     */
    public function connectRedis($config = array()) {
        $redis = new redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->auth('6da192c7dd56a5ba917c59d2e723911a');
        return $this->redis = $redis;
    }

    /**
     * 获取beanstalk资源
     *
     * @return bool|string
     */
    public function connectBeanstalk() {
        $this->beanstalk = new Client(array(
            'persistent' => true, //是否长连接
            'host'       => '127.0.0.1',
            'port'       => 11300,  //端口号默认11300
            'timeout'    => 3    //连接超时时间
        ));
        if (!$this->beanstalk->connect()) {
            exit(current($this->beanstalk->errors()));
        }
        //选择使用的tube
        return $this->beanstalk->useTube('oliu.saveiMassage');
    }

    /**
     * WebSocket constructor.
     */
    public function __construct() {
        // init base setting
        $this->initRuntime();
        $this->checkSystem();
        $this->colors = new Colors();

        // init swoole_websocket_server
        $socket = new swoole_websocket_server("0.0.0.0", 9501);
        $socket->set([
            'worker_num'      => 4,
            'daemonize'       => false,
            'max_request'     => 10000,
            'debug_mode'      => 1,
            'task_worker_num' => 4,
            'dispatch_mode'   => 2,
            'log_file'        => $this->runTimePath . "/websocket.log",
        ]);

        // bind callback
        $socket->on('Start', [$this, 'onStart']);
        $socket->on('ManagerStart', [$this, 'onManagerStart']);
        $socket->on('WorkerStart', [$this, 'onWorkerStart']);
        $socket->on('Connect', [$this, 'onConnect']);
        $socket->on('Message', [$this, 'onMessage']);
        $socket->on('Task', [$this, 'onTask']);
        $socket->on('Finish', [$this, 'onFinish']);
        $socket->on('Close', [$this, 'onClose']);

        $socket->start();
    }

    /**
     * @param $server
     */
    public function onStart($server) {
        if ($this->os == 'Linux') {
            swoole_set_process_name('WebSocketMaster');
        }
        $cliNotice = "[ PID : $server->master_pid ] ----> SOCKET Server Start , Active master process ... \r\n";
        echo $this->colors->getColoredString($cliNotice, 'red');
    }

    /**
     * @param $server
     */
    public function onManagerStart($server) {
        if ($this->os == 'Linux') {
            swoole_set_process_name('WebSocketManager');
        }
        $cliNotice = "[ MID : $server->manager_pid ] ----> Active manage process ... \r\n";
        echo $this->colors->getColoredString($cliNotice, 'cyan');
    }

    /**
     * @param $server
     * @param $worker_id
     */
    public function onWorkerStart($server, $worker_id) {
        if ($this->os == 'Linux') {
            swoole_set_process_name('WebSocketWorker');
        }
        $cliNotice = "[ WID : $worker_id ] ----> initialize worker process ... \r\n";
        echo $this->colors->getColoredString($cliNotice, 'green');

        #初始化redis连接
        $this->connectRedis();
        #初始化beanstalk
        $this->connectBeanstalk();

    }

    /**
     * @param $server Swoole\WebSocket\Server
     * @param $fd
     * @param $from_id
     */
    public function onConnect($server, $fd, $from_id) {
        $cliNotice = "[ RID : $from_id ] ----> Client $fd Has been connected ... \r\n";
        echo $this->colors->getColoredString($cliNotice, 'blue');
        $server->task($fd);
    }

    /**
     * @param $server
     * @param $frame
     */
    public function onMessage($server, $frame) {
        return true;
    }

    /**
     * @return bool|mixed
     * @throws Exception
     */
    public function getData() {
        $url = 'https://api.finbtc.net/app//coin/detail/fx?coinId=2';
        $url = 'https://api.finbtc.net/app//market/trade?pairId=1188';

        $param  = [
            //            'coinId' => 2
        ];
        $header = [
            'Content-Type:application/json',
            'Accept:*/*',
            'device:9FA93315-4DD9-4AC6-86A2-A7BCF02CF651',
            'User-Agent:finbtc/1.8.1 (iPhone; iOS 11.3.1; Scale/2.00)',
            'Accept-Language:zh-Hans-CN;q=1, en-US;q=0.9',
            'X-App-Info:1.8.1/appstore/ios',
        ];
        return Common::httpRequest($url, $param, 'get', $header);
    }

    /**
     * @param $server
     * @param $fd
     */
    public function setTimer($server, $fd) {
        swoole_timer_tick(1000, function ($timer_id, $server) use ($fd) {

            if ($this->redis->get($fd.'_client')==="close")
            {
                swoole_timer_clear($timer_id);
                $this->redis->del($fd.'_client');
                exit();
            }

            $res                = $this->getData();
//            var_dump($res);
            $data               = json_decode($res, true);
            /* @var $server Swoole\WebSocket\Server */
            $server->push((int)$fd, json_encode($data['data']));
            $this->redis->set($fd.'_client','open');
        }, $server);
    }

    /**
     * @param $server Swoole\WebSocket\Server
     * @param $task_id
     * @param $src_worker_id
     * @param $data
     * @return bool
     */
    public function onTask( $server, $task_id, $src_worker_id, $fd) {
        $cliNotice = "[ WID : $src_worker_id ] ----> Execute Task , taskId:$task_id... \r\n";
        $this->setTimer($server, $fd);
        echo $this->colors->getColoredString($cliNotice, 'yellow');
    }

    /**
     * @param  $server
     * @param $task_id
     * @param $data
     */
    public function onFinish( $server, $task_id, $data) {
        $cliNotice = "[ TID : $task_id ] ----> Task Finished, Data:$data \r\n";
        echo $this->colors->getColoredString($cliNotice, 'brown');
    }

    /**
     * @param  $server
     * @param $fd
     * @param $reactorId
     */
    public function onClose( $server, $fd, $reactorId) {
        $this->redis->set($fd.'_client','close');
        $cliNotice = "[ RID : $reactorId ] ----> ClientId $fd Has been closed \r\n";
        echo $this->colors->getColoredString($cliNotice, 'brown');
    }

    /**
     * 运行程序
     *
     * @return WebSocket
     */
    public static function run() {
        if (!self::$application) {
            self::$application = new WebSocket();
        }
        return self::$application;
    }
}

WebSocket::run();