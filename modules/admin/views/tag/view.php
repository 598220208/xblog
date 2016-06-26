<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tag */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-view">

     


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'frequency',
        ],
    ]) ?>

</div>
