<?php

/**
 * This is the model class for table "comentario".
 *
 * The followings are the available columns in table 'comentario':
 * @property integer $idcomentario
 * @property string $name
 * @property string $description
 * @property string $registrationdate
 * @property integer $idactividad
 *
 * The followings are the available model relations:
 * @property Actividad $idactividad0
 */
class Comentario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('idactividad', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>250),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcomentario, name, description, registrationdate, idactividad', 'safe', 'on'=>'search'),
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
			'idactividad0' => array(self::BELONGS_TO, 'Actividad', 'idactividad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcomentario' => 'Idcomentario',
			'name' => 'Name',
			'description' => 'Description',
			'registrationdate' => 'Registrationdate',
			'idactividad' => 'Idactividad',
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

		$criteria->compare('idcomentario',$this->idcomentario);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('registrationdate',$this->registrationdate,true);
		$criteria->compare('idactividad',$this->idactividad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



 protected  function beforeValidate(){
       
       if($this->isNewRecord){
          //$idpro=$this->getIdproyecto();

          date_default_timezone_set('America/Bogota');
           $date = date("Y-m-d");  

            

        //$proyecto = Proyecto::model()->find("idproyecto=?", array(Yii::app()->Proyecto->id));
         //$this->idproyecto = Yii::app()->db->getLastInsertID();
          // $rawdata = Yii::app()->db->createCommand("SELECT p.* FROM proyecto p WHERE p.idproyecto = t.idproyecto  AND t.iduser =".$user->iduser)->queryAll();


         // $id=Yii::app()->db->createCommand($sql)->queryAll();
         $this->registrationdate=$date;
       
       // $this->idproyecto=$idpro;


       }
       return parent::beforeValidate();


     }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comentario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
