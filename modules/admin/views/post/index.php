<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\base\Object;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="post-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
     
      
?>
   <p></p>
    <p>
        <?= Html::a('发布文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id', 
        	[
        		'attribute' => 'title',
        		'value' =>function($model){
        			 
        		  return mb_substr($model->title,0,25,'utf-8');
        		},
        		'headerOptions' => ['width' => '200'],
        	],
        	[
        		'attribute' => 'content',
        		'label'=>'内容',
        		'value' =>function($model){
        		  return mb_substr($model->content,0,50,'utf-8').'...';
        		},
        		'headerOptions' => ['width' => '400'],
        	],
            //'content:ntext',
        		
            //'keywords',
            //'description',
            // 'click',
            //'writer',
            [
	            'attribute' => 'writer',
	            'value' =>'writer',
	            'headerOptions' => ['width' => '100'],
            ],
            //'termid',
        	[
        		'attribute' => 'termid',
        		'label'=>'所属栏目',
        		'value'=>
        		function($model){
        			 
        		  return $model->term->name;
        		  
        		},
        		'headerOptions' => ['width' => '100'],
        	],
            // 'created_p',
            // 'updated_p',
            // 'tags',
            // 'status',
        	[
        		'attribute' => 'status',
        		'label'=>'状态',
        		'value'=>
        		function($model){
	        		$state = [
	        				'0' => '草稿',
	        				'1' => '已发布',
	        				'2' => '已废弃',
	        		]; 
        	         return $state[$model->status]; 
        			 
        		},
        		'headerOptions' => ['width' => '100'],
        	],

            ['class' => 'yii\grid\ActionColumn','header'=>'操作'],
        ],
    ]); ?>
</div>
