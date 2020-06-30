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
            <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Add New Food</div>
    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="10" rows="3"></textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                
                                <option value="">Select Category</option>
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror

                            
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
    
                    </div>
                </div>

            </form>
            
        </div>
    </div>
</div>
@endsection
