<?php
require('../globals.php');
require(MODELS.'/coursesModel.php');
require(MODELS.'/usersModel.php');
require(MODELS.'/coursesCategoriesModel.php');
require(CONTROLLERS.'/adminCoursesController.php');

$coursesController = new adminCoursesController();
$coursesController->searchCourses();
