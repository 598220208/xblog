<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Term;
use yii\base\Object;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '谢~~',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $term_model=new Term();
    $term_parent=$term_model->getTermByParentid(0);
    
    $terms_item=array();
    $terms_item[0]['label']='首页';
    $terms_item[0]['url']=Yii::$app->homeUrl;
  
    foreach ($term_parent as $k=> $term_){ 
    	$terms_item[$k+1]['label']=$term_->name;
    	$terms_item[$k+1]['url']=Url::toRoute(['post/index','termid'=>$term_->id]);
    	$terms_temp=$term_model->getTermByParentid($term_->id);  //查询子栏目
    	$terms_item_array=array();
    	foreach ($terms_temp as $k_=>$v_){
    		$terms_item_array[$k_]['label']=$v_->name;
    		$terms_item_array[$k_]['url']=Url::toRoute(['post/index','termid'=>$v_->id]); 
    	}
    	$terms_item[$k+1]['items']=$terms_item_array;
   
    } 
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $terms_item,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
