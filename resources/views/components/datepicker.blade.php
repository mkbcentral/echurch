@props(['id'])

<input {{ $attributes }} type="text"
        id="{{ $id }}" data-toggle="datetimepicker" 
        data-target="#{{ $id }}"
        onchange="this.dispatchEvent(new InputEvent('input'))"/>

@push('js')
    <script type="text/javascript">
       $('#{{ $id }}').datetimepicker({
                format:'L'
            });
    </script>
@endpush