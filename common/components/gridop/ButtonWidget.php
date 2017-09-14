<?php

namespace common\components\gridop;

use yii\base\Widget;
use yii\helpers\Html;

class ButtonWidget extends Widget
{
    public $items;

    public function run()
    {
		if(isset($this->items)){
			foreach($this->items as $val){
				$html[] = '<div class="form-group">';
				$html[] = html::button(
								isset($val['title'])?$val['title']:[],
								isset($val['options'])?$val['options']:[]
							);
				$html[] = '</div>';
			}
		}
		return implode('',$html);
	}
}

/*$str  =  'aaaa[1]a[1,2,3]aaaa[2]aaaa[3]aaa' ;

preg_match_all('/\[[0-9,]+\]/',$str,$matches);

$unique = array_unique($matches[0]);

foreach($unique as $val)
{
	$html = '<a href="https://www.baidu.com/s?wd=">'.$val.'</a>';
	$str = str_replace($val,$html,$str);
}

echo $str;*/

