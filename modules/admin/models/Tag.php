<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Object;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends \app\core\back\BaseBackActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标签',
            'frequency' => '出现频率',
        ];
    }
    /**
     * 批量添加或修改tag
     * @param $tags eg: 'php,java,yii2' 用','间隔
     */
    public function addTags($tags){
    	
    	$tag_array=$this->getTagArray($tags);
    	
    	foreach($tag_array as $value){  //批量添加TAG
    		 
    		$model=Tag::find()->where(['name'=>$value])->one(); 
     
    		if($model){
    			$model->frequency=$model->frequency+1;
    		}else{ 
    			$model=new Tag();
    			$model->name=$value;
    			$model->frequency=1;
    			
    		}
    		$model->save();
    	/* 	if ( $model->save() == false )
    		{
    			print_r($model->errors);
    		
    		} */ 
    	} 
    }
    protected function getTagArray($tags){
    	$tag_array=explode(',',$tags);
    	$tag_array=array_filter($tag_array);
    	return $tag_array;
    	
    }
    
}
