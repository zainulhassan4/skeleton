@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page->title }}</div>

                <div class="panel-body">
                    {{ $page->excerpt }} <br/>
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page->posts[0]->title }}</div>

                <div class="panel-body">
                    {{ $page->posts[0]->excerpt }} <br/>
                    {!! $page->posts[0]->body !!}
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($page->posts[0]->comments as $comment)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $comment->user->name }}</div>

                    <div class="panel-body">
                        {{ $comment->active
                            ? $comment->body
                            : 'The comment has been blocked by the admin: ' 
                        }} <br/>
                        <i>{{ $comment->admin_remark }}</i>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
