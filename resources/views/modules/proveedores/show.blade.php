@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Proveedores</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Proveedores</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Elimina Proveedores</h5>
              <p>No se podra recuperar los proveedores una vez eliminado.</p>
              <hr>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">CP</th>
                    <th class="text-center">Sitio Web</th>
                    <th class="text-center">Nota</th>
                    <th>
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                      <td>{{ $item->nombre }}</td>
                      <td>{{ $item->telefono }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->cp }}</td>
                      <td>{{ $item->sitio_web }}</td>
                      <td>{{ $item->notas }}</td>
                     <td>{{ $item->nombre }}</td>
                     <td>
                      <a href="{{ route("proveedores.edit", $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                      <a href="{{ route("proveedores.show", $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                     </td>
                    </tr>
                </tbody>
              </table>
              <hr>
              <form action="{{ route("proveedores.destroy", $item->id) }}" method = "POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-3">Eliminar Proveedor</button>
                <a href="{{ route("proveedores") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection