<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Tag;
use app\modules\admin\models\TagSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Object;
use yii\web\ForbiddenHttpException;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends BaseBackController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tag model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionTest(){
    	
    	$hr='<hr>';
    /* 	
    	$connection = new \yii\db\Connection([
    			'dsn' => 'mysql:host=localhost;dbname=xblog',
    			'username' => 'root',
    			'password' => '',
    			'tablePrefix' =>'yii_',
    			'charset' => 'utf8',
    	]);
    	$connection->open();
        $command =$connection->createCommand('SELECT * FROM {{%post}}');
    	$posts = $command->queryAll();
    	 
    	foreach ($posts as $key=>$value){ 
    		echo $value['title'];
    		echo '<br>'; 
    	}
    	echo $hr;
    	$command = $connection->createCommand('SELECT COUNT(*) FROM {{%post}}');
    	$postCount = $command->queryScalar();
    	echo $postCount;
    
    	echo $hr;
    	
    	$tags=Tag::find()->all();
    	$tag=Tag::find()->where(['name'=>'php'])->one();
    	echo $tag->name.' '.$tag->id;
    	
    	echo $hr; */
    	
    	/* $tag=Tag::find()->where(['name'=>'php'])->one(); 
    	$tag->frequency=$tag->frequency+1;
    	$tag->save();
    	echo $tag->name.'->'.$tag->frequency; */
      
    	//Tag::addTags('php,java,yii2,hinernate');
    	
    	
    }
}
