@php
    $successMessage = request()->session()->get('message:success', null);
    $errorMessage = request()->session()->get('message:error', null);
    $infoMessage = request()->session()->get('message:info', null);
@endphp
@if($successMessage || $errorMessage || $infoMessage)
    <div class="my-2">
        @if($successMessage)
            <div class="alert alert-success">
                {{ $successMessage  }}
            </div>
        @endif
        @if($infoMessage)
            <div class="alert alert-info">
                {{ $infoMessage  }}
            </div>
        @endif
        @if($errorMessage)
            <div class="alert alert-danger">
                {{ $errorMessage  }}
            </div>
        @endif
    </div>
@endif
