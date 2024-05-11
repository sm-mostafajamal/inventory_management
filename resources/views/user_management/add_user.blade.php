@extends('layouts.main')

@section('content')
    <x-sidebar data="user_management" />
    <div class="main-panel">
        <div class="content">
            <x-notification />
            <form method="POST" action="{{ route('user-management.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" id="user_edit_header">
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
                                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" name="name"
                                                   value="{{ old('name') }}" >
                                        </div>
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" name="email"
                                                   value="{{ old('email') }}">
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
                                            <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : '' }}" placeholder="username"
                                                   name="username" value="{{ old('username') }}" >
                                        </div>
                                        @if($errors->has('username'))
                                            <div class="error">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : '' }}" placeholder="phone number"
                                                   name="phone" value="{{ old('phone') }}">
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
                                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="password"
                                                   name="password" value="" >
                                        </div>
                                        @if($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control {{$errors->has('confirm_password') ? 'is-invalid' : '' }}" placeholder="confirm password"
                                                   name="confirm_password" value="">
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

                                        <img src="{{ asset('assets/img/anime3.png') }}" class="upload_profile_pic" style="width: 150px">

                                        <input type="file" name="photo" class="user_img" style="display: none;" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
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

     <script>
        $(() => {

            $(".upload_profile_pic").click(() => $(".user_img").click() )

           $(".user_img").change((e) => {
                e.preventDefault();
                let img = $(".user_img").prop("files");
                if (img.length > 0) {
                    $(".upload_profile_pic").attr('src', URL.createObjectURL(img[0]));
                }
            })

        })
    </script>
@endsection


