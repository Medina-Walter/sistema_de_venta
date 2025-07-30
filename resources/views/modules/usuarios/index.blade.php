@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Usuarios</h5>
              <p>Administrar las cuentas y roles de Usuarios.</p>
              <a href="{{ route("usuarios.create") }}" class="btn btn-primary">Agregar Nuevo Usuario</a>
              <hr>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Contraseña</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody id="tbody-usuarios">
                  @include('modules.usuarios.tbody')
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @include('modules.usuarios.modal_cambiar_password')
@endsection
