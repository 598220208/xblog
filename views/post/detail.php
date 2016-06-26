<?php
use yii\base\Widget;
use yii\helpers\Markdown;
use yii\helpers\Html; 
use yii\helpers\Url;
use app\models\Post;
use app\models\Tag;
/* @var $this yii\web\View */
$this->title =Html::encode($model->title);

?>
<div class="site-index">
	<div class="main">

		<div class="row">
			<div class="col-md-9">
				<div class="main-left">


					<div class="col-md-12">
						<h2>
							<?=Html::encode($model->title)?>
						</h2>
						<p><ul class="nav nav-list"> <li class="divider"></li> </ul></p>
						<p>
							<span class="glyphicon glyphicon-user" title="tag"
								aria-hidden="true">&nbsp;<?=Html::encode($model->writer)?> </span>&nbsp;&nbsp;&nbsp;
							<span
								class="glyphicon glyphicon-eye-open" title="tag"
								aria-hidden="true">&nbsp;<?=Html::encode($model->click);?></span>&nbsp;&nbsp;&nbsp;
							<span
								class="glyphicon glyphicon-time" title="tag" aria-hidden="true">&nbsp;<?=date("Y-m-d H:i:s",$model->created_p)?></span>

						</p>
						<p><ul class="nav nav-list"> <li class="divider"></li> </ul></p>
						<p><?=Markdown::process($model->content)?></p>
						<p><ul class="nav nav-list"> <li class="divider"></li> </ul></p>
						<p>
						  <a href="">
						  <?php 
					       	$previous=$model->getPrevious($model->id);
					       	if($previous['id']!=-1){
					       		echo '<a href="detail?id='.$previous['id'].'">上一篇: '.mb_substr($previous['title'],0,50,'utf-8').'</a>';
					       	}else{
					       		echo '上一篇: 没有了~~';
					       	}
					       	
					      ?>
					      </a>
					    </p>
                        <p>
						  <a href="">
						  <?php 
					       	$next=$model->getNext($model->id);
					       	if($next['id']!=-1){
					       		echo '<a href="detail?id='.$next['id'].'">下一篇: '.mb_substr($next['title'],0,50,'utf-8').'</a>';
					       	}else{
					       		echo '下一篇: 没有了~~';
					       	}
					       	
					      ?>
					      </a>
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


</div>
