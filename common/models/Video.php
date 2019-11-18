<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property int $video_id
 * @property int $video_cate_id
 * @property string $video_name
 * @property string $video_url
 * @property string $poster
 * @property int $play_num
 * @property int $like_num
 * @property string $uploader
 * @property string $video_time
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Video extends \yii\db\ActiveRecord {

    public $tempFileUrl;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%video}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['video_cate_id', 'video_name', 'video_url', 'poster', 'play_num', 'like_num', 'uploader', 'video_time', 'created_at', 'updated_at'], 'required'],
            [['video_cate_id', 'play_num', 'like_num'], 'integer'],
            [['created_at', 'updated_at', 'status', 'sort'], 'safe'],
            [['video_name', 'video_url', 'poster', 'uploader', 'tempFileUrl'], 'string', 'max' => 255,'min'=>0],
            //[['video_name', 'video_url', 'poster', 'uploader'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'video_id'      => 'ID',
            'video_cate_id' => '分类ID',
            'video_name'    => '标题',
            'sort'          => '排序',
            'video_url'     => '视频',
            'poster'        => '视频封面',
            'play_num'      => '播放次数',
            'like_num'      => '点赞数',
            'uploader'      => '作者',
            'video_time'    => '时常',
            'status'        => '状态',
            'created_at'    => '创建时间',
            'updated_at'    => '更新时间',
        ];
    }

    /**
     * @return array
     */
    public static function getCategoryList() {
        $result = [];
        $list   = VideoCategory::find()->select(['id', 'cate_name'])->asArray()->all();
        if (!empty($list)) {
            $result = ArrayHelper::map($list, "id", "cate_name");
        }

        return $result;
    }
}
