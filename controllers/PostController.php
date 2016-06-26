<?php

namespace app\controllers;

use app\models\Post;
use yii\base\Object;
use yii\data\Pagination;
use app\models\Term;
use yii\base\Event;

/**
 *
 * @author Xie
 *        
 */
class PostController extends \app\core\front\BaseFrontController {

	/**
	 * 首页
	 * param $termid 栏目id
	 */
	public function actionIndex($termid = null) {
		$cond ['status'] = 1;
		if ($termid != null) {
			$cond ['termid'] = $termid;
		}
		
		$data = Post::find ()->where ( $cond )->orderBy ( 'id DESC' );
		// $pages =new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);
		// $pages = new Pagination(['totalCount' => $countQuery->count()]);
		$countQuery = clone $data;
		$pages = new Pagination ( [ 
				'totalCount' => $countQuery->count (),
				'pageSize' => '10' 
		] );
		$models = $data->offset ( $pages->offset )->limit ( $pages->limit )->all ();
		
		return $this->render ( 'index', [ 
				'model' => $models,
				'pages' => $pages 
		] );
		// return $this->render('index');
	}
	
	/**
	 * 详细页
	 * @param string $id 文章id
	 */
	public function actionDetail($id = null) {
		$model = Post::find ()->where ( [ 
				'id' => $id 
		] )->one ();
		if ($model) {
			return $this->render ( 'detail', [ 
					'model' => $model 
			] );
		} else {
			$this->goBack ();
		}
	}
	 public function actionTest() {
	
	 	$model=new Post();
	 	$model->on(Post::EVENT_ADD,[$model,'getTest1'],'2222');
	 	$model->on(Post::EVENT_ADD,[$model,'getTest3'],'2222');
	 
		 
	 	$model->trigger(Post::EVENT_ADD);
	 	echo 'select';
	 	//$model->trigger(Post::EVENT_DELETE);
		
		
	 }
}
