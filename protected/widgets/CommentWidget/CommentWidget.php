<?php

class CommentWidget extends CWidget
{

    public $action;
    public $id_photo;

    public function run()
    {

        call_user_func_array(array($this, $this->action), array($this->id_photo));
    }

    protected function add($id)
    {
        $model = false;

        if(!Comment::checkCommentUser($id)) {

            $model = new Comment();
            $attributes = Yii::app()->request->getParam('Comment');

            if ($attributes) {

                $model->attributes = $attributes;
                $model->id_photo = $id;

                if($model->save())
                    $this->controller->redirect(array('/photo/view', 'id' => $id));
            }
        }

        $this->render('add', array(
            'model' => $model
        ));
    }

    protected function view($id)
    {
        $model = new Comment();
        $model->unsetAttributes();
        $attributes = Yii::app()->request->getParam('Comment');

        if ($attributes) {

            $model->attributes = $attributes;
        }

        $model->id_photo = $id;

        $this->render('view', array(
            'model' => $model,
        ));
    }
}