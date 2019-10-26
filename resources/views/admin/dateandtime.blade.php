@extends('admin.layouts.master')

@section('content')
          <div class="row">
                <div class="col-md-5 col-sm-6">
                    <form class="reservation-form" method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                
                                <div class="form-group">
                                <label for="">Date and time picker</label>
                                    <input type="text" class="form-control iconified" name="dateandtime" id="datetimepicker1" required="required" placeholder="&#xf017;  Time">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <button type="submit" id="submit" name="submit" class="btn btn-success">
                                    <span><i class="fa fa-check-circle-o"></i></span>
                                    Submit
                                </button>
                            </div>
                                
                        </div>
                    </form>
                </div>


@endsection