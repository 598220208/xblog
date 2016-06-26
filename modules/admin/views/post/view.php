<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => '文章发布', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$state = [
		'0' => '草稿',
		'1' => '已发布',
		'2' => '已废弃',
];
?>
<div class="post-view">
 
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
        	'tags',
        		[
        		'attribute' => 'termid',
        		'label'=>'所属栏目',
        		'value'=>$model->term->name,
        		 
        		],
        	'keywords',
        		'writer',
            'content:ntext',
            
            'description',
            'click', 
        	[
        		'attribute' => 'created_p',
        		'label'=>'创建时间',
        		'value'=>date("Y-m-d H:i:s",$model->created_p),
        	],
        	[
        		'attribute' => 'updated_p',
        		'label'=>'更新时间',
        		'value'=>date("Y-m-d H:i:s",$model->updated_p),
        	],
            [
        		'attribute' => 'status',
        		'label'=>'状态',
        		'value'=>$state[$model->status],
        	],
        		
        ],
    ]) ?>

</div>
