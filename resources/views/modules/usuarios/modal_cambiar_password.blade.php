<form id="frmPassword" action="{{ route('usuarios.cambio_password') }}" method="POST">
    @csrf
    <div class="modal fade" id="cambiar_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ingresa la Nueva Contraseña</h5>
                </div>
            
                <div class="modal-body">
                   <input type="hidden" id="id_usuario" name="id_usuario">
                   <label for="password" class="mt-3">Contraseña Nueva</label>
                   <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="modal-footer">
                   <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                   <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
                </div>
            </div>
        </div>
    </div>
</form>
