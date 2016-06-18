@extends('template')

@section('content')
    <h1>Edit Post: {{ $post->title }}</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    {!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::textarea('tags', $post->tagList, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection