<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%api_base}}".
 *
 * @property integer $id
 * @property string $api_name
 * @property string $url
 * @property string $url_path
 * @property string $request_method
 * @property string $query_string
 * @property string $invoke_string
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_default
 */
class ApiBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%api_base}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_name'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_default'], 'integer'],
            [['api_name', 'url', 'url_path'], 'string', 'max' => 100],
            [['request_method'], 'string', 'max' => 10],
            [['query_string'], 'string', 'max' => 50],
            [['invoke_string'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'api_name' => Yii::t('app', 'Api Name'),
            'url' => Yii::t('app', 'Url'),
            'url_path' => Yii::t('app', 'Url Path'),
            'request_method' => Yii::t('app', 'Request Method'),
            'query_string' => Yii::t('app', 'Query String'),
            'invoke_string' => Yii::t('app', 'Invoke String'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'is_default' => Yii::t('app', 'Is Default'),
        ];
    }
}