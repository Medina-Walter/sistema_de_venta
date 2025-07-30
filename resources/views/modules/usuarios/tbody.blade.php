@foreach ($items as $item)
    <tr class="text-center">
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->rol }}</td>
        <td>
            <a href="#" onclick="agregar_id_usuario({{ $item->id }})" 
            class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cambiar_password">Cambiar Contraseña
        </td>
        <td class="text-center">
            <div class="form-check form-switch">
                <input class="form-check-input text-center" type="checkbox" id="{{ $item->id }}"
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

    function cambiar_estado(id, estado){
        $.ajax({
            type: "GET",
            url : "usuarios/cambiar-estado/" + id + "/" + estado,
            success: function(respuesta) {
                if (respuesta == 1) {
                    Swal.fire({
                        title: 'Exito!',
                        text: 'Cambio de estado exitoso!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    recargar_tbody();
                } else {
                    Swal.fire({
                        title: 'Fallo!',
                        text: 'No se llevo a cabo el cambio!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        })
    }

    function agregar_id_usuario(id){
        $('#id_usuario').val(id);
    }

    function cambio_password(){
        let id = $({
            type: "GET",
            url: "usuarios/cambiar-password/" + id + "/" + password,
            success :function(respuesta){
                if(respuesta == 1){
                    Swal.fire({
                        title: 'Exito!',
                        text: 'Cambio de contraseña exitoso!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    $('#frmPassword')[0].reset();
                }else{
                    Swal.fire({
                        title: 'Fallo!',
                        text: 'No se llevo a cabo el cambio de Contraseña!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        });
        return false;
    }

    $(document).ready(function(){
        $('.form-check-input').on("change", function() {
            let id = $(this).attr("id");
            let estado = $(this).is(":checked") ? 1 : 0;
            cambiar_estado(id, estado)
        })
    });
</script>
@endpush