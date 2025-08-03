@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Categorías</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Categorías</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ventas Existentes</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center">Total Vendido</th>
                    <th class="text-center">Fecha de Venta</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Revocar Venta</th>
                    <th class="text-center">
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                     <td class="text-center">{{ $item->total_venta }}</td>
                     <td class="text-center">{{ $item->created_at }}</td>
                     <td class="text-center">{{ $item->nombre_usuario }}</td>
                     <td class="text-center">
                      <a href="{{ route("categorias.edit", $item->id) }}" class="btn btn-info">Detalle</a>
                      <a href="{{ route("categorias.show", $item->id) }}" class="btn btn-danger">Revocar Venta</a>
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