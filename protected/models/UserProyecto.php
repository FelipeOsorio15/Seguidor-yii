<?php

/**
 * This is the model class for table "user_proyecto".
 *
 * The followings are the available columns in table 'user_proyecto':
 * @property integer $iduser
 * @property integer $idproyecto
 */
class UserProyecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('iduser, idproyecto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser, idproyecto', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idproyecto0' => array(self::BELONGS_TO, 'Proyecto', 'idproyecto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'confirmado' => 'Confirmado',
			'idproyecto' => 'Idproyecto',
			'email' => 'email',
			'iduser' => 'Iduser',
			
			
			
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

	    $criteria->compare('confirmado',$this->confirmado);
		$criteria->compare('idproyecto',$this->idproyecto);
		$criteria->compare('email',$this->email);
	     $criteria->compare('iduser',$this->iduser);
		
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
protected function beforeValidate(){
       
       if($this->isNewRecord){
         $user = User::model()->find("username=?", array(Yii::app()->User->id));
        

         $this->iduser=$user->iduser; //Manager automatico
       
         



       }
       return parent::beforeValidate();


     }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserProyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
