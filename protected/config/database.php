<?php

// This is the database connection configuration.
return array(
	
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/seguidor.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=seguidordb',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	
);