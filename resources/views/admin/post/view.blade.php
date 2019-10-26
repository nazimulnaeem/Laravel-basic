@extends('admin.layouts.master')

@section('content')
<div class="mb-3">
    <form class="form-inline my-2 my-lg-0" method="get" action="{!! route('search') !!}">
     <div class="input-group">
  <input type="text" class="form-control" name="search" placeholder="Search " aria-label="Text input with segmented dropdown button">
  <div class="input-group-append">
    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-search" ></i></button>
    
  </div>
  </div>
    </form>
</div>

<div class="card">
<div class="card-body">
<table class="table table-striped table-hover" id="dataTable">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>User Name</th>
                        <th>Category Name</th>
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($posts as $post)
                    
                    <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ str_limit($post->title,10) }}</td>
                    <td>{{ str_limit($post->description,30) }}</td>
                    <td>
                    <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-primary btn-sm">Show</a>
                    
            <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('admin.post.delete',$post->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $post->id }}').submit();
              }else {
                  event.preventDefault();
                      }"><a class="">delete</a></button>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    
                    <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>User Name</th>
                        <th>Category Name</th>
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Action</th>
                        </tr>
                    </tfoot>
                        </table>
</div>
</div>
@endsection