<option value="">-- Seleccione --</option>
@if(!empty($optionss))
    @foreach($optionss as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif