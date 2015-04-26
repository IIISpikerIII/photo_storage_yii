<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property integer $id_photo
 * @property string $author
 * @property integer $email
 * @property integer $rating
 * @property string $comment
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_photo, author, email, rating', 'required'),
			array('id_photo, rating', 'numerical', 'integerOnly'=>true),
			array('email', 'email'),
			array('email', 'uniqueEmailAndPhoto'),
			array('author, comment', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_photo, author, email, rating, comment', 'safe', 'on'=>'search'),
		);
	}

    public function uniqueEmailAndPhoto($attribute, $params = array())
    {
        if (!$this->hasErrors()) {
            $params['criteria'] = array(
                'condition' => 'email=:email AND id_photo=:id_photo',
                'params' => array(':email' => $this->email, ':id_photo' => $this->id_photo),
            );
            $validator = CValidator::createValidator('unique', $this, $attribute, $params);
            $validator->validate($this, array($attribute));
        }
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {

            if(!Yii::app()->user->isGuest) {
                $usr = User::model()->findByPk(Yii::app()->user->id);
                $this->author = $usr->username;
                $this->email = $usr->email;
            }
            return true;
        }
    }

    protected function afterSave() {

        if ($this->isNewRecord) {
            Photo::RatingUp($this->id_photo, $this->rating);
        }
        parent::afterSave();
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_photo' => 'Id Photo',
			'author' => 'Автор фото',
			'email' => 'Email',
			'rating' => 'Рейтинг',
			'comment' => 'Коментарий',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_photo',$this->id_photo);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function checkCommentUser($id_photo) {

        if(!Yii::app()->user->isGuest) {

            $usr = User::model()->findByPk(Yii::app()->user->id);
            return Comment::model()->exists('email = "'.$usr->email.'" AND id_photo ='. $id_photo);
        }

        return false;
    }
}
