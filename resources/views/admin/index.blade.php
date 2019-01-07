@extends('layouts.app')
@section('content')
    <div class="row-fluid">
        <div class="block no-m">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Settings</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="form-horizontal" method="post" action="{{route('admin.edit')}}">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>Change site settings here</legend>
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
                            @endif
                            <div class="control-group">
                                <label class="control-label" for="site_name">Site name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="site_name" name="site_name" value="{{$settings->site_name}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="admin_email">Admin email</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="admin_email" name="admin_email" value="{{$settings->admin_email}}">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
