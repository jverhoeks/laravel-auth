@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
     <a href="{{url('/create/emailtemplate')}}" class="btn btn-success">Create Email-Template</a>
  </div>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Subject</td>
              <td>Content</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($emailtemplates as $emailtemplate)
            <tr>
                <td>{{$emailtemplate->id}}</td>
                <td>{{$emailtemplate->name}}</td>
                <td>{{$emailtemplate->subject}}</td>
                <td>{{$emailtemplate->content}}</td>
                <td><a href="{{action('EmailTemplateController@edit',$emailtemplate->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('EmailTemplateController@destroy', $emailtemplate->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
