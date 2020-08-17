<?php
require('../globals.php');
require(MODELS.'/coursesModel.php');
require(CONTROLLERS.'/adminCoursesController.php');

$coursesController = new adminCoursesController();
$coursesController->deleteCourse();