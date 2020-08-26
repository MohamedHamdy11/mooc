<?php
require('globals.php');
require(MODELS.'/coursesModel.php');
require(CONTROLLERS.'/frontController.php');

$frontController = new frontController();
$frontController->getIndex();




