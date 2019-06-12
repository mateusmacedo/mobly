<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $routes = collect(Route::getRoutes())->map(function ($route) {
        $routeUri = explode('/', $route->uri());
        $routeDetails['methods'] = $route->methods();

        if (isset($routeUri[3]) && $routeUri[2] === str_replace(['{', '}'], '', $routeUri[3]) . 's') {
            $routeUri[3] = 'id';
        }

        $routeDetails['uri'] = implode('/', $routeUri);
        return $routeDetails;
    });

    return response()->json($routes);
});
