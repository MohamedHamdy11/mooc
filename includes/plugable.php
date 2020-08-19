<?php

$actions = array();

function add_action($hook,$functionName)  //hook OR node
{
    global $actions;
    $actions[$hook][] = $functionName;
}

function do_action($hook)
{
    global $actions;

    if(isset($actions[$hook]))
    {
        foreach($actions[$hook] as $functionName)
        {
            if(function_exists($functionName))
                call_user_func($functionName);

        }
    }
}


$filters = array();

function add_filter($hook,$functionName)
{
    global $filters;
    $filters[$hook][] = $functionName;
}

function do_filter($hook,$content)
{
    global $filters;

    if(isset($filters[$hook]))
    {
        foreach($filters[$hook] as $functionName)
        {
            if(function_exists($functionName))
                $content = call_user_func($functionName,$content);

        }
    }

    return $content;
}