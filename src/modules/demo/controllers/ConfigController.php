<?php

namespace humhub\modules\demo\controllers;

use Yii;
use humhub\models\Setting;

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.demo.controllers
 * @author Sebastian Stumpf
 */
class ConfigController extends \humhub\modules\admin\components\Controller
{

    /**
     * Configuration Action for Super Admins
     */
    public function actionIndex()
    {
        $form            = new \humhub\modules\demo\models\DemoConfigureForm();
        $form->shownDays = Setting::Get('shownDays', 'demo');

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $form->shownDays = Setting::Set('shownDays', $form->shownDays, 'demo');
            return $this->redirect(['/demo/config']);
        }

        return $this->render('index', [
            'model' => $form
        ]);
    }
};
