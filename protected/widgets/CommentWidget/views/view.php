<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'author',
        'comment',
        'rating',
    ),
)); ?>