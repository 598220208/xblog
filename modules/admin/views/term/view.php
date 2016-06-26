<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Term */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '栏目', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-view">
 
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
        	[
        		'attribute' => 'parentid',
        		'label'=>'父栏目',
        		'value'=>$model->parentid==0?'---':$model->getTermparent($model->parentid)->name,
        		 
        	],
            'name',
            'slug',
        ],
    ]) ?>

</div>
