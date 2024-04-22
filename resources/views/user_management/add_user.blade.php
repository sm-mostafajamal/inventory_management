@extends('layouts.main')

@section('content')
    <x-sidebar data="user_management" />
    <div class="main-panel">
        <div class="content">

            @if (Session::has('success'))
                <div class="alert alert-success notification-bar">{{ Session::get('success') }}</div>
            @endif
            <form method="POST" action="{{ route('user-management.add', ['action' => 'create_user']) }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" id="user_edit_header">
                                <h2 class="title">User Information <span> < Add >  </span></h2>
                                <a href="{{ route('user-management') }}">
                                    <input type="button" value="Back" class="btn btn-fill btn-primary">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                   value="{{ old('name') }}" style="border-color: {{$errors->has('name') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Email" name="email"
                                                   value="{{ old('email') }}" style="border-color: {{$errors->has('email') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="username"
                                                   name="username" value="{{ old('username') }}" style="border-color: {{$errors->has('username') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('username'))
                                            <div class="error">{{ $errors->first('usename') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" placeholder="phone number"
                                                   name="phone" value="{{ old('phone') }}" style="border-color: {{$errors->has('phone') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="password"
                                                   name="password" value="" style="border-color: {{$errors->has('password') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="confirm password"
                                                   name="confirm_password" value="" style="border-color: {{$errors->has('confirm_password') ? 'red' : '' }}">
                                        </div>
                                        @if($errors->has('confirm_password'))
                                            <div class="error">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="author">
                                    <div class="block block-one"></div>
                                    <div class="block block-two"></div>
                                    <div class="block block-three"></div>
                                    <div class="block block-four"></div>
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets') }}/img/anime3.png" alt="...">
                                        <h4 class="title" style="margin-top: 1rem"></h4>
                                    </a>

                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection


