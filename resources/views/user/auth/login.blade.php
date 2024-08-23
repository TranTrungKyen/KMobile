<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Toastr css --}}
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    {{-- Custorm css --}}
    <link rel="stylesheet" href="{{ asset('css/user/auth/login.css') }}">
    <title>{{ __('content.common.title.login_page') }}</title>
</head>

<body>
    <section id="app">
        <h1 class="name">{{ __('content.common.name_page.login.user') }}</h1>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form id="register-user-form" action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>{{ __('content.login_form.header.register') }}</h1>
                    <input type="text" name="name" placeholder="{{ __('content.login_form.placeholder.name') }}" />
                    @if ($errors->has('name'))
                        <span class="text-error">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                    <input type="email" name="email" placeholder="{{ __('content.login_form.placeholder.email') }}" />
                    @if ($errors->has('email'))
                        <span class="text-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                    <input type="password" name="password" placeholder="{{ __('content.login_form.placeholder.password') }}" />
                    @if ($errors->has('password'))
                        <span class="text-error">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                    <input type="password" name="password_confirmation" placeholder="{{ __('content.login_form.placeholder.password_confirmation') }}" />
                    @if ($errors->has('password_confirmation'))
                        <span class="text-error">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    @endif
                    <button>{{ __('content.common.button.register') }}</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form id="login-form" action="{{ route('user.login-account') }}" method="POST">
                    @csrf
                    <h1>{{ __('content.login_form.header.login') }}</h1>
                    <input type="email" name="email" placeholder="{{ __('content.login_form.label.email') }}" value="{{ old('email') }}"/>
                    @if ($errors->has('email'))
                        <span class="text-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                    <input type="password" name="password" placeholder="{{ __('content.login_form.label.password') }}"/>
                    @if ($errors->has('password'))
                        <span class="text-error">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                    <a href="#">{{ __('content.common.link.forgot_password') }}</a>
                    <button>{{ __('content.common.button.login') }}</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>{{ __('content.login_form.overlay.register.title') }}</h1>
                        <p>{{ __('content.login_form.overlay.register.content') }}</p>
                        <button class="ghost" id="signIn">{{ __('content.common.button.login') }}</button>

                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>{{ __('content.login_form.overlay.login.title') }}</h1>
                        <p>{{ __('content.login_form.overlay.login.content') }}</p>
                        <button class="ghost" id="signUp">{{ __('content.common.button.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Jquery --}}
    <script src="{{ asset('js/core/jquery-3.7.1.min.js') }}"></script>
    {{-- Toastr   --}}
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    {{-- Customer js   --}}
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/user/register.js') }}"></script>
    <script src="{{asset('js/user/auth/login.js')}}"></script>
    {{-- Show toastr --}}
    <script>
        // for success - green box
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>
