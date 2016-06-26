<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Object;
use app\modules\admin\models\Term;
use yii\helpers\ArrayHelper;
use ijackua\lepture\MarkdowneditorAssets;
use ijackua\lepture\Markdowneditor;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 

MarkdowneditorAssets::register($this);

?>
<div class="post-form">
<?php 
    $terms=Term::find()->where(['status'=>1])->orderBy('id')->all();
  
    $terms_list=ArrayHelper::map($terms, 'id','name');
    //$terms_list=array_merge($terms_list1,$terms_list2);
    
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tags')->textInput(['maxlength' => true])->label('TAG标签') ?>
    
    <?= $form->field($model, 'termid')->dropDownList($terms_list,['prompt'=>'请选择...'])->label('所属栏目') ?>
    
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
      
    <?= $form->field($model, 'writer')->textInput(['maxlength' => true]) ?>

    <?=Markdowneditor::widget(['model' => $model, 'attribute' => 'content']);
   // $form->field($model, 'content')->textarea(['rows' => 10]) 
    ?> 
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'click')->textInput(['value'=>$model->click==0?mt_rand(50,200):$model->click]) ?>
  
    <?= $form->field($model, 'status')->dropDownList([0 => '草稿', 1 => '发布', 2 => '废弃'],['prompt' => '请选择...'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布' : '提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
