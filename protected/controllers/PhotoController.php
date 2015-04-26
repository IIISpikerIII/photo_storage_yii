<?php

class PhotoController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('add'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $model = new Photo();
        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionAdd()
    {
        $model = new Photo();

        $attributes = Yii::app()->request->getParam('Photo');

        if ($attributes) {
            $model->attributes = $attributes;
            $model->id_user = Yii::app()->user->id;
            $model->file = CUploadedFile::getInstance($model, 'file');

            if ($model->save()) {
                $this->redirect(array('photo/index'));
            }
        }

        $this->render('add', array(
            'model' => $model,
        ));
    }

    public function actionView($id)
    {
        $model = Photo::model()->with('user')->findByPk($id);

        if (!$model)
            throw new CHttpException(404, 'Указанная запись не найдена');

        $this->render('view', array(
            'model' => $model,
        ));
    }
}