<?php

use Illuminate\Support\Carbon;

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

if (!function_exists('getDeadlineForHuman')) {

    /**
     *  Возвращает временную разницу в человеко читаемом формате
     *
     * @param $date
     * @return string
     */
    function getDeadlineForHuman($date): string
    {
        if (!$date) {
            return 'Бессрочно';
        }
        $carbonDate = new Carbon($date);
        $res = $carbonDate->diffForHumans(['parts' => 2, 'short' => true]);
        return $res;
    }
}
