<?php

function coursesCapitalTitle($courses)
{
    $newCourses = array();

    if (count($courses)>0)
    {
        foreach ($courses as $course)
        {
            $course['course_title'] = strtoupper($course['course_title']);
            $newCourses[] = $course;
        }
    }

    return $newCourses;
}


add_filter('admin_courses_display','coursesCapitalTitle');