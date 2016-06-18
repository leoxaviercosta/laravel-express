@extends('template')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <b>Tags:</b>
        @foreach($post->tags as $tag)
            {{ $tag->name }} |
        @endforeach

        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <b>Name: </b> {{ $comment->name }} <br>
            <b>Comment: </b> {{ $comment->comment }}
        @endforeach

        <hr>
    @endforeach

    <!-- Adicionado paginação -->
    {!! $posts->render() !!}

@endsection