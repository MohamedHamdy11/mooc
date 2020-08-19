<?php
require('../globals.php');
require(MODELS.'/coursesLessonsModel.php');
require(CONTROLLERS.'/adminCoursesLessonsController.php');



$lessonsController = new adminCoursesLessonsController();
$lessonsController->deleteLesson();