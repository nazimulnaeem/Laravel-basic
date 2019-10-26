@extends('admin.layouts.master')

@section('content')


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
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($posts as $post)
                    
                    <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                  
                    </tr>
                    @endforeach
                    </tbody>
                    
                        </table>
</div>
</div>

@endsection