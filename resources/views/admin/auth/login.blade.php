@extends('layouts.admin.custom-base')

@section('title', 'Grupos Altos - Login')

@section('styles')
@endsection


@section('body')

    <div class="row authentication authentication-cover-main mx-0">
            <div class="col-xxl-8 col-xl-7">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-5 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                        <div class="card custom-card my-4 border">
                            <form method="post" action="{{ route('login.post') }}" class="card-body p-5">
                                @csrf
                                <div class="text-center">
                                    <img src="{{ asset('ecommerce/assets/web/logo/LOGO-ALTOS-COLOR.png') }}" width="180px" class="img-fluid" alt="">
                                </div>
                                <p class="text-muted mb-4 text-center">Empecemos</p>
                                <div class="text-center my-3 authentication-barrier">
                                    <span class="fs-16">o</span>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signup-firstname" class="form-label text-default">Correo</label>
                                        <input type="text" class="form-control" id="signup-firstname" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signup-password" class="form-label text-default">Contraseña</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input" id="signup-password" name="password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password',this)"  id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">Soporte <a href="sign-in-basic.php" class="text-primary fw-medium">Aquí</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-12 d-xl-block d-none px-0">
                <div class="authentication-cover overflow-hidden">
                    <div class="authentication-cover-logo"> 
                        <a href="index.php"> 
                            {{-- <img src="{{ asset('admin/assets/images/brand-logos/desktop-white.png') }}" alt="" class="authentication-brand desktop-white">  --}}
                        </a> 
                    </div>
                    <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <img src="{{ asset('admin/assets/images/login.svg') }}" width="70%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection