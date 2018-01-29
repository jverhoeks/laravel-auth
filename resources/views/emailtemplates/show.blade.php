@extends('emailtemplates.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Show emailtemplate </h3> <a class="btn btn-xs btn-primary" href="{{ route('emailtemplates.index') }}">Back</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Title : </strong>
        {{ $emailtemplate->title }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Body : </strong>
        {{ $emailtemplate->body }}
      </div>
    </div>
  </div>

@endsection
