<?php

function highRateInstructors($courses)
{
    $newCourses = array();

    if (count($courses)>0)
    {
        foreach ($courses as $course)
        {
            if($course['course_instructor'] == 5)
            {
                $course['course_title'] = '<span class="label label-success"><i class="icon-star"></i></span>' . ($course['course_title']);
                $course['rate'] = 5;
            }
            $newCourses[] = $course;
        }
    }

    return $newCourses;

}


add_filter('admin_courses_display','highRateInstructors');
