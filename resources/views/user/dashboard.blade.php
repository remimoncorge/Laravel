@extends('main')

@section('content')
    <div class="dashboard-articles">
        <div class="pull-left">
            <marquee behavior="" direction="">CRUD ARTICLES USER PAGE</marquee>
        </div>
        <br>
        <div class="pull-right text-right mb-3">
            <a href="/create" class = "btn btn-sm btn-success">Add New Article</a>
        </div>

        @if(session()->has('article_success_message'))
            <div class="alert alert-success">
                {{ session()->get('article_success_message') }}
            </div>
        @elseif(session()->has('article_error_message') && session()->get('article_error_message') != '')
            <div class="alert alert-danger">
                {{ session()->get('article_error_message') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="w-25">Name</th>
                <th class="w-25">Image</th>
                <th class="w-75">Title</th>
                <th class="w-auto">Status</th>
                <th class="w-auto">Category</th>
                <th class="w-50">Operator</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->post_name }}</td>
                    <td><img src="{{ $post->image_file }}"/></td>
                    <td>{{ $post->post_title }}</td>
                    <td class="text-center">{{ $post->post_status }}</td>
                    <td class="text-center">{{ $post->post_category }}</td>
                    <td class="text-center">
                        <form method="POST" class="mb-3" action="{{ route('article.edit',$post->id) }}">
                            @method('PUT')
                            @csrf
                            <a href="/article/edit/<?=$post->id?>" class="btn btn-warning">Edit</a>
                        </form>
                        <a href="/article/<?=$post->post_name?>" class="btn btn-success mb-3">Show</a>
                        <form method="post" action="{{route('article.delete',$post->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <br/>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
