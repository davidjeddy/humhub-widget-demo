<?php

namespace humhub\modules\demo\widgets;

use Yii;
use humhub\modules\user\models\User;
use humhub\models\Setting;

/**
 * demoSidebarWidget displays the users of upcoming demos.
 *
 * It is attached to the dashboard sidebar.
 *
 * @package humhub.modules.demo.widgets
 * @author Sebastian Stumpf
 */
class demoSidebarWidget extends \yii\base\Widget
{

    public function run()
    {
        $demoCondition = "
            DATE_ADD(
                profile.demo, 
                INTERVAL YEAR(CURDATE()) - YEAR(profile.demo) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(profile.demo),1,0)
                YEAR)  
            BETWEEN CURDATE() AND DATE_ADD(
                CURDATE(),
                INTERVAL " . ((int)Setting::Get('shownDays', 'demo')) . " DAY
            );";

        $users = User::find()
            ->joinWith('profile')
            ->where($demoCondition)
            ->limit(10)
            ->all();

        return (
            count($users) == 0
            ? null
            : $this->render('demoPanel', [
                'users' => $users
            ])
        );
    }

    public function getDays($user)
    {
        $now = new \DateTime('now');
        $now->setTime(00, 00, 00);
        $nextdemo = new \DateTime(date('y') . '-' . Yii::$app->formatter->asDate($user->profile->demo, 'php:m-d'));

        $days = $nextdemo->diff($now)->d;

        // Handle turn of year
        if ($days < 0) {
            $nextdemo->modify('+1 year');
            $days = $nextdemo->diff($now)->d;
        }

        return $days;
    }

    public function getAge($user)
    {
        $demo = new \DateTime($user->profile->demo);
        $age = $demo->diff(new \DateTime('now'))->y;

        if ($this->getDays($user) != 0) {
            $age++;
        }

        return $age;
    }

};
