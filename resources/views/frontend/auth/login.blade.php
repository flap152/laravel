@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')
    <style>
        .card, .card-body, .card-header {
            text-align: left;
        }
    </style>
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.auth.login_box_title') }}
                    </strong>
                </div><!--card-header-->


                <div class="card-body">
                    {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'form-horizontal']) }}
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                            {{ html()->email('email')
                                ->class('form-control')
                                ->attribute('maxlength',191)
                                ->required()
                                ->placeholder(__('validation.attributes.frontend.email'))
                            }}
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required() }}
                    </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="checkbox">
                                    {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ form_submit(__('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}
                                &thinsp;&thinsp;&thinsp;{{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                                &thinsp;&thinsp;&thinsp;{{link_to_route('frontend.auth.register', trans('labels.frontend.auth.register_box_title'), [])}}
                            </div><!--form-group-->
                        </div><!--col-md-6-->
                    </div><!--form-group-->
                    {{ html()->form()->close() }}

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                            {!! $socialiteLinks !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection