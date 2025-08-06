@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Productos y Stock</h5>
              <a href="{{ route("productos.create") }}" class="btn btn-primary">Agregar Nuevo Producto</a>
              <hr>
              <div class="table-responsive">
                <table class="table datatable">
                <thead class="">
                  <tr>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Código</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Imágen</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Compra</th>
                    <th class="text-center">Venta</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Comprar</th>
                    <th class="text-center">
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">
                      <td class="text-center">{{ $item->nombre_categoria }}</td>
                      <td class="text-center">{{ $item->nombre_proveedor }}</td>
                      <td class="text-center">{{ $item->codigo }}</td>
                      <td class="text-center">{{ $item->nombre }}</td>
                      <td class="text-center">
                        <img src="{{  asset('storage/' . $item->imagen_producto) }}" alt="" width="50px" height="50px">
                        <a href="{{ route("productos.show.image", $item->imagen_id) }}" class="badge rounded-pill bg warning text-dark">
                          Editar
                        </a>
                      </td>
                      <td class="text-center">{{ $item->descripcion}}</td>
                      <td class="text-center">{{ $item->cantidad }}</td>
                      <td class="text-center">${{ $item->precio_compra }}</td>
                      <td class="text-center">${{ $item->precio_venta }}</td>
                     <td class="text-center">
                        <div class="form-check form-switch">
                          <input class="form-check-input text-center" type="checkbox" id="{{ $item->id }}"
                          {{ $item->activo ? 'checked' : '' }}>
                        </div>
                     </td>
                     <td class="text-center">
                        <a href="{{ route("compras.create", $item->id) }}" class="btn btn-info">Comprar</a>
                     </td>
                     <td class="text-center">
                      <a href="{{ route("productos.edit", $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                      <a href="{{ route("productos.show", $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                     </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('scripts')

<script>

  function cambiar_estado(id, estado){
        $.ajax({
            type: "GET",
            url : "productos/cambiar-estado/" + id + "/" + estado,
            success: function(respuesta) {
                if (respuesta == 1) {
                    Swal.fire({
                        title: 'Exito!',
                        text: 'Cambio de estado exitoso!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
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

  $(document).ready(function(){
        $('.form-check-input').on("change", function() {
            let id = $(this).attr("id");
            let estado = $(this).is(":checked") ? 1 : 0;
            console.log(id + estado)
            //cambiar_estado(id, estado)
        })
    });
</script>
@endpush