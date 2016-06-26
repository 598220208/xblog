<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Term */

$this->title = '新增栏目';
$this->params['breadcrumbs'][] = ['label' => '栏目', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
