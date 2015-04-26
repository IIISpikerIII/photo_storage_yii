
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

<?$this->widget("application.widgets.CommentWidget.CommentWidget", array('id_photo' => $model->id, 'action'=> 'add'))?>

<?$this->widget("application.widgets.CommentWidget.CommentWidget", array('id_photo' => $model->id, 'action'=> 'view'))?>

