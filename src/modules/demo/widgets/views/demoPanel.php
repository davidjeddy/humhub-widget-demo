<?php

use yii\helpers\Html;

/**
 * View File for the demoSidebarWidget
 *
 * @uses User $users the profile data of all the users that have demo the next days.
 *
 * @package humhub.modules.demo.widgets.views
 * @author Sebastian Stumpf, David J Eddy
 */
$assets = \humhub\modules\demo\Assets::register($this);
?>

<style type="text/css">
    .img-demo {
        left:       30px;
        position:   absolute;
        top:        32px;
    }
</style>


<div class="panel panel-default panel-demo">
    <div class="panel-heading">
        <strong><?php echo Yii::t('DemoModule.base', 'Upcoming'); ?></strong> <?php echo Yii::t('DemoModule.base', 'demos'); ?>
    </div>
    <div id="demoContent">
        <ul id="demoList" class="media-list">

            <?php foreach ($users as $user) { ?>
                <?php $remainingDays = $this->context->getDays($user); ?>
                <li class="demoEntry">
                    <a href="<?php echo $user->getUrl(); ?>">
                        <div class="media">
                            <!-- Show user image -->
                            <img class="media-object img-rounded pull-left" data-src="holder.js/32x32"
                                 alt="32x32"
                                 style="width: 32px; height: 32px;"
                                 src="<?php echo $user->getProfileImage()->getUrl(); ?>">
                                 <?php if ($remainingDays == 0) : ?>
                                <img class="media-object img-rounded img-demo pull-left"
                                     data-src="holder.js/16x16" alt="16x16"
                                     style="width: 16px; height: 16px;"
                                     src="<?php echo $assets->baseUrl ?>/favicon.png">
                                 <?php endif; ?>

                            <!-- Show content -->
                            <div class="media-body">
                                <strong><?php echo Html::encode($user->displayName); ?></strong>
                                <?php
                                // show when the user has his demo
                                if ($remainingDays == 0) {
                                    echo ' <span class="label label-danger">' . Yii::t('DemoModule.base', 'today') . '</span>';
                                } else if ($remainingDays == 1) {
                                    echo ' (' . Yii::t('DemoModule.base', 'Tomorrow') . ')';
                                } else {
                                    echo ' (' . Yii::t('DemoModule.base', 'in') . ' ' . $remainingDays . ' ' . Yii::t('DemoModule.base', 'days') . ')';
                                }
                                // show the users age if allowed
                                if ($user->profile->demo_hide_year == '0') {
                                    echo '<br />' . Yii::t('DemoModule.base', 'becomes') . ' ' . $this->context->getAge($user) . ' ' . Yii::t('DemoModule.base', 'years old.');
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </li>

            <?php }; ?>
        </ul>

    </div>
</div>