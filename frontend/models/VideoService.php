<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/9/12
 * Time: 上午12:12
 */
namespace frontend\models;


use Yii;
use common\models\Video;
use common\models\VideoCategory;
use yii\data\Pagination;

class VideoService extends Video
{
    public static function getVideoList($pageSize=10)
    {
        $query = self::find();
        $query->select('v.*,vc.id,vc.cate_name');
        $query->from(['v'=>Video::tableName()]);
        $query->leftJoin(['vc'=>VideoCategory::tableName()],'v.video_cate_id=vc.id');

        if (Yii::$app->request->get('video_cate_id'))
        {
            $query->where(['video_cate_id'=>Yii::$app->request->get('video_cate_id')]);
        }

        $query->andWhere(['v.status'=>2]);

        if (Yii::$app->request->get('isNew') == '1')
        {
            $query->orderBy(['v.created_at'=>SORT_DESC]);
        }

        $query->groupBy('v.video_id');

        $pages = new Pagination(['totalCount' => $query->count()]);
        $pages->setPageSize($pageSize);
        $list = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        $data['pages'] = $pages;
        $data['list']  = $list;

        return $data;
    }

    public static function getVideoInfo($id)
    {
        $query = self::find();
        $query->select('v.*,vc.id,vc.cate_name');
        $query->from(['v'=>Video::tableName()]);
        $query->leftJoin(['vc'=>VideoCategory::tableName()],'v.video_cate_id=vc.id');
        $query->where(['v.video_id'=>$id]);
        return $query->asArray()->one();
    }
}