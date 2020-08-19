<?php


class adminCoursesLessonsController extends controller
{
     private $lessonsModel;

     public function __construct()
     {
         parent::__construct();
         $this->checkPermission(1);
         $this->lessonsModel = new coursesLessonsModel();
     }

     public function getLessons()
     {
        include(VIEWS.'/back/admin/header.html');
        //course id => url
        $courseId = (isset($_GET['courseid']))? (int)$_GET['courseid']:0;

        //get lessons from db -> course id
        if($courseId>0)
        {
            $coursesModel = new coursesModel();
            $course = $coursesModel->getCourse($courseId);

            if(count($course)>0)
            {
                $coursesLessons = $this->lessonsModel->getLessonsByCourseId($courseId);
                include(VIEWS.'/back/admin/menu.html');
                include(VIEWS.'/back/admin/courselessons.html');

            }
            else
            {
                //set course not found error
                $this->setControllerErrors('Selected Course Not Found');
                include(VIEWS.'/back/admin/menu.html');

            }

        }
        else
        {
            $this->setControllerErrors('Invalid Course Selected');
            include(VIEWS.'/back/admin/menu.html');
        }

        include(VIEWS.'/back/admin/footer.html');
     }

     public function deleteLesson()
     {
         $lessonId = (isset($_GET['lessonid']))? (int)$_GET['lessonid']:0;
         if ($this->lessonsModel->deleteLesson($lessonId))
             $this->setControllerSuccess('lesson Deleted Successfully');
         else
             $this->setControllerErrors('Lesson Not Deleted, please select Valid Lesson ');

         //design
         include(VIEWS.'/back/admin/header.html');
         include(VIEWS.'/back/admin/menu.html');
         include(VIEWS.'/back/admin/footer.html');


     }



}