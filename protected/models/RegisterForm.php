
<?php
class RegisterForm extends CFormModel
{
	public $name;
	public $lastname;
	public $docid;
	public $usernam;
	public $password;
	public $email;
	public $photo;
	public $iduser;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, lastname, docid, username, password, email', 'required'),
			array('name, lastname', 'length', 'max'=>150),
			array('docid, username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>45),
			array('email', 'length', 'max'=>80),
			array('photo','file','types'=>'jpg, jpeg, png, gif'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser, name, lastname, docid, username, password, email, photo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(  

			'iduser' => 'Iduser',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'docid' => 'Docid',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'photo' => 'Photo',
                );
	}
}

?>