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
              <h5 class="card-title">Administrar Proveedores</h5>
              <p>Administrar los Proveedores de nuestros productos.</p>
              <a href="{{ route("proveedores.create") }}" class="btn btn-primary">Agregar Nuevo Proveedor</a>
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
                  @foreach ($items as $item)
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