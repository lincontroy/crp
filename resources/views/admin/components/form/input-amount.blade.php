@if (isset($label))
    @php
        $for_id = preg_replace('/[^A-Za-z0-9\-]/', '', Str::lower($label));
    @endphp
    <label for="{{ $for_id ?? "" }}">{{ __($label) }}@isset($label_after){!! $label_after !!}@endisset</label>
@endif

@if (!isset($currency_class))
    @php
        $currency_class = true;
    @endphp
@endif

@if(isset($currency) && $currency != false)
    <div class="input-group">
        <input type="text" placeholder="{{ __($placeholder ?? "Type Here...") }}" name="{{ $name ?? "" }}" class="{{ $class ?? "form--control number-input" }} @error($name ?? false) is-invalid @enderror" {{ $attribute ?? "" }} value="{{ $value ?? "" }}" @isset($data_limit)
        data-limit = {{ $data_limit }}
        @endisset>
        <span class="input-group-text @if ($currency_class) currency @endif">{{ $currency }}</span>
    </div>
@else
    <input type="text" placeholder="{{ __($placeholder ?? "Type Here...") }}" name="{{ $name ?? "" }}" class="{{ $class ?? "form--control number-input" }} @error($name ?? false) is-invalid @enderror" {{ $attribute ?? "" }} value="{{ $value ?? "" }}" @isset($data_limit)
    data-limit = {{ $data_limit }}
    @endisset step="any">
@endif

@error($name ?? false)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror