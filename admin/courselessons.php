<?php
require('../globals.php');
require(MODELS.'/coursesLessonsModel.php');
require(MODELS.'/coursesModel.php');
require(CONTROLLERS.'/adminCoursesLessonsController.php');



$lessonsController = new adminCoursesLessonsController();
$lessonsController->getLessons();