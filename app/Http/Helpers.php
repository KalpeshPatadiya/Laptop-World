<?php

//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active bg-gradient-primary")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}

function getNavActiveClass($routeName = [])
{
    if (is_array($routeName)) {
        foreach ($routeName as $route) {
            if (Route::currentRouteName() == $route) {
                return 'active bg-gradient-primary';
            }
        }
    } else {
        if (Route::currentRouteName() == $routeName) {
            return 'active bg-gradient-primary';
        }
    }
}
