<?if($model !== false):?>

<style type="text/css">

    div#rating label
    {
        font-weight: bold;
        font-size: 0.9em;
        float:left;
        margin-left:2px;
        text-align:left;
        width:100px;
    }

    div#rating input
    {
        float:left;
    }

</style>

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

    <?if(Yii::app()->user->isGuest):?>
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
    <?endif;?>

    <div id="rating">
        <?php echo $form->labelEx($model,'rating'); ?>
        <?php echo $form->radioButtonList($model,'rating',array(0,1,2,3,4,5),array('separator'=>' '));?>
        <?php echo $form->error($model,'rating'); ?>
    </div>
    <br/>
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

<?else:?>
    <h1>Ваш голос учтен</h1>
<?endif?>