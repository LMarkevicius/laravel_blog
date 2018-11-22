@extends('main')

@section('title', '| create new post')

@section('stylesheets')
  <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}" />
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea',
      plugins: 'link code',
      menubar: false
    });
  </script>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>

      {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'id' => 'form', 'files' => true)) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

        {{ Form::label('category_id', 'Category:') }}
        <select class="form-control" name="category_id">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('tags', 'Tags:') }}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label('featured_image', 'Upload Featured Image:') }}
        {{ Form::file('featured_image') }}

        {{ Form::label('body', 'Description:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
      {!! Form::close() !!}
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>

  <script type="text/javascript">
		$('.select2-multi').select2();
	</script>
  {{-- <script type="text/javascript">
    $('#form').parsley('data-parsley-validate');
  </script> --}}
@endsection
