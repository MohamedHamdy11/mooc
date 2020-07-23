<?php

class adminController extends controller
{

    public function __construct()
    {
        $this->checkPermission(1);
    }

    public function index()
    {

        $clm = new coursesLessonsModel();

        $lesson = array(
            'lesson_title' => 'test lesson updated 4',
            'lesson_description' => 'the is test',
            'lesson_cover' => 'test4.jpg',
            'lesson_instructor' => 1,
            'lesson_course' => 1
        );

        if ($clm->addLesson($lesson))
        {
            echo 'ok';
            return true;
        }
        else
        {
            $this->setControllerErrors($clm->getErrors());
            return false;
        }
    }

}