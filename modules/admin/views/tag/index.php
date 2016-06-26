<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '标签';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'frequency',

            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view}',
    ],
        	
        ],
    ]); ?>
</div>
