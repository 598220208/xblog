<?php

namespace app\core\widget;

use Yii;
use app\core\base\BaseWidget;
use yii\helpers\Html;

/**
 *
 * @author xie
 *        
 */
class TestWidget extends BaseWidget {
	public $message;
	public function init() {
		parent::init ();
		ob_start ();
		
		echo "asdasda";
		echo "asdasda";
		echo "asdasda";
		echo "asdasda";
		echo "asdasda";
		echo "asdasda";
	}
	public function run() {
		echo "qqqqqqqqqqqqqqqq";
		echo "qqqqqqqqqqqqqqq";
		$content = ob_get_clean ();
		return Html::encode ( $content );
	}
}