@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
              <div class="alert alert-success col-lg-12 col-md-12 col-xs-12">
                <strong>Success!</strong> {{ session('status') }}
              </div>
        @endif
        @if (session('incorrect'))
              <div class="alert alert-warning col-lg-12 col-md-12 col-xs-12">
                <strong>Success!</strong> {{ session('incorrect') }}
              </div>
        @endif
        @if ($errors->has('notSave'))
          <div class="alert alert-danger col-lg-12 col-md-12 col-xs-12">
            <strong>Error!</strong> {{ $errors->first('notSave') }}
          </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Contact</div>
                <div class="panel-body">
                    
                    {!!  Form::open(array('route' => array('add'), 'files' => true, 'onsubmit' => 'return validateForm()', 'class' => 'form-horizontal'))  !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name*</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                            <label for="middle_name" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">

                                @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name*</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile  Number</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="mobile_number" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}">

                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('landline_number') ? ' has-error' : '' }}">
                            <label for="landline_number" class="col-md-4 control-label">Landline Number</label>

                            <div class="col-md-6">
                                <input id="landline_number" type="landline_number" class="form-control" name="landline_number" value="{{ old('landline_number') }}">

                                @if ($errors->has('landline_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('landline_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Notes</label>

                            <div class="col-md-6">
                                <textarea id="notes" type="textarea" class="form-control" name="notes" value="{{ old('notes') }}"></textarea>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Profile-Picture', 'Profile Picture:') !!}
                                    {!! Form::file('image',null,['class'=>'form-control', 'accept'=>'.jpg,.jpeg,.png']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateForm() {
        if( (!isValidFile($('#global_best_practice_report').val()) ) ){
                alert("Please upload valid (.jpg or .png) file.");
                return false;
            }
        }
    }

    function isValidFile(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {

        case 'jpeg':
        case 'jpg':
        case 'png':
            // etc
            return true;
        }
        return false;
    }

    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }
</script>
@endsection
