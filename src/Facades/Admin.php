<?php

namespace IsGoms\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'Admin';
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return void
     */
    public static function routes(array $options = []){
        static::$app->make('admin')->routes($options);
    }
}
