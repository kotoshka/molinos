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
                        <form class="form-horizontal" method="post" action="{{route('questions.reply')}}" enctype="multipart/form-data">
                            <input type="hidden" name="question_id" value="{{$question_id}}">
                            {{csrf_field()}}
                            <fieldset>
                                <legend>Answer form for Question # {{$question_id}}</legend>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(isset( Request()->message))
                                    <span style="color: green">{{ Request()->message }}</span>
                                @else
                                    <div class="form-wrapper">
                                        <div class="form-col">
                                            <div class="control-group">
                                                <label class="control-label" for="question">Answer text</label>
                                                <div class="controls">
                                                    <textarea class="input-xlarge textarea" id="answer" name="answer" rows="8" placeholder="Enter text ...">{{old('answer')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-large btn-primary">Send</button>
                                    </div>
                                @endif
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
