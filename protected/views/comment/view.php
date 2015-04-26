
<h1>Оставить комментарий</h1>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Поля обязательны к заполнению <span class="required">*</span>.</p>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author'); ?>
        <?php echo $form->textField($model,'author'); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'comment'); ?>
        <?php echo $form->textField($model,'comment'); ?>
        <?php echo $form->error($model,'comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Комментировать'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>