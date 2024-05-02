@if (session('success'))
    <div class="alert alert-success notification-bar">
        {{ session('success') }}
    </div>
@elseif($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger notification-bar">
            {{ $error }}
        </div>
    @endforeach
@endif
