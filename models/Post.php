<?php

namespace app\models;

use Yii;
use yii\base\Object;

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
class Post extends \app\core\front\BaseFrontActiveRecord {
	const EVENT_ADD = 'event_add';
	const EVENT_UPDATE = 'event_update';
	const EVENT_DELETE = 'event_delete';
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%post}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'content' 
						],
						'string' 
				],
				[ 
						[ 
								'click',
								'termid',
								'created_p',
								'updated_p',
								'status' 
						],
						'integer' 
				],
				[ 
						[ 
								'termid' 
						],
						'required' 
				],
				[ 
						[ 
								'title',
								'keywords',
								'description',
								'writer',
								'tags' 
						],
						'string',
						'max' => 200 
				],
				[ 
						[ 
								'termid' 
						],
						'exist',
						'skipOnError' => true,
						'targetClass' => Term::className (),
						'targetAttribute' => [ 
								'termid' => 'id' 
						] 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'id' => 'ID',
				'title' => '标题',
				'content' => '内容',
				'keywords' => '关键字',
				'description' => '描述',
				'click' => '点击量',
				'writer' => '作者',
				'termid' => '栏目ID',
				'created_p' => '创建时间',
				'updated_p' => '更新时间',
				'tags' => '标签',
				'status' => '文章状态(0,1,2)' 
		];
	}
	
	/**
	 * 获取栏目
	 * 
	 * @return \yii\db\ActiveQuery
	 */
	public function getTerm() {
		return $this->hasOne ( Term::className (), [ 
				'id' => 'termid' 
		] )->inverseOf ( 'posts' );
	}
	
	/**
	 * 显示上一页
	 * param $id 文章ID
	 */
	public function getPrevious($id) {
		$model = array ();
		$data = Post::find ()->where ( [ 
				'<',
				'id',
				$id 
		] )->orderBy ( 'id DESC' )->all ();
		if ($data) {
			$model ['id'] = $data [0] ['id'];
			$model ['title'] = $data [0] ['title'];
		} else {
			$model ['id'] = - 1;
		}
		return $model;
	}
	/**
	 * 显示下一页
	 * param $id 文章ID
	 */
	public function getNext($id) {
		$model = array ();
		$data = Post::find ()->where ( [ 
				'>',
				'id',
				$id 
		] )->orderBy ( 'id' )->all ();
		if ($data) {
			$model ['id'] = $data [0] ['id'];
			$model ['title'] = $data [0] ['title'];
		} else {
			$model ['id'] = - 1;
			$model ['title'] = '';
		}
		return $model;
	}
	/**
	 * ****************************************************测试*********************************************************
	 */
	//EVENT_ADD
	public function getTest1($param) {   //add
		echo 'add';
		echo $param->data;
		$param->handled = true;  /* 停止后续代码执行 */
	}
	public function getTest2() {  //update
		echo 'update';
	}
	public function getTest3() { //delete
		echo 'delete';
	}
}
