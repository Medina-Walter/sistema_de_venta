@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Proveedor</h1>

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
              <h5 class="card-title">Agregar Nuevo Proveedor</h5>

              <form action="{{ route("proveedores.store") }}" method="POST">
                @csrf
                <label for="nombre">Nombre de Proveedor</label>
                <input type="text" class="form-control" required name="nombre" id="nombre">

                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" required name="telefono" id="telefon">

                <label for="email">email</label>
                <input type="email" class="form-control" required name="email" id="email">

                <label for="cp">Codigo Postal</label>
                <input type="text" class="form-control" required name="cp" id="cp">

                <label for="sitio web">Sitio Web</label>
                <input type="text" class="form-control" required name="sitio_web" id="sitio_web">

                <label for="notas">Notas</label>
                <input type="text" class="form-control" required name="notas" id="notas">

                <button class="btn btn-primary mt-3">Guardar</button>
                <a href="{{ route("proveedores") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
