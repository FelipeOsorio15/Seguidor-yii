<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property integer $idactividad
 * @property string $name
 * @property string $description
 * @property string $begindate
 * @property string $enddate
 * @property string $registrationdate
 * @property string $updatedate
 * @property integer $idproyecto
 *
 * The followings are the available model relations:
 * @property Proyecto $idproyecto0
 * @property Comentario[] $comentarios
 */
class Actividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, begindate ','required'),
			array('idproyecto', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>250),
			array('description, enddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idactividad, name, description, begindate, enddate, registrationdate, updatedate, idproyecto', 'safe', 'on'=>'search'),
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
			'comentarios' => array(self::HAS_MANY, 'Comentario', 'idactividad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idactividad' => 'Idactividad',
			'name' => 'Name',
			'description' => 'Description',
			'begindate' => 'Begindate',
			'enddate' => 'Enddate',
			'registrationdate' => 'Registrationdate',
			'updatedate' => 'Updatedate',
			'idproyecto' => 'Idproyecto',
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

		$criteria->compare('idactividad',$this->idactividad);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('begindate',$this->begindate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('registrationdate',$this->registrationdate,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('idproyecto',$this->idproyecto);
		

       

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

   /*  public  function setIdproyecto($idr){
       $this->idproyecto = $idr;
     }
      public  function getIdproyecto(){
      	return $this->idproyecto;


      }   
*/

       protected  function beforeValidate(){
       
       if($this->isNewRecord){
          //$idpro=$this->getIdproyecto();

          date_default_timezone_set('America/Bogota');
           $datetime = date("Y-m-d g:i:s");  

           $date =date("Y-m-d");  

        //$proyecto = Proyecto::model()->find("idproyecto=?", array(Yii::app()->Proyecto->id));
         //$this->idproyecto = Yii::app()->db->getLastInsertID();
          // $rawdata = Yii::app()->db->createCommand("SELECT p.* FROM proyecto p WHERE p.idproyecto = t.idproyecto  AND t.iduser =".$user->iduser)->queryAll();


         // $id=Yii::app()->db->createCommand($sql)->queryAll();
         $this->registrationdate=$date;
         $this->updatedate=$datetime;
       // $this->idproyecto=$idpro;
           
           
         //$this->idproyecto=$proyecto->idproyecto;

       }
       return parent::beforeValidate();


     }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actividad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
