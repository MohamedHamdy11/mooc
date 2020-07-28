<?php
require('globals.php');
require(MODELS.'/usersModel.php');
require(CONTROLLERS.'/usersController.php');


//invalidRedirect('../');

$usersController = new usersController(new usersModel());
$usersController->usersLogin();
