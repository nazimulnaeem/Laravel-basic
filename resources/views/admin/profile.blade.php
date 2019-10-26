@extends('admin.layouts.master')

@section('content')

<div class="card">
                <div class="card-header">{{ __('Profile Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-5">
                               <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-5">
                               <input name="email" type="text" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Old Image</label>
                            <div class="col-md-5"> 
                            <img src="{!! asset('images/profile/'.Auth::user()->image) !!}" width="100" alt="User image">  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Add New Image</label>
                            <div class="col-md-5"> 
                          <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ddescription') }}</label>
                            <div class="col-md-5">
                            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ Auth::user()->description }}</textarea>
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <a href="">Cancel</a>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

@endsection