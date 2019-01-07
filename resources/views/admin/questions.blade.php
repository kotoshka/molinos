@extends('layouts.app')
@section('content')
    <div class="row-fluid">
        <div class="block no-m">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">List of applications</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Question</th>
                            <th>Files</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $key => $question)
                                <tr>
                                    <td>
                                        <div>{{$key + 1}}</div>
                                        <div class="delete-item">
                                            <a href="{{route('questions.delete', ['question_id' => $question->id])}}">
                                                Delete
                                            </a>
                                        </div>
                                        <div class="answer-item">
                                            <a href="{{route('questions.answer', ['question_id' => $question->id])}}">
                                                Answer
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$question->author}}</td>
                                    <td>{{$question->email}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>
                                        @foreach($question->getFiles as $file)
                                            <img width="100px" src="{{'/images/'.$file->name}}">
                                        @endforeach
                                    </td>
                                </tr>
                                @if(isset($question->answer))
                                    <tr class="answers">
                                        <td colspan="5">
                                            ANSWER: {{$question->answer}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
