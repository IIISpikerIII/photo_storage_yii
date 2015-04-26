<h1>Регистрация</h1>

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
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwordDubl'); ?>
		<?php echo $form->passwordField($model,'passwordDubl'); ?>
		<?php echo $form->error($model,'passwordDubl'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Регистрация'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
