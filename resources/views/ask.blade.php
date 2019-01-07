<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/____header.css') }}">--}}
</head>
<body>
<style>

</style>
<div class="container">
    <div class="row main-form">
        <form class="js-callback-form" method="post" action="{{route('questions.store')}}" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="form-group">
                <label for="author" class="cols-sm-2 control-label">Your Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="author" id="author" placeholder="Enter your Name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="question" class="cols-sm-2 control-label">Question</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <textarea id="question" name="question" rows="5" cols="40" class="form-control custom-round-angle"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="cols-sm-2 control-label">Files</label>
                <div class="cols-sm-10">
                    <div class="input-group full-width custom-file-uploader">
                        <label for="uploadbtn" class="no-m">
                            <div id="drop-files" class="full-width" ondragover="return false">
                                <p> Drop files here or click to upload</p>
                                <input type="file" id="uploadbtn" class="hidden" multiple />
                            </div>
                        </label>
                        <div id="uploaded-holder">
                            <div id="dropped-files">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block login-button" type="submit" id="submit-all">Send</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>