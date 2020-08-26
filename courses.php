<?php
require('globals.php');
require(MODELS.'/coursesModel.php');
require(MODELS.'/coursesCategoriesModel.php');
include(CONTROLLERS.'/frontController.php');

$frontController =new frontController();
$frontController->getCourses();