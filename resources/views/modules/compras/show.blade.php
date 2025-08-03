@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Eliminar Compras</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Eliminar Compras</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio de Compra</th>
                    <th class="text-center">Total Compra</th>
                    <th class="text-center">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                      <td>{{ $items->nombre_usuario }}</td>
                      <td>{{ $items->nombre_producto }}</td>
                      <td>{{ $items->cantidad }}</td>
                      <td>${{ $items->precio_compra }}</td>
                      <td>${{ $items->precio_compra * $items->cantidad }}</td>
                      <td>{{ $items->created_at }}</td>
                    </tr>
                </tbody>
              </table>
              <hr>
              <form action="{{ route("compras.destroy", $items->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="text" class="form-control" name="producto_id" value="{{ $items->producto_id }}" hidden>
                <button class="btn btn-danger mt-3">Eliminar Compra</button>
                <a href="{{ route("compras") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection