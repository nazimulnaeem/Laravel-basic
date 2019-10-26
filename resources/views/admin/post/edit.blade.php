@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">
                <h2>Edit to Post</h2>
                </div>
            
                <div class="card-body">
                <form action="{!! route('admin.post.update',$post->id) !!}" method="post">
                @csrf
                <label for="">Ttile</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="50" rows="5">
                {{ $post->description }}</textarea>
                
                <label for="">Category Name</label>
                <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>

                <input  type="submit" class="mt-2 btn btn-success" value="Publish">
                </form>
                </div>


                <br>
                <br><br>

            </div>
        </div>
    </div>

    </div>
@endsection
