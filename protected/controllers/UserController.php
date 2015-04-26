<?php

class UserController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionRegistration()
    {
        $model = new User('registration');

        $attributes = Yii::app()->request->getParam('User');

        if($attributes) {

            $model->setAttributes($attributes);

            if($model->save())
                $this->redirect('/site/login');
        }

        $this->render('registration', array(
            'model' => $model
        ));
    }
}