@extends('layout.main')
@php
    $user = session('info');
@endphp
@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px">Change Password</h4>
                    <div class="nk-block-des text-soft">
                        <p>You can change your password here.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="row">
                <div class="col-md12">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                @if(isset($_GET['invalid']))
                                <div class="alert alert-danger">
                                    <b>Invalid Password</b>. Current Password is not correct. Please try again. Thank you.
                                </div>
                                @endif
                                @if(isset($_GET['nm']))
                                <div class="alert alert-warning">
                                    <b>Password Not Match</b>. Please try again. Thank you.
                                </div>
                                @endif
                                @if(isset($_GET['success']))
                                <div class="alert alert-success">
                                    <b>Password Changed</b>. Your password is not updated.
                                </div>
                                @endif
                                <form action="{{ route('change.password') }}" method="post">
                                    @csrf
                                    <table class="table table-bordered text-dark" style="border-color: #ddd;">
                                        <tr>
                                            <td width="150" style="text-align: right"><b># </b></td>
                                            <td colspan="5">Change Password</td>
                                        </tr>
                                        <tr>
                                            <td width="170" style="text-align: right; padding-top: 15px;"><b>Current
                                                    Password :
                                                </b></td>
                                            <td>
                                                <input type="password" name="inp_current" placeholder="Current Password here.." class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="170" style="text-align: right; padding-top: 15px;"><b>New
                                                    Password :
                                                </b></td>
                                            <td>
                                                <input type="password" name="inp_new" placeholder="New Password here.." class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="170" style="text-align: right; padding-top: 15px;"><b>Repeat
                                                    Password :
                                                </b></td>
                                            <td>
                                                <input type="password" name="inp_repeat" placeholder="Repeat Password here.." class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="row mt-">
                                        <div class="col-md-12">
                                            <hr>
                                            <center>
                                                <button class="btn btn-wider btn-lg btn-primary">
                                                    <em class="icon ni ni-user-check"></em>
                                                    <span>Change Password</span>
                                                </button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function update(type, value) {
        $.ajax({
            url: '/api/deductions',
            type: 'POST',
            data: {
                type: type,
                value: value
            },
            success: function(response) {
                console.log(response);
                document.getElementById(type).innerHTML = 'UPDATED';
                document.getElementById(type).style.color = 'green';
            }
        });
    }
</script>
@endsection