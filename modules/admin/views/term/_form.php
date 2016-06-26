<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Term;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Term */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
    $terms=Term::find()->all();
     
    $terms_list=ArrayHelper::map($terms, 'id','name');
     
?>
<div class="term-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'parentid')->dropDownList($terms_list,['prompt'=>'请选择...'])->label('所属栏目') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'flag')->dropDownList([1 => '是', 0 => '否'])?> 
     
    <?= $form->field($model, 'status')->dropDownList([1 => '启用', 0 => '禁用'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '提交' : '提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
