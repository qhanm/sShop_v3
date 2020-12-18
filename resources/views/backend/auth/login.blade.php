@extends('backend.auth.master')
@php
    use Libs\FormBuilder\FormBuilder;
@endphp

@section('content')
    <div class="card overflow-hidden" id="pjax-container">
        <div id="loader" style="display: none">
            <div class="spinner-border text-primary m-1" style="z-index: 999"></div>
        </div>
        <div class="bg-soft-primary">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p>Sign in to continue to Skote.</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="{{ asset('qBackend/assets/images/profile-img.png') }}" alt=""
                         class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div>
                <a href="index.html">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle bg-light">
                            <img src="{{ asset('qBackend/assets/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                        </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                {!! 
                    FormBuilder::open([
                    'id' => 'frmLogin',
                    'action' => route('backend.auth.checkLogin'),
                    'method' => 'POST',
                    'class' => 'form-horizontal qqq',
                    'data-pjax' => '',
                    ]) 
                !!}
                {!! FormBuilder::label('email', 'Email')->qInput('email', 'email', 'qhnam.67@gmail.com', ['placeholder' => 'Enter email']) !!}
                {!! FormBuilder::label('password', 'Password')->qInput('password', 'password', '123456', ['placeholder' => 'Enter password']) !!}
                {!! FormBuilder::label('remember', 'Remember', ['class' => 'custom-control-label'])->qInput('checkbox', 'remember', '', ['class' =>'custom-control-input']) !!}

                <div class="mt-3">
                    {!! FormBuilder::button('submit', 'Login', ['class' => 'btn btn-primary btn-block waves-effect waves-light']) !!}
                </div>



                <div class="mt-4 text-center">
                    <h5 class="font-size-14 mb-3">Sign in with</h5>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="social-list-item bg-primary text-white border-primary">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="social-list-item bg-info text-white border-info">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="social-list-item bg-danger text-white border-danger">
                                <i class="mdi mdi-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                {!! FormBuilder::close() !!}
            </div>

        </div>
    </div>
@endsection

@section('endScript')
    <script>
        $(document).on('submit', 'form[data-pjax]', function(event) {
            event.preventDefault();
            $.pjax.submit(event, '#pjax-container')
        })
    </script>
@endsection
