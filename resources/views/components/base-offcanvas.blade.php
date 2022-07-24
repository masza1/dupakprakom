{{-- <div class="sidebar sidebar-light sidebar-form-lg sidebar-end sidebar-overlaid hide" {{ $attributes->only('id') }}>
    @if (isset($withForm))
        <form method="POST" {{ isset($isFile) ? 'enctype="multipart/form-data"' : '' }} id="{{ $formId ?? '' }}">
            @csrf
            @isset($formMethod)
                @method($formMethod)
            @endisset
            <div class="sidebar-static w-100">
                <div class="sidebar-header bg-transparent d-flex justify-content-between">
                    {!! $buttonSubmit ?? '<button class="btn btn-primary btn-sm" type="submit">Simpan</button>' !!}
                    <div class="text-white" style="padding: 0.25rem 0.5rem">{{ $canvasTitle ?? '' }}</div>
                    <button class="btn btn-primary btn-sm text-black" type="button" style="background: transparent; box-shadow: none"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="p-2 body-canvas">
                {{ $slot }}
            </div>
        </form>
    @else
        <div class="sidebar-static w-100">
            <div class="sidebar-header bg-transparent d-flex justify-content-between">
                <div class="text-white" style="padding: 0.25rem 0.5rem">{{ $canvasTitle ?? '' }}</div>
                <button class="btn btn-primary btn-sm text-black" type="button" style="background: transparent; box-shadow: none"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="p-2 body-canvas">
            {{ $slot }}
        </div>
    @endif
</div> --}}

<div class="offcanvas offcanvas-lg offcanvas-end overflow-y-auto" tabindex="-1" {{ $attributes->only('id') }} aria-labelledby="{{ $attributes->get('id') }}RightLabel">
    @if (isset($withForm))
        <form method="POST" {{ isset($isFile) ? 'enctype="multipart/form-data"' : '' }} id="{{ $formId ?? '' }}">
            @csrf
            @isset($formMethod)
                @method($formMethod)
            @endisset
            <div class="offcanvas-header">
                {!! $buttonSubmit ?? '<button class="btn btn-primary btn-sm" type="submit">Simpan</button>' !!}
                <h5 class="offcanvas-title" id="{{ $attributes->get('id') }}RightLabel">{{ $canvasTitle ?? 'Title' }}</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                {{ $slot }}
            </div>
        </form>
    @else
        <div class="offcanvas-header">
            {!! $buttonSubmit ?? '<button class="btn btn-primary btn-sm" type="submit">Simpan</button>' !!}
            <h5 class="offcanvas-title" id="{{ $attributes->get('id') }}RightLabel">{{ $canvasTitle ?? 'Title' }}</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{ $slot }}
        </div>
    @endif
</div>
