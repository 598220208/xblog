<?php
use yii\widgets\LinkPager;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Post;
use app\models\Tag;
use app\core\widget\TestWidget;


/* @var $this yii\web\View */
$this->title ='Xie’s Blog';

?>
<div class="site-index">
	<div class="main">
<?php TestWidget::begin();?>

content that may contain <tag>'s
<?php TestWidget::end();?>
	
	
		<div class="row">
			<div class="col-md-9">
				<div class="main-left">
				 
<?php
foreach ( $model as $key => $val ) {
	?>
	 
	          <div class="col-md-12">
						<h2><a href="<?=Url::toRoute(['post/detail','id'=>$val->id])?>"><?=Html::encode(mb_substr($val->title,0,45,'utf-8')); ?></a></h2>
                        
						<p>
						<div>
						<span class="glyphicon glyphicon-user" title="tag" aria-hidden="true"><?=Html::encode($val->writer); ?></span>
                    
						   <span class="glyphicon glyphicon-tags" title="tag" aria-hidden="true">
						   <?php  
						   $tag_array=explode(',',$val->tags);
						   $tag_array=array_filter($tag_array);
						   foreach ($tag_array as $v){ 
						   	 ?>
						   	  <a href="<?= Url::toRoute(['#'])?>"><?=Html::encode($v)?></a>
						   	 
						   	 <?php
						   }
						   ?>
						   </span>
						   
						   <span class="glyphicon glyphicon-eye-open" title="tag" aria-hidden="true"><?=$val->click;?></span>
						  
						   <span class="glyphicon glyphicon-time" title="tag" aria-hidden="true"><?=date("Y-m-d H:i:s",$val->created_p)?></span>
						</div>
						</p>
	 
					</div>
						 <?php
					}
					
					?>
					<div class="col-md-12">
					<p>
					<?php
								echo LinkPager::widget ( [ 
											'pagination' => $pages 
									] );
					?>
					</p>
					</div>
				
			  
				</div>
			</div>
			<?php 
			$post_hot=Post::find()->orderBy('click DESC')->limit(10)->all();
			$post_new=Post::find()->orderBy('id DESC')->limit(10)->all();
			$tag_list=Tag::find()->orderBy('frequency DESC')->all();
			
			
			?>
			
			<div class="col-md-3">
				<div class="main-right">
				<!-- 最热  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"><span class="glyphicon glyphicon-fire" aria-hidden="true">最热</span></h2>
						</div>
						<div class="panel-body">
							<ul class="post-list">
							<?php 
							foreach ($post_hot as $hot_v){
								?>
								<li><a href="<?=Url::toRoute(['post/detail','id'=>$hot_v->id])?>"><?=Html::encode(mb_substr($hot_v->title,0,20,'utf-8')) ?></a></li>
								<?php 
							} 
							?> 
							</ul>
						</div>
					</div>
					<!-- 最热  -->
					
					<!-- 最新  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"><span class="glyphicon glyphicon-th-large" aria-hidden="true">最新</span></h2>
						</div>
						<div class="panel-body">
							<ul class="post-list">
							<?php 
							foreach ($post_new as $new_v){
								?>
								<li><a href="<?=Url::toRoute(['post/detail','id'=>$new_v->id])?>"><?=Html::encode($new_v->title) ?></a></li>
								<?php 
							} 
							?> 
							</ul>
						</div>
					</div>
					<!-- 最新  -->
  
					<!-- TAG标签 -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"><span class="glyphicon glyphicon-tags" aria-hidden="true">云标签</span></h2>
						</div>
						<div class="panel-body">
						<?php  
						foreach ($tag_list as $tag){
						?>
							<a class="tag" href="<?=Url::toRoute([''])?>"><?=$tag->name.'('.$tag->frequency.')'?></a>
						<?php  
						} 
						?> 
						</div>
					</div>
					<!-- TAG标签 -->

				</div>
			</div>
		</div>

	</div>


	<div class="body-content">

		<div class="row">
			<!-- <div class="col-lg-4">
				<h2>Heading</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur.</p>

				<p>
					<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii
						Documentation &raquo;</a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2>Heading</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur.</p>

				<p>
					<a class="btn btn-default"
						href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2>Heading</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur.</p>

				<p>
					<a class="btn btn-default"
						href="http://www.yiiframework.com/extensions/">Yii Extensions
						&raquo;</a>
				</p>
			</div> -->
		</div>

	</div>
</div>
