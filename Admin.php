<?php

namespace IsGoms\Admin;
use Route;

class Admin{

    protected $config;

    public function __construct(){
        $this->config = config('admin');
    }

    public function routes($options = [])
    {
        $prefix = $this->config['route_prefix'];
        Route::get("{$prefix}/", '\IsGoms\Admin\Controllers\AdminController@index')->name('admin-home');
    }
}
