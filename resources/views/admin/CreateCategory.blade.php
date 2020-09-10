@extends('adminlte::page')
@section('title','Add Category')

@section('content')
    <div class="container">
        <div class="card rounded-0" style="border-top: 4px solid var(--indigo)">
            <div class="card-header">
                <a href="{{route('categories.index')}}" class="btn bg-indigo"><i class="fa fa-list mr-1"></i> View Categories</a>
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="POST">
            
                    @csrf
                    
                    <h4 class="box-title">Add new Category</h4>
                    
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
        
                    <button type="submit" name="add" class="btn bg-indigo btn-block my-4">Add Category</button>
                </form>
            </div>        
        </div>
    </div>
@stop