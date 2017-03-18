@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page->title }}</div>

                <div class="panel-body">
                    {{ $page->excerpt }} <br/>
                    {{ $page->body }}
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($page->posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>

                    <div class="panel-body">
                        {{ $post->excerpt }} <br/>
                        {{ $post->body }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
