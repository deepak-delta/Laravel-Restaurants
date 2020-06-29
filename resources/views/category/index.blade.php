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
                               
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop{{$ca->id}}">
                                    Delete
                                </button>
                                
                                <div class="modal fade" id="staticBackdrop{{$ca->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="{{route('category.destroy',[$ca->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Conform Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Do you want to delete <b>{{$ca->name}}</b> category ?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Yes</button>
                                            </div>
                                        </form>
                                      </div>
                                    
                                    </div>
                                </div>

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
