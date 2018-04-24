@extends('layouts.login')
@section('content')
    <div class="row">
        <div class="container-login">
            <div class="text-center login-box">
                <div class="login-form-1">
                    <div class="logo">
                        <img src="{{url('/')}}/assets/img/mate-logo.png">
                    </div>
                    <form id="login-form" class="text-left">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">
                                <div class="form-group">
                                    <label for="email" class="sr-only">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <button type="submit" class="login-button">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection