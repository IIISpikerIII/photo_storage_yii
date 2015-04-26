<div class="main-content" style="margin: 0 auto;">

    <h2>Добавление фотографии</h2>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'file'); ?>
        <?php echo $form->fileField($model, 'file'); ?>
    </div>

    <div class="row">
        <?echo CHtml::submitButton('Сохранить')?>
    </div>

    <?php $this->endWidget(); ?>

</div>