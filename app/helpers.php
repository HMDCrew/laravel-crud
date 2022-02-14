<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('item_active')) {
    function item_active($request, $routes, $callback)
    {

        foreach ($routes as $route) {
            if( $request->routeIs($route) ) {
                return $callback;
            }
        }
        return false;
    }
}



if (!function_exists('permice_chacked')) {
    function permice_chacked($request, $permice)
    {
        foreach ($request as $value) {
            if ( $value->id == $permice ) {
                return true;
            }
        }
        return false;
    }
}



