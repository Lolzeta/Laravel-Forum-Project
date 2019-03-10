@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register_form" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                <div id="nameErrors" class="invalid-feedback">
                                @if ($errors->has('name'))
                                    <div>
                                       {{ $errors->first('name') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="mail" type="email" class="form-control{{ $errors->has('mail') ? ' is-invalid' : '' }}" name="mail" value="{{ old('mail') }}" required>
                                <div id="emailErrors" class="invalid-feedback">
                                @if ($errors->has('mail'))
                                    <div>
                                       {{ $errors->first('mail') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pass" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="pass" type="password" class="form-control{{ $errors->has('pass') ? ' is-invalid' : '' }}" name="pass" required>
                                <div id="passwordErrors" class="invalid-feedback">
                                @if ($errors->has('pass'))
                                    <div>
                                       {{ $errors->first('pass') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                                <div id="passwordConfirmErrors" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ mix('/js/validations/registerValidation.js')  }}" defer></script>
@endpush
