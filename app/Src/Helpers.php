<?php

if (!function_exists('activeLink')) {
    /**
     * Выделение активной ссылки в навбаре
     *
     * @param string $route
     * @return string
     */
    function activeLink(string $route): string
    {
        return Route::is($route) ? 'active fw-bold' : '';
    }
}
