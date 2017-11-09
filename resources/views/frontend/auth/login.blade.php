@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    {{ trans('labels.frontend.auth.login_box_title') }}
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'form-horizontal']) }}
@if(true)
                    <div class="row  form-group">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email')
                            ->class('col control-label') }}

                            {{ html()->email('email')
                                ->class('form-control')
                                ->attribute('maxlength',191)
                                ->required()
                                ->placeholder(__('validation.attributes.frontend.email'))
                            }}
                    </div>

                    <div class="row form-group">
                        {{ html()->label(__('validation.attributes.frontend.password'))->for('password')
                            ->class('col control-label') }}

                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required() }}
                    </div>
@else
                    <div class="form-group">
                        {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->
@endif
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                </label>
                            </div>
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="row">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="form-group">
                            {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}

                            {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                            {{link_to_route('frontend.auth.register', trans('labels.frontend.auth.register_box_title'), [])}}
                            </div><!--form-group-->
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                    <div class="row text-center">
                        {!! $socialiteLinks !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection