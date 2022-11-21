@if (session('success'))
    <div class="alert alert-success" id="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger" id="alert">
        {{ session('danger') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" id="alert">
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info" id="alert">
        {{ session('info') }}
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="alert alert-danger" id="alert">
        {{ $error }}
    </div>
@endforeach