@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Reportes de Productos</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Reportes de Productos</h5>
              <div class="row">
                <div class="col text-end">
                  <a href="{{ route("reportes_productos.falta_stock") }}" class="btn btn-primary btn-sm">Productos con cantidad 1 o 0</a>
                </div>
              </div>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Imágen</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Venta</th>
                    <th class="text-center">Compra</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">
                      <td>{{ $item->nombre_categoria }}</td>
                      <td>{{ $item->nombre_proveedor }}</td>
                      <td>{{ $item->nombre }}</td>
                      <td>
                        <img src="{{  asset('storage/' . $item->imagen_producto) }}" alt="" width="50px" height="50px">
                        <a href="{{ route("productos.show.image", $item->imagen_id) }}" class="badge rounded-pill bg warning text-dark">
                          Editar
                        </a>
                      </td>
                      <td>{{ $item->descripcion}}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>{{ $item->precio_compra }}</td>
                      <td>{{ $item->precio_venta }}</td>
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