<?php

namespace IsGoms\Admin\Traits;

trait ShowsInAdminPanel{
    public function getModelNameAttribute()
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getShortName();
    }

    public function getNamespaceAttribute()
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getNamespaceName();
    }

    public function getClassSlugAttribute()
    {
        $fullname = strtolower(str_replace('/', '-', $this->full_path));
        return $fullname;
    }

    public function getFullPathAttribute()
    {
        return $this->namespace . '/' . $this->model_name;
    }
}
