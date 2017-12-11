<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\db\Query;

class SiteStat extends Widget
{
    public $title;

    public function init()
    {
        parent::init();

        if ($this->title === null) {
            $this->title = 'title';
        }
    }

    public function run()
    {
        $str = '';

        $query = new Query();
        $res = $query->select('sum(click) as click')
            ->from('pre_blog_post')->one();
        $click = $res['click'];
        $str .= '<div class="site-stat">点击数量：'.$click.'</div>';

        $postCount = $query->from('pre_blog_post')->count();
        $str .= '<div class="site-stat">文章数量：'.$postCount.'</div>';

        $commentCount = $query->from('pre_blog_comment')->count();
        $str .= '<div class="site-stat">评论数量：'.$commentCount.'</div>';

        return $this->render('portal', [
            'title' => $this->title,
            'content' => $str,
        ]);
    }
}