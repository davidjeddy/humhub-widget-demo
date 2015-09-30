<?php

namespace humhub\modules\demo;

use Yii;
use humhub\modules\demo\widgets\demoSidebarWidget;
use humhub\models\Setting;
use yii\helpers\Url;

/**
 * demoModule is responsible for the the demo functions.
 * 
 * @author Sebastian Stumpf, David J Eddy
 */
class Module extends \humhub\components\Module
{

    /**
     * On build of the dashboard sidebar widget, add the demo widget if module is enabled.
     *
     * @param type $event
     */
    public static function onSidebarInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->addWidget(
            demoSidebarWidget::className(),
            [],
            ['sortOrder' => 200]
        );
    }

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/demo/config']);
    }

    /**
     * @inheritdoc
     */
    public function enable()
    {
        parent::enable();
        Setting::Set('shownDays', 2, 'demo');
    }

}
