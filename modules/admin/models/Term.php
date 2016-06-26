<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Object;

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
class Term extends \app\core\back\BaseBackActiveRecord
{
	/* public $parentid;
	public $name;
	public $slug; */
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
            [['parentid'], 'default','value'=>0],
            [['name', 'slug'], 'string', 'max' => 200],
        	[['name','flag','status'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => '父栏目ID',
            'name' => '栏目名称',
            'slug' => 'Slug',
            'flag' => '是否允许发布文章',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
    	//$post=new Post();
    	//$post->title;
        return $this->hasMany(Post::className(), ['termid' => 'id'])->inverseOf('term');
    }
    
    public function getTermparent($id){
    	
    	return $this->findOne($id);
    	 
    }
}
