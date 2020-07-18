<?php

//abthalut path
define('ROOT',dirname(__FILE__));
define('INCLUDES',ROOT.'/includes');
define('PLUGINS',INCLUDES.'/plugins');
define('CONTROLLERS',INCLUDES.'/controllers');
define('MODELS',INCLUDES.'/models');
define('VIEWS',ROOT.'/templates');
define('ASSETS',ROOT.'/assets');

require(INCLUDES.'/config.php');
require(CONTROLLERS.'/controller.php');
require(MODELS.'/model.php');
require(INCLUDES.'/System.php');
require(INCLUDES.'/mysql.php');


System::Set('db',new mysqlDBN());
