<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Routes middleware
    |--------------------------------------------------------------------------
    |
    | This value is an array containing the middleware used to protect all
    | the package API routes.
    | By default, the only middleware used is the "api" middleware, but it
    | should contains also the middleware to give access to your appropriate
    | users.
    |
    */

    'routes_middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Migrations
    |--------------------------------------------------------------------------
    |
    | Use the provided migrations for the permissions makr package
    | If you publish the migrations set this to false.
    |
    */

    'migrations' => true,

    /*
    |--------------------------------------------------------------------------
    | User model
    |--------------------------------------------------------------------------
    |
    | This value defines the user model namespace to use on this package.
    |
    */

    'user_model' => \App\Models\User::class,

    /*
    |--------------------------------------------------------------------------
    | Unauthorized route
    |--------------------------------------------------------------------------
    |
    | If set the package will redirect to this route if the user try to access
    | a route when he does not have the needed roles.
    | If not set, the package will return a 403 exception (Forbidden)
    |
    */

    'unauthorized_route' => null,

];
