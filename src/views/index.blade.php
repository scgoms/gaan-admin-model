@extends('admin::layouts.master')

@section('content')
    <div class="flex flex-col bg-blue px-1 py-2">
        <a href="{{ route('admin-home') }}">
            <i class="material-icons md-36">home</i>
        </a>
    </div>
    <div class="flex flex-1 bg-green">Content</div>
@endsection
