<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends \app\core\front\BaseFrontActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }
}
