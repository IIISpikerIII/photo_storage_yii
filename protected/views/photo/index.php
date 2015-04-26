<h1>Список фоторгафий</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name' => 'path',
            'type' => 'raw',
            'value' => 'CHtml::image("/".Yii::app()->params["imgPath"].$data->path,"",array("width"=>200, "height"=>200))',
        ),
        'title',
        'rating',
        array(
            'type' => 'raw',
            'value' => 'CHtml::link("Смотреть", array("photo/view", "id"=> $data->id))',
        ),
    ),
)); ?>