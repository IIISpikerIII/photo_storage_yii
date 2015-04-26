<?php

class PhotoController extends Controller
{
	public function actionIndex()
	{
        $model=new Photo();
		$this->render('index', array(
            'model' => $model
        ));
	}

    public function actionAdd()
    {
        $model=new Photo();

        $attributes = Yii::app()->request->getParam('Photo');

        if($attributes)
        {
            $model->attributes=$attributes;
            $model->id_user = Yii::app()->user->id;
            $model->file = CUploadedFile::getInstance($model,'file');

            if($model->save()) {
                $this->redirect(array('site/index'));
            }
        }

        $this->render('add',array(
            'model'=>$model,
        ));
    }
}