<x-layout>
    <div class="main-panel">
        <div class="content">

            @if (Session::has('success'))
                <div class="alert alert-success notification-bar">{{ Session::get('success') }}</div>
            @endif
            <form method="POST" action="{{ route('user-management.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" id="user_edit_header">
                                <h2 class="title">User Information <span> < Edit >  </span></h2>
                                <a href="{{ route('user-management.add') }}" >
                                    <input type="button" value="Add user" class="btn btn-fill btn-primary">
                                </a>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" placeholder="Name" name="name"
                                                       value={{ $userObj->name }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" placeholder="Email" name="email"
                                                       value={{ $userObj->email }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                       name="username" value={{ $userObj->username }}>
                                            </div>
                                        </div>

                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="phone number"
                                                       name="phone" value={{ $userObj->phone }}>
                                            </div>
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
                                        <h4 class="title" style="margin-top: 1rem">{{ $userObj->name }}</h4>
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
</x-layout>

<script>
    $(function () {
        setTimeout(function () {
            $('.notification-bar').fadeOut()
        }, 3000)
    })
</script>
