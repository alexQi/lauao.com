<?php

namespace common\models\service;

use common\models\ApiBase;

class ApiBaseService extends ApiBase
{
    const API_FORBID = 1;
    const API_ACITVE = 2;

    /**
     * 根据条件查询api记录
     * @param  array
     * @return array
     */
    public function getApi($param)
    {
        $query = self::find();
        $query->where(['status'=>self::API_ACITVE]);
        if (isset($param['isDefault']))
        {
            $query->andWhere(['is_default'=>$param['isDefault']]);
        }else{
            if (isset($param['apiName']))
            {
                $query->andWhere(['api_name'=>$param['apiName']]);
            }else{
                if (isset($param['queryString']))
                {
                    $query->andFilterWhere(['like','invoke_string',$param['queryString']]);
                }
            }
        }

        if (isset($param['id'])){
            $query->andWhere(['id'=>$param['id']]);
        }

        return $query->asArray()->one();
    }
}
