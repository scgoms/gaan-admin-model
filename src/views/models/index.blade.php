@extends('admin::layouts.master')

@section('content')
    <div class="flex flex-col p-2">
        <div class="flex w-full">
            <button class="bg-blue text-white rounded px-6 py-2 font-semibold">Create</button>
        </div>
    </div>
    <div class="admin-table">
        @foreach($models->items() as $model)
        <div class="row">
            <div class="flex px-2 py-1">
                <div class="w-1/2">
                    <span class="text-grey-dark">{{ $model->namespace }}\</span><a href="{{ route('admin-models') . '/' . $model->class_slug}}" class="no-underline"><span class="text-grey-darkest">{{ $model->model_name }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
