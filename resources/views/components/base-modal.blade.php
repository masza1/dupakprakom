@props(['modalId' => '', 'withForm' => false, 'isFile' => false, 'modalWidth' => 'lg', 'formId'])
<div class="modal fade" {{ $attributes->only('id') }} data-coreui-backdrop="static" data-coreui-keyboard="false" {{ isset($tabindex) ? '' : 'tabindex="-1"' }} aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-{{ $modalWidth }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $modalTitle ?? '' }}</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($withForm)
                <form method="POST" {{ $isFile ? 'enctype="multipart/form-data"' : '' }} id="{{ $formId ?? '' }}">
                    @csrf
                    @isset($formMethod)
                        @method($formMethod)
                    @endisset
            @endif
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm text-white" type="button" data-coreui-dismiss="modal">{{ $textCancel ?? 'Tutup' }}</button>
                @if ($withForm)
                    {!! $buttonSubmit ?? '<button class="btn btn-primary btn-sm" type="submit">Simpan</button>' !!}
                @endif
            </div>
            @if ($withForm)
                </form>
            @endif
        </div>
    </div>
</div>
