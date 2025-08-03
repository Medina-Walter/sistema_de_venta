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
              <table class="table datatable">
                <thead class="">
                  <tr>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Imágen</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Compra</th>
                    <th>Venta</th>
                    <th>Estado</th>
                    <th>Comprar</th>
                    <th>
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">
                      <td>{{ $item->nombre_categoria }}</td>
                      <td>{{ $item->nombre_proveedor }}</td>
                      <td>{{ $item->codigo }}</td>
                      <td>{{ $item->nombre }}</td>
                      <td>
                        <img src="{{  asset('storage/' . $item->imagen_producto) }}" alt="" width="50px" height="50px">
                        <a href="{{ route("productos.show.image", $item->imagen_id) }}" class="badge rounded-pill bg warning text-dark">
                          Editar
                        </a>
                      </td>
                      <td>{{ $item->descripcion}}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>${{ $item->precio_compra }}</td>
                      <td>${{ $item->precio_venta }}</td>
                     <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input text-center" type="checkbox" id="{{ $item->id }}"
                          {{ $item->activo ? 'checked' : '' }}>
                        </div>
                     </td>
                     <td>
                        <a href="{{ route("compras.create", $item->id) }}" class="btn btn-info">Comprar</a>
                     </td>
                     <td>
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