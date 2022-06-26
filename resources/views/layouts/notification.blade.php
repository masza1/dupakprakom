@if (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="fw-semibold">Warning!</div>
        <ul>
            @foreach ($errors->all() as $key => $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="fw-semibold">Berhasil!</div>
        {{ session()->get('success') }}
        <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="fw-semibold">Warning!</div>
        {{ session()->get('error') }}
        <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
