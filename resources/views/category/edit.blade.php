@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif   
        <form action="{{route('category.update',[$cate->id])}}" method="post">@csrf
            {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Update category</div>

                <div class="card-body">
                   <div class="form-group">
                      <label for="name">Name</label> 
                   <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$cate->name}}">
                   @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                          
                      @enderror

                   </div>

                   <div class="form-group">
                       <button type="submit" class="btn  btn-outline-primary">Update</button>
                   
                 </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
