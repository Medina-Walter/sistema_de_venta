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
              <p>Administrar los Productos.</p>
              <a href="{{ route("") }}" class="btn btn-primary">Producto con Stock Minímo</a>
              <hr>
              <a href="{{ route("producto.create") }}" class="btn btn-primary">Agregar Nuevo Producto</a>
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
                    <th class="text-center">Estado</th>
                    <th class="text-center">Comprar</th>
                    <th>
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">
                      <td>{{ $item-> }}</td>
                      <td>{{ $item-> }}</td>
                      <td>{{ $item-> }}</td>
                      <td>{{ $item->}}</td>
                      <td>{{ $item-> }}</td>
                      <td>{{ $item-> }}</td>
                     <td>{{ $item-> }}</td>
                     <td>
                      <a href="{{ route("proveedores.edit", $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                      <a href="{{ route("proveedores.show", $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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