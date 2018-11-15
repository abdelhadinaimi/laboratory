@extends('layouts.login')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login')}}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Connectez-vous via votre compte easyLAB<br>
                        <img style="width: 150px" src="{{asset('easyLAB.png')}}">
                    </span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        
                                <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        <div class="col-md-6">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                       
                                <input  id="password" type="password" class=" input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Mot de passe</span>
                        <div class="col-md-6">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Se souvenir de moi') }}
                            </label>
                        </div>

                        <div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Connexion') }}
                        </button>
                    </div>
                    
                </form>

                <div class="login100-more" style="background-image: url('{{asset('labo/login_page/images/bg-01.jpg')}}');">
                </div>
            </div>
        </div>
    </div>
    @endsection
