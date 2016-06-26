<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Post;
use app\modules\admin\models\Tag;
use app\modules\admin\models\PostSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\core\base\BaseActiveRecord;
use yii\db\Expression;
use yii\base\Object;
use app\components\MyBehavior;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends BaseBackController {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'delete' => [ 
										'POST' 
								] 
						] 
				],
				'myBehavior2' => [ 
						'class' => MyBehavior::className (),
						'prop1' => '123',
						'prop2' => '456' 
				] 
		];
	}
	
	/**
	 * Lists all Post models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new PostSearch ();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single Post model.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render ( 'view', [ 
				'model' => $this->findModel ( $id ) 
		] );
	}
	
	/**
	 * Creates a new Post model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Post ();
		
		$tags = new Tag ();
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			$tags->addTags ( $model->tags );
			return $this->redirect ( [ 
					'view',
					'id' => $model->id 
			] );
		} else {
			return $this->render ( 'create', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Updates an existing Post model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			// $model->touch();
			return $this->redirect ( [ 
					'view',
					'id' => $model->id 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Deletes an existing Post model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel ( $id )->delete ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the Post model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param string $id        	
	 * @return Post the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Post::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * tag检测
	 * @param  $tag   
	 * @param  $model
	 */
	protected function checkTag($tag, $model) {
		if ($tag != $model->tags) {
			$tagmodel = new Tag ();
			$tagmodel->addTags ( $tags );
		}
	}
 
}
