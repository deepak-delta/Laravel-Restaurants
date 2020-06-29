@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Categories</div>

                <div class="card-body">
                  @foreach($cate as $ca)
                <p>{{$ca->name}}</p>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
