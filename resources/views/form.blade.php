@extends('layouts.no-sidebar-app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Form Example</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form class="form-horizontal" method="post" action="{{route('questions.store')}}"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <legend>Callback form</legend>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @else
                                    <div class="form-wrapper">
                                        <div class="form-col">
                                            <div class="control-group">
                                                <label class="control-label" for="author">Name</label>
                                                <div class="controls">
                                                    <input class="input-xlarge" id="author" name="author" type="text"
                                                           placeholder="Enter name ..." value="{{old('author')}}">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="email">Email</label>
                                                <div class="controls">
                                                    <input class="input-xlarge" id="email" name="email" type="text"
                                                           placeholder="Enter email ..." value="{{old('email')}}">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="question">Question</label>
                                                <div class="controls">
                                                    <textarea class="input-xlarge textarea" id="question"
                                                              name="question" rows="8"
                                                              placeholder="Enter text ...">{{old('question')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-col">
                                            <div class="">
                                                <label for="uploadbtn" class="no-m">
                                                    File
                                                </label>
                                            </div>
                                            <label for="uploadbtn" class="no-m">
                                                <div class="control-group form-border">
                                                    <p class="gray-text"> Drop files here or click to upload...</p>
                                                    <div id="drop-files" class="full-width" ondragover="return false">
                                                        <input type="file" name="file[]" id="uploadbtn"
                                                               class="hidden-input" multiple/>
                                                    </div>
                                                    <div id="uploaded-holder">
                                                        <div id="dropped-files">
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-large btn-primary">Send</button>
                                    </div>
                                    {{--                                    {!! app('captcha')->render(); !!}--}}
                                @endif
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
