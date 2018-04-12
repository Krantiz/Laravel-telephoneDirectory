@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <div class="row">
                          <div class="col-md-6"><p>Telephone directory</p></div>
                          <div class="col-md-6"><a href="/add-contacts" class="btn btn-info" role="button">Add Contact</a></div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                   <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th>Image</th> -->
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>E-Mail Address</th>
                                <th>Mobile Number</th>
                                <th>Landline Number</th>
                                <th>Notes</th>
                                <th>Added Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($all_contacts))
                                @foreach ($all_contacts as $contact)
                            <tr>
                                <!-- Due to shortage of time, Commenting Profile Pic column as it needs more styling effort to accomodate any image -->
                                <!-- <td style=""> -->
                                    <!-- @if(!empty($contact->image)) -->
                                      <!-- <img id="prfImg" src="{{$contact->image}}" alt="..."> -->
                                      <!-- {{$contact->image}} -->
                                    <!-- @else -->
                                       <!-- <img id="prfImg" src="/uploads/photos/profile-img-dummy.jpg" alt="..."> -->
                                    <!-- @endif -->
                                <!-- </td> -->
                                <td>
                                    @if(!empty($contact->first_name))
                                      {{$contact->first_name}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->middle_name))
                                      {{$contact->middle_name}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->last_name))
                                      {{$contact->last_name}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->email))
                                      {{$contact->email}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->mobile_number))
                                      {{$contact->mobile_number}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->landline_number))
                                      {{$contact->landline_number}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($contact->created_at))
                                      {{$contact->created_at}}
                                    @else
                                       Not added.
                                    @endif
                                </td>
                            </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- <th>Image</th> -->
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>E-Mail Address</th>
                                <th>Mobile Number</th>
                                <th>Landline Number</th>
                                <th>Notes</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<style type="text/css">
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    p {
        font-size: 20px;
        color: red;
        font-weight: bold;
    }
</style>
@endsection
