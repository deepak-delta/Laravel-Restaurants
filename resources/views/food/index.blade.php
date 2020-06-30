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
                <div class="card-header">All Food</div>

                <div class="card-body">
                  
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($foods)>0)  
                      @foreach($foods as $food)
                        <tr>
                        <td>
                            <img src="{{asset('images')}}/{{$food->image}}" width="100">
                        </td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->category->name}}</td>
                        <td>{{$food->description}}</td>
                        <td>Rs {{$food->price}}</td>


                            <td>
                                <a href="{{route('food.edit',[$food->id])}}">
                                    <button type="submit" class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>
                               
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop{{$food->id}}">
                                    Delete
                                </button>
                                
                                <div class="modal fade" id="staticBackdrop{{$food->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Do you want to delete <b>{{$food->name}}</b> food ?
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
                  {{$foods->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
