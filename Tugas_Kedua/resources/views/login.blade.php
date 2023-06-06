@extends('layouts.app')
@extends('layouts.navigation')
@section('content')

<div id="login-box" class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="" alt="login-image">
        </div>

        <div class="col-lg-6">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="input-email-todo" class="form-label">Email address</label>
                        <input type="email" placeholder="Email" maxlength="100" minlength="20" id="input-email-todo" width="100%" height="100%" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="input-password-todo" class="form-label">Password</label>
                        <input type="password" placeholder="Password" maxlength="100" minlength="20" id="input-password-todo" width="100%" height="100%" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" id="btn-login-todo">Login Ma Brou</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection