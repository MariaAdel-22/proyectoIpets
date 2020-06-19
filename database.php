<?php

	/*$cleardb_url=parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server=$cleardb_url["host"];
	$cleardb_username=$cleardb_url["user"];
	$cleardb_password=$cleardb_url["pass"];
	$cleardb_db=substr($cleardb_url["path"],1);
	
	$active_group='default';
	$active_record=TRUE;
	
	$db['default']['hostname']=$cleardb_server;
	$db['default']['username']=$cleardb_username;
	$db['default']['password']=$cleardb_password;
	$db['default']['database']=$cleardb_db;
	$db['default']['dbdriver']='mysql';
	$db['default']['dbprefix']='';
	$db['default']['pconnect']=TRUE;
	$db['default']['db_debug']=TRUE;
	$db['default']['cache_on']=FALSE;
	$db['default']['cachedir']='';
	$db['default']['char_set']='utf8';
	$db['default']['dbcollat']='utf8_general_ci';
	$db['default']['swap_pre']='';
	$db['default']['autoinit']=TRUE;
	$db['default']['stricton']=FALSE;*/
	
	$active_group='default';
	$query_builder=TRUE;
	
	$db['default']=array(
		'dsn'=>'',
		'hostname'=>'us-cdbr-east-05.cleardb.net',
		'username'=>'be2cf74825313e',
		'password'=>'e459b73e',
		'database'=>'heroku_0c87bc892272e39',
		'dbdriver'=>'mysqli',
		'dbprefix'=>'',
		'pconnect'=>FALSE,
		'db_debug'=>(ENVIRONMENT !== 'production'),
		'cache_on'=>FALSE,
		'cachedir'=>'',
		'char_set'=>'utf8',
		'dbcollat'=>'utf8_general_ci',
		'swap_pre'=>'',
		'encrypt'=>FALSE,
		'compress'=>FALSE,
		'stricton'=>FALSE,
		'failover'=>array(),
		'save_queries'=>TRUE
	);

?>