<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%term}}".
 *
 * @property string $id
 * @property string $parentid
 * @property string $name
 * @property string $slug
 *
 * @property Post[] $posts
 */
class Term extends \app\core\front\BaseFrontActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%term}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['termid' => 'id'])->inverseOf('term');
    }
    
    /**
     * 获取栏目父ID
     * @param $id 栏目id
     */
    public function getTermByParentid($id){
    	
    	return Term::find()->where(['parentid'=>$id])->all();
    	  
    }
    
}
