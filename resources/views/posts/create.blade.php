@extends('main')

@section('background-image')
    background-image: url('../../images/post-bg.jpg')
@endsection

@section('content')

    <h1>Edit Post</h1> <hr/>

    @if(session()->has('article_success_message'))
        <div class="alert alert-success">
            {{ session()->get('article_success_message') }}
        </div>
    @elseif(session()->has('article_error_message') && session()->get('article_error_message') != '')
        <div class="alert alert-danger">
            {{ session()->get('article_error_message') }}
        </div>
    @endif

    <form name="sentMessage" method="post" action="{{ route('article.new') }}" enctype="multipart/form-data" novalidate>
        @method('POST')
        @csrf
        <input type="hidden" name="type" value="article"/>
        {{ csrf_field() }}
        <div class="control-group">
            <div class="form-group  controls">
                <label>Post Names</label>
                <input type="text" class="form-control" name="name" placeholder="Name" id="name" required data-validation-required-message="Please enter post name.">
                <p class="help-block text-danger">{{ $errors->first('name') }}</p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group controls">
                <label>Post title</label>
                <input type="text" class="form-control" name="title" placeholder="post title" id="title" required data-validation-required-message="Please enter post title.">
                <p class="help-block text-danger">{{ $errors->first('title') }}</p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group controls">
                <label>Post Image</label>
                <input type="file" class="form-control" name="image_file" placeholder="post image" id="image_file" required data-validation-required-message="Please upload post image.">
                <p class="help-block text-danger">{{ $errors->first('image_file') }}</p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group controls">
                <label>Post status</label>
                <select class="form-control" name="status">
                    <option value="PUBLIED">Publied</option>
                    <option value="DRAFT">Draft</option>
                </select>
                <p class="help-block text-danger">{{ $errors->first('status') }}</p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group controls">
                <label>Post category</label>
                <select class="form-control" name="category">
                    <option value="vie">Everyday life</option>
                    <option value="sociale">Relatives</option>
                    <option value="actualiste">Actuality</option>
                </select>
                <p class="help-block text-danger">{{ $errors->first('category') }}</p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="content" id="content" required data-validation-required-message="Please enter content."></textarea>
                <p class="help-block text-danger">{{ $errors->first('content') }}</p>
            </div>
        </div>
        <br>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success" id="saveArticle">Save</button>
        </div>
    </form>
@endsection
