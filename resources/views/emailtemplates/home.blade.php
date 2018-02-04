@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif

    <div class="row">
       <a href="{{url('/create/emailtemplate')}}" class="btn btn-success">Create Email-Template</a>
       <a href="{{url('/emailtemplates')}}" class="btn btn-default">All Email-Templates</a>
    </div>
</div>
@endsection
