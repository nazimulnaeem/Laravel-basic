@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h2>
{{$post->title}}
</h2>

<small>post by <strong><a href="">{{$post->user->name}}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>

</div>
<div class="card-body">
<p>{{ $post->description }}</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<div class="card-header">
<h3>{{ $post->category->name }}</h3>
</div>
</div>
</div>

</div>
</div>


@endsection