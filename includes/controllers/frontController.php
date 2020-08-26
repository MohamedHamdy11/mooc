<?php


class frontController extends controller
{
    public function getIndex()
    {
        //get courses from db
        $coursesModel = new coursesModel();
        //get last 10 courses
        $courses = $coursesModel->getCourses("ORDER BY `course_id` DESC LIMIT 10");

        //view index page
        $activePage = 'home';
        include(VIEWS.'/front/header.html');
        include(VIEWS.'/front/index.html');
        include(VIEWS.'/front/footer.html');
    }

    public function getCourses()
    {
        //get courses from db
        $coursesModel = new coursesModel();
        //get last courses
        $courses = $coursesModel->getCourses("ORDER BY `course_id` DESC");

        $categoriesModel = new coursesCategoriesModel();
        $categories = $categoriesModel->getCategories();


        //view page:
        $pageName = 'Courses';
        $activePage = 'courses';
        include(VIEWS.'/front/header.html');
        include(VIEWS.'/front/breadcrumbs.html');
        include(VIEWS.'/front/courses.html');
        include(VIEWS.'/front/footer.html');


    }


}