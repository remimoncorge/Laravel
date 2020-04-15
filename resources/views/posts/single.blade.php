@extends('main')

@section('content')
    <div class="post-preview">
        <h2 class="post-title">
            <?=$post->post_title?>
        </h2>
        <p class="post-meta">Posted by <?=$post->author->name?> on <?=$post->created_at?></p>
        <p><img src="{{ $post->image_file }}"/></p>
        <p class="post-content">
            <?=$post->post_content?>
        </p>
        <div>
             <h3>COMMENT LIST</h3>
             <hr/>
             @comments(['model' => $post])
        </div>
    </div>
    <hr/>
@endsection
