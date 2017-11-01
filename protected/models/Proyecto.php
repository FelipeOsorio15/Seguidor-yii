<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property integer $idproyecto
 * @property string $name
 * @property string $description
 * @property string $begindate
 * @property string $enddate
 * @property integer $manager
 * @property string $registrationdate
 * @property string $updatedate
 *
 * The followings are the available model relations:
 * @property Actividad[] $actividads
 * @property User $manager0
 * @property User[] $users
 */
class Proyecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, begindate', 'required'),
			array('manager', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>250),
			array('description, enddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproyecto, name, description, begindate, enddate, manager, registrationdate, updatedate', 'safe', 'on'=>'search'),
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
			'actividads' => array(self::HAS_MANY, 'Actividad', 'idproyecto'),
			'manager0' => array(self::BELONGS_TO, 'User', 'manager'),
			'users' => array(self::MANY_MANY, 'User', 'user_proyecto(idproyecto, iduser)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproyecto' => 'Idproyecto',
			'name' => 'Name',
			'description' => 'Description',
			'begindate' => 'Begindate',
			'enddate' => 'Enddate',
			'manager' => 'Manager',
			'registrationdate' => 'Registrationdate',
			'updatedate' => 'Updatedate',
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
        
		$criteria->compare('idproyecto',$this->idproyecto);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('begindate',$this->begindate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('manager',$this->manager);
		$criteria->compare('registrationdate',$this->registrationdate,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		
		$user = User::model()->find("username=?", array(Yii::app()->User->id)); 
         $condition = $user->iduser;
        $criteria->addSearchCondition('manager',$condition);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
     protected function beforeValidate(){
       
       if($this->isNewRecord){
         $user = User::model()->find("username=?", array(Yii::app()->User->id));
          date_default_timezone_set('America/Bogota');
           $hoy = date("Y-m-d g:i:s");  

         $this->manager=$user->iduser; //Manager automatico
         $this->registrationdate=$hoy;
         $this->updatedate=$hoy;



       }
       return parent::beforeValidate();


     }
     



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
