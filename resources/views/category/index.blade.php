@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Categories</div>

                <div class="card-body">
                  
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($cate)>0)  
                      @foreach($cate as $key=>$ca)
                        <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$ca->name}}</td>
                            <td>
                                <a href="{{route('category.edit',[$ca->id])}}">
                                    <button type="submit" class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                      @endforeach 
                      @else
                        <td>No Data</td>
                      @endif  
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
