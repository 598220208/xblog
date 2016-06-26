<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TermSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '栏目';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增栏目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        	'name', 
        	[
        		'attribute' => 'parentid',
        		'label'=>'父栏目',
        		'value' =>function($model){
        		
        		return $model->parentid==0?'---':$model->getTermparent($model->parentid)->name;
        			 
        		},
        		'headerOptions' => ['width' => '400'],
        	],
        	//'id',
            //'slug', 
            [
        		'attribute' => 'flag',
        		'label'=>'是否允许发布文章',
        		'value'=>function($model){
	        		$state = [
	        				0 => '否',
	        				1 => '是',
	        		]; 
        	         return $state[$model->flag]; 
        			 
        		},
        		'headerOptions' => ['width' => '100'],
        	],
        	[
        	'attribute' => 'status',
        	'label'=>'状态',
        	'value'=>function($model){
        		$state = [
        				0 => '禁用',
        				1 => '启用',
        		];
        		return $state[$model->status];
        	
        	},
        	'headerOptions' => ['width' => '100'],
        	],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
