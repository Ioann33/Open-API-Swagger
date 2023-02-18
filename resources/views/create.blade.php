@extends('layouts.app')

@section('content')
    <div class="alert-danger  error-window" style="width: 300px; display: none; margin: 50px auto 0; padding: 20px"></div>
    <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0" style="margin-top: 100px">
        <div class="row bg-white shadow-sm">
            <div class="col border rounded p-4">
                <h3 class="text-center mb-4">Create User</h3>
                <form style="width: 500px" class="create-form" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputUname">Name</label>
                        <input type="text" class="form-control" id="exampleInputUname" aria-describedby="emailHelp" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" aria-describedby="emailHelp" name="photo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirm">Password Confirm</label>
                        <input type="password" class="form-control" id="exampleInputConfirm" name="passConf" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Sign up</button>
                </form>
            </div>
        </div>
    </div>
@endsection
