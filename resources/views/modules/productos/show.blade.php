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
              <h5 class="card-title">Eliminar Producto del Stock</h5>
              <hr>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Venta</th>
                    <th class="text-center">Compra</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                      <td>{{ $items->nombre_categoria }}</td>
                      <td>{{ $items->nombre_proveedor }}</td>
                      <td>{{ $items->nombre }}</td>
                      <td>{{ $items->imagen }}</td>
                      <td>{{ $items->descripcion}}</td>
                      <td>{{ $items->cantidad }}</td>
                      <td>${{ $items->precio_compra }}</td>
                      <td>${{ $items->precio_venta }}</td>
                    </tr>
                </tbody>
              </table>
              <hr>
              <form action="{{ route('productos.destroy', $items->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar Producto</button>
                <a href="{{ route("productos") }}" class="btn btn-info">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection