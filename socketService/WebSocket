#!/usr/bin/env php
<?php

require(__DIR__ . '/lib/Colors.php');
require(__DIR__ . '/lib/Client.php');
use Beanstalk\Client;

class WebSocket
{
    /* @var $application */
    /* @var $runTimePath */
    /* @var $redis Redis */
    /* @var $beanstalk   */
    public static $application;
    public $runTimePath;
    public $colors;
    public $redis;
    public $beanstalk;


    /**
     * 检测并创建项目运行时目录
     * @return bool
     */
    private function initRuntime()
    {
        $result = true;
        $this->runTimePath = dir(__DIR__)->path.'/runtime/logs/swoole';

        if(!is_dir($this->runTimePath))
        {
            if (mkdir($this->runTimePath,0755,true))
            {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * 连接redis
     * @param $config
     */
    public function connectRedis($config=array()){
        $redis = new redis();
        $redis->connect('127.0.0.1', 6379);
//        $redis->auth('6da192c7dd56a5ba917c59d2e723911a');
        return $this->redis = $redis;
    }

    /**
     * 获取beanstalk资源
     * @return bool|string
     */
    public function connectBeanstalk()
    {
        $this->beanstalk = new Client(array(
            'persistent' => true, //是否长连接
            'host' => '127.0.0.1',
            'port' => 11300,  //端口号默认11300
            'timeout' => 3    //连接超时时间
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
    public function __construct()
    {
        // init base setting
        $this->initRuntime();
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
            'log_file'        => $this->runTimePath."/swoole.log",

            /**
             * 心跳检测也可使用 $server->heartbeat();
             */

            # 心跳检测
            // 'heartbeat_check_interval' => 5,
            // 'heartbeat_idle_time'      => 10,
        ]);

        // bind callback
        $socket->on('Start',        [$this, 'onStart']);
        $socket->on('ManagerStart', [$this, 'onManagerStart']);
        $socket->on('WorkerStart',  [$this, 'onWorkerStart']);
        $socket->on('Connect',      [$this, 'onConnect']);
        $socket->on('Message',      [$this, 'onMessage']);
        $socket->on('Task',         [$this, 'onTask']);
        $socket->on('Finish',       [$this, 'onFinish']);
        $socket->on('Close',        [$this, 'onClose']);

        $socket->start();
    }

    /**
     * @param $server
     */
    public function onStart($server)
    {
        swoole_set_process_name('WebSocketMaster');
        $cliNotice = "[ PID : $server->master_pid ] ----> SOCKET Server Start , Active master process ... \r\n";
        echo $this->colors->getColoredString($cliNotice,'red');
    }

    /**
     * @param $server
     */
    public function onManagerStart($server)
    {
        swoole_set_process_name('WebSocketManager');
        $cliNotice = "[ MID : $server->manager_pid ] ----> Active manage process ... \r\n";
        echo $this->colors->getColoredString($cliNotice,'cyan');
    }

    /**
     * @param $server
     * @param $worker_id
     */
    public function onWorkerStart($server,$worker_id)
    {
        swoole_set_process_name('WebSocketWorker');
        $cliNotice = "[ WID : $worker_id ] ----> initialize worker process ... \r\n";
        echo $this->colors->getColoredString($cliNotice,'green');

        #初始化redis连接
        $this->connectRedis();
        #初始化beanstalk
        $this->connectBeanstalk();

    }

    /**
     * @param $server
     * @param $fd
     * @param $from_id
     */
    public function onConnect($server,$fd,$from_id)
    {
        $cliNotice = "[ RID : $from_id ] ----> Client $fd Has been connected ... \r\n";
        echo $this->colors->getColoredString($cliNotice,'blue');
    }

    /**
     * @var $redis Redis
     * @param swoole_websocket_server $server
     * @param swoole_websocket_frame $frame
     */
    public function onMessage(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        $cliNotice = "[ CID : $frame->fd ] ----> Receive Opcode:{$frame->opcode},Fin:{$frame->finish}, Data:{$frame->data} \r\n";
        echo $this->colors->getColoredString($cliNotice,'yellow');

        //判断用户消息类型
        $res = json_decode($frame->data,true);
        switch ($res['type'])
        {
            case 'init':
                //存储用户对应fd
                $this->redis->set('oliu:im:fd:'.$res['data']['userId'],$frame->fd);
                break;

            case 'message':

                //存储用户消息
                $param['from_user_id'] = $res['data']['userId'];
                $param['to_user_id']   = $res['data']['toUserId'];
                $param['content']      = $res['data']['content'];
                $param['create_time']  = time();

                $receiveUserFd = $this->redis->get('oliu:im:fd:'.$res['data']['toUserId']);

                $isRead = 2;
                if ($server->exist($receiveUserFd))
                {
                    echo "user is online , active send message process \n";
                    $param['create_time'] = date('H:i',$param['create_time']);
                    $server->push((int)$receiveUserFd,json_encode(['type'=>'message','data'=>$param]));
                }else{
                    echo "user is not online , save message ... \n";
                    $isRead = 1;
                }

                $param['isRead'] = $isRead;
                $server->task($param);
                break;

            default:
                //nothing to do
                break;
        }
    }

    /**
     * @param swoole_websocket_server $server
     * @param $task_id
     * @param $src_worker_id
     * @param $data
     * @return bool
     */
    public function onTask(swoole_websocket_server $server, $task_id,$src_worker_id,$data)
    {
        $cliNotice = "[ WID : $src_worker_id ] ----> Execute Task , ID:$task_id... \r\n";
        echo $this->colors->getColoredString($cliNotice,'yellow');

        return $this->beanstalk->put( 23,0,60,json_encode($data) );
    }

    public function onFinish(swoole_websocket_server $server,$task_id,$data)
    {
        $cliNotice = "[ TID : $task_id ] ----> Task Finished, Data:$data \r\n";
        echo $this->colors->getColoredString($cliNotice,'brown');
    }

    /**
     * @param swoole_websocket_server $server
     * @param $fd
     * @param $reactorId
     */
    public function onClose(swoole_websocket_server $server,$fd,$reactorId)
    {
        $cliNotice = "[ RID : $reactorId ] ----> ClientId $fd Has been closed \r\n";
        echo $this->colors->getColoredString($cliNotice,'brown');
    }

    /**
     * 运行程序
     * @return WebSocket
     */
    public static function run()
    {
        if (!self::$application) {
            self::$application = new WebSocket();
        }
        return self::$application;
    }
}

WebSocket::run();