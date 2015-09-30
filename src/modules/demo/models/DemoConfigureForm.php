<?php

namespace humhub\modules\demo\models;

use Yii;

/**
 * DemoConfigureForm defines the configurable fields.
 *
 * @package humhub.modules.demo.forms
 * @author Sebastian Stumpf, David J Eddy
 */
class DemoConfigureForm extends \yii\base\Model
{

    public $shownDays;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return [
            ['shownDays',   'required'],
            [['shownDays'], 'integer'],
        ];
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute will be labeled with its name with ucfirst() applied.
     */
    public function attributeLabels()
    {
        return [
            'shownDays' => Yii::t('DemoModule.base', 'The number of days future demos messages will be shown.'),
        ];
    }

}
