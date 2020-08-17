<?php
require('../globals.php');
require(MODELS.'/coursesModel.php');
require(CONTROLLERS.'/adminCoursesController.php');


$adminCoursesController = new adminCoursesController();
$adminCoursesController->getCourses();
