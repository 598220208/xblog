<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = '文章发布';
$this->params['breadcrumbs'][] = ['label' => '文章发布', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">
 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
