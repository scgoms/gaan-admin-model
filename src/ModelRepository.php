<?php

namespace IsGoms\Admin;

class ModelRepository{

    protected $items;
    public function __construct($items, $excludes)
    {
        $this->items = collect();
        $this->items = $this->mapItems($items, $excludes);
    }

    protected function mapItems($items, $excludes){
        return $items->map(function($item, $key) {
            return $this->getClassPath($item);
        })->filter(function($item, $key) use ($excludes){
            return !in_array($item, $excludes);
        })->map(function($item, $key){
            return new $item;
        });
    }

    protected function getClassPath($file)
    {
        $file_details = pathinfo($file);
        if($file_details['dirname'] === '.'){
            return 'App\\' . $file_details['filename'];
        }else {
            return 'App\\' . config('admin.model_directory') . '\\' . $file_details['dirname'] .'\\' . $file_details['filename'];
        }
    }

    public function items()
    {
        return $this->items;
    }
}
