<?php

/**
 * This is the model class for table "{{photo}}".
 *
 * The followings are the available columns in table '{{photo}}':
 * @property integer $id
 * @property string $title
 * @property string $path
 * @property string $date
 * @property integer $id_user
 * @property integer $counter
 * @property double $rating
 */
class Photo extends CActiveRecord
{
    public $file;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{photo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, id_user, file', 'required'),
			array('id_user, counter', 'numerical', 'integerOnly'=>true),
			array('rating', 'numerical'),
			array('title, path', 'length', 'max'=>100),
            array('file', 'file', 'types'=>'png, jpeg, jpg', 'maxSize'=> 50000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, path, date, id_user, rating', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    public function relations()
    {
        return array(
            'user'=>array(self::HAS_ONE, 'User', array('id'=>'id_user')),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'path' => 'Фотография',
            'date' => 'Date',
            'id_user' => 'Id User',
            'rating' => 'Рейтинг',
            'counter' => 'проголосовало',
        );
    }

    protected function beforeSave()
    {

        if (parent::beforeSave()) {

            $this->id_user = Yii::app()->user->id;

            if($this->isNewRecord) {

                $this->path = FileHelper::upload_image($this->file);
                return $this->path !== false?:false;
            }
        } else
            return false;
    }

    public static function RatingUp($id_photo, $vote) {

        $rating = new CDbExpression('(rating * counter + '.$vote.')/(counter + 1)');
        $counter = new CDbExpression('counter + 1');

        return Photo::model()->updateByPk($id_photo, array('rating' => $rating, 'counter' => $counter));
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
