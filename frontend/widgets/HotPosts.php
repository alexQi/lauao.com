<?php
namespace frontend\widgets;

use common\models\BlogPost;
use common\models\Status;
use yii\base\Widget;

class HotPosts extends Widget
{
    public $title;
    public $maxPosts = 5;

    public function init()
    {
        parent::init();

        if ($this->title === null) {
            $this->title = 'title';
        }
    }

    public function run()
    {
        $posts = BlogPost::find()->where(['status' => Status::STATUS_ACTIVE])->orderBy(['click' => SORT_DESC])->limit($this->maxPosts)->all();

        return $this->render('recentPosts', [
            'title' => $this->title,
            'posts' => $posts,
        ]);
    }
}
