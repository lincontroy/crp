@if (isset($label) && $label != false)
    @php
        $for_id = preg_replace('/[^A-Za-z0-9\-]/', '', Str::lower($label));
    @endphp
    <label for="{{ $for_id ?? "" }}">{{ __($label) }}@isset($label_after){!! $label_after !!}@endisset</label>
@endif
<textarea name="{{ $name ?? "" }}" class="rich-text-editor form--control d-none {{ $class ?? "" }}">{!! $value ?? "" !!}</textarea>