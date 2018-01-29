@extends('emailtemplates.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Edit emailtemplate</h3>
      </div>
    </div>
  </div>

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whooops!! </strong> There were some problems with your input.<br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::model($emailtemplate, ['method'=>'PATCH','route'=>['emailtemplates.update', $emailtemplate->id]])!!}
    @include('emailtemplates.form')
  {!! Form::close() !!}

@endsection
