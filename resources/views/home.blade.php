@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo App</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body container">
                                        <form enctype="multipart/form-data" class="form-horizontal" id="addmeeting" method="{{isset($edit)?"GET":"POST"}}" action="{{isset($edit)?"/todo/update/".$id:"/todo/add"}}">
                                            {{ csrf_field() }}
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="title" class="col-md-4 control-label">Title</label>
                                                <div class="col-md-6">
                                                    <input id="title" required="" type="text" class="form-control" name="title"
                                                           placeholder="Enter Title" value="{{isset($edit)?$edit->title:""}}">
                                                    @if ($errors->has('title'))
                                                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label for="description" class="col-md-4 control-label">Description</label>
                                                <div class="col-md-6">
                                                    <input id="description" required="" type="text" class="form-control"
                                                              name="description" placeholder="Please enter Decription"
                                                              value="{{isset($edit)?$edit->decription:""}}"
                                                    />
                                                    @if ($errors->has('value'))
                                                        <span class="help-block"><strong>{{ $errors->first('value') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-success">
                                                        {{isset($edit)?"Edit":"Add"}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="d-flex"><strong class="btn btn-block btn-outline-light disabled bg-danger"><h4>Todo List:</h4></strong></div>
                                        <hr>
                                        <div class="accordion" id="accordionExample">
                                            @foreach($todos as $todo)
                                                    <div class="d-flex overflow-hidden">
                                                        <div class="p-3">
                                                            <div class="bg-light">
                                                            <a class="btn btn-outline-info btn-block" data-toggle="collapse" href="#{{'todo'.$todo->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                                                {{$todo->title}}</a>
                                                            <div class="collapse multi-collapse" id="{{'todo'.$todo->id}}">
                                                                <div class="card card-body">
                                                                    {{$todo->decription}}
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-3 ">
                                                            <a href="{{'/todo/edit/'.$todo->id}}" class="btn btn-warning btn-block">Edit</a>
                                                        </div>
                                                        <div class="p-3">
                                                            <a href="{{'/todo/delete/'.$todo->id}}" class="btn btn-danger btn-block">Delete</a>
                                                        </div>
                                                    </div>
                                                <hr>
                                            @endforeach
                                            <div class="d-flex d">
                                                {{$todos->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .d-flex{
        justify-content: center;
    }
</style>
