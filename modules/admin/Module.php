<?php

namespace app\modules\admin;

use app\core\base\BaseModule;
/**
 * admin module definition class
 */
class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout='main';

        // custom initialization code goes here
    }
}
