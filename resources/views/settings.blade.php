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
                <form method="POST" action="{{ route('changePassword') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Old password</label>
                        <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" value="{{ old('oldPassword') }}">
                        @error('oldPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New password</label>
                        <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" value="{{ old('newPassword') }}">
                        @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPassword" class="form-label">Confirmation of the new password</label>
                        <input type="password" class="form-control @error('confirmNewPassword') is-invalid @enderror" id="confirmNewPassword" name="confirmNewPassword" value="{{ old('confirmNewPassword') }}">
                        @error('confirmNewPassword')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
