<?php

namespace app\modules\admin\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $description
 * @property integer $click
 * @property string $writer
 * @property string $termid
 * @property integer $created_p
 * @property integer $updated_p
 * @property string $tags
 * @property integer $status
 *
 * @property Term $term
 */
class Post extends \app\core\back\BaseBackActiveRecord
{
	/* public $title;
	public $content;
	public $keywords;
	public $description;
	public $click;
	public $writer;
	public $termid;
	public $created_p;
	public $updated_p;
	public $tags;
	public $status; */
	//public $term;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }
    
    public function behaviors()
    {
    	return [
    			'timestamp' =>[
    					'class' => TimestampBehavior::className(),
    					'attributes' => [
    							ActiveRecord::EVENT_BEFORE_INSERT => ['created_p','updated_p'],
    							ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_p'],
    					],
    					//'value' => new Expression('NOW()'),
    			],
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'termid','status'], 'required'],
            [['content'], 'string'],
            [['click', 'termid', 'created_p', 'updated_p', 'status'], 'integer'],
            [['title', 'keywords', 'description', 'writer', 'tags'], 'string', 'max' => 200],
            [['termid'], 'exist', 'skipOnError' => true, 'targetClass' => Term::className(), 'targetAttribute' => ['termid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'keywords' => '关键字',
            'description' => '描述',
            'click' => '点击量',
            'writer' => '作者',
            'termid' => '栏目',
            'created_p' => '创建时间',
            'updated_p' => '更新时间',
            'tags' => '标签',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Term::className(), ['id' => 'termid'])->inverseOf('posts');
    }
}
