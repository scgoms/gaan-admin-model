<?php

namespace IsGoms\Admin\Controllers;

use App\Http\Controllers\Controller;
use Admin;

class ModelsController extends Controller{

    public function index()
    {
        $models = Admin::models();
        return view('admin::models.index', compact('models'));
    }

    public function show($slug)
    {
        $class_path = $this->slugToClassPath($slug);
        $model = new $class_path;

    }

    protected function slugToClassPath($slug)
    {
        return implode('\\', array_map('ucfirst', explode('-', $slug)));
    }
}
