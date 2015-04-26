
<table class="table">
    <tr>
        <td rowspan="3" width="300"><?=CHtml::image("/".Yii::app()->params["imgPath"].$model->path,"",array("width"=>250, "height"=>250))?></td>
        <td>Название: <?=$model->title?></td>
    </tr>
    <tr>
        <td>Рейтинг: <?=$model->rating?></td>
    </tr>
    <tr>
        <td>Загрузил: <?=$model->user->username?></td>
    </tr>
</table>

<?php

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<h1>Оставить комментарий</h1>

<!--<div class="form">-->
<!--    --><?php //$form=$this->beginWidget('CActiveForm', array(
//        'id'=>'registration-form',
//        'enableClientValidation'=>true,
//        'clientOptions'=>array(
//            'validateOnSubmit'=>true,
//        ),
//    )); ?>
<!---->
<!--    <p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'email'); ?>
<!--        --><?php //echo $form->textField($model,'email'); ?>
<!--        --><?php //echo $form->error($model,'email'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'author'); ?>
<!--        --><?php //echo $form->textField($model,'author'); ?>
<!--        --><?php //echo $form->error($model,'author'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'comment'); ?>
<!--        --><?php //echo $form->textField($model,'comment'); ?>
<!--        --><?php //echo $form->error($model,'comment'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row buttons">-->
<!--        --><?php //echo CHtml::submitButton('Комментировать'); ?>
<!--    </div>-->
<!---->
<!--    --><?php //$this->endWidget(); ?>
<!--</div>-->
<?$this->widget("application.widgets.CommentWidget.CommentWidget", array('id_photo' => $model->id, 'action'=> 'add'))?>

<?$this->widget("application.widgets.CommentWidget.CommentWidget", array('id_photo' => $model->id, 'action'=> 'view'))?>
<?php //$this->widget('zii.widgets.grid.CGridView', array(
//    'id'=>'users-grid',
//    'dataProvider'=>$comments->search(),
//    'filter'=>$comments,
//    'columns'=>array(
//        'author',
//        'comment',
//        'rating',
//    ),
//)); ?>
