<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => '文章发布', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">
 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
