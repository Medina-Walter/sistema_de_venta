@foreach ($items as $item)
    <tr class="text-center">
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->rol }}</td>
        <td>
            <a href="">

            </a>
        </td>
        <td class="text-center">
            <div class="form-check form-switch">
                <input class="form-check-input text-center" type="checkbox" id="activo{{ $item->id }}"
                {{ $item->activo ? 'checked' : '' }}>
            </div>
        </td>
        <td>
        <a href="{{ route("usuarios.edit", $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
        </td>
    </tr>
@endforeach

@push('scripts')
<script>

    function recargar_tbody(){
        $.ajax({
            type : "GET",
            url : "{{ route('usuarios.tbody') }}",
            success : function(respuesta){
                console.log(respuesta);
            }
        });
    }
    $(document).ready(function(){
        $('.form-check-input').on("change", function() {
            let id = $(this).attr("id");
            let estado = $(this).is(":checked") ? 1 : 0;
            console.log(id + "||" + estado);
        })
    });
</script>

@endpush