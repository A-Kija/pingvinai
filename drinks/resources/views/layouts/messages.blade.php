<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            @if(Session::has('ok'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('ok') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('not'))
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('not') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if($errors)
            @foreach ($errors->all() as $message)
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endforeach
            @endif

        </div>
    </div>
</div>
