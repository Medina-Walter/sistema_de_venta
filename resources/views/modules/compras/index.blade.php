@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Compras</h1>
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
              <h5 class="card-title">Administrar Compras</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio de Compra</th>
                    <th class="text-center">Total Compra</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">
                      <td>{{ $item->nombre_usuario }}</td>
                      <td>{{ $item->nombre_producto }}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>${{ $item->precio_compra }}</td>
                      <td>${{ $item->precio_compra * $item->cantidad }}</td>
                      <td>{{ $item->created_at }}</td>
                     <td>
                      <a href="{{ route("compras.edit", $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                      <a href="{{ route("compras.show", $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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