<?php

namespace IsGoms\Admin;
use Route;
use Storage;

class Admin{

    protected $config;

    public function __construct(){
        $this->config = config('admin');
    }

    public function routes($options = [])
    {
        $prefix = $this->config['route_prefix'];
        Route::get("{$prefix}/", '\IsGoms\Admin\Controllers\AdminController@index')->name('admin-home');

        Route::get("{$prefix}/models", '\IsGoms\Admin\Controllers\ModelsController@index')->name('admin-models');
        Route::get("{$prefix}/models/{model}", '\IsGoms\Admin\Controllers\ModelsController@show');
    }

    public function models()
    {
        $model_directory = $this->config['model_directory']; $excludes = $this->config['excluded_models']; $disk = Storage::disk('models'); $files = [];
        if ( $model_directory === '/' ) { $files = collect($disk->files()); }
        else { $files = collect($disk->allFiles()); }
        return new ModelRepository($files, $excludes);
    }
}
