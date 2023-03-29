@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-danger text-center">
                <b>Change password</b>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Old password</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="ConfirmNewPassword" class="form-label">Confirmation of the new password</label>
                        <input type="password" class="form-control" id="ConfirmNewPassword" name="ConfirmNewPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
