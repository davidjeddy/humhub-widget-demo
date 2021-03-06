<?php

use yii\helpers\Html;
use yii\helpers\Url;
use humhub\compat\CActiveForm;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('DemoModule.base', 'demo Module Configuration'); ?></div>
    <div class="panel-body">


        <p><?php echo Yii::t('DemoModule.base', 'You may configure the number of days within the upcoming demos are shown.'); ?></p>
        <br/>

        <?php $form = CActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model,   'shownDays'); ?>
            <?php echo $form->textField($model, 'shownDays', ['class' => 'form-control']); ?>
            <?php echo $form->error($model,     'shownDays'); ?>
        </div>

        <hr>

        <?php echo Html::submitButton(Yii::t('DemoModule.base', 'Save'), ['class' => 'btn btn-primary']); ?>
        <a class="btn btn-default" href="<?php echo Url::to(['/admin/module']); ?>">
            <?php echo Yii::t('DemoModule.base', 'Back to modules'); ?>
        </a>

        <?php CActiveForm::end(); ?>
    </div>
</div>