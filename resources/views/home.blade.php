@extends('main')

@section('content')
    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="/article/{{ $post->post_name }}">
                <h2 class="post-title">
                    {{ $post->post_title }}
                </h2>
                <div>
                    <img src="{{ $post->image_file }}"/>
                    <p class="post-subtitle">
                        {{ $post->post_content }}
                    </p>
                </div>
            </a>
            <p class="post-meta">Posted by  {{ $post->author->name }} on {{ $post->created_at }}
            </p>
        </div>
        <hr/>
    @endforeach
@endsection