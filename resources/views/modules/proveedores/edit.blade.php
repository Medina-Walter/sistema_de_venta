@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Proveedor</h1>

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
              <h5 class="card-title">Editar Proveedor</h5>

              <form action="{{ route("proveedor.store") }}" method="POST">
                @csrf
                @method("PUT")
                <label for="nombre">Nombre de Proveedor</label>
                <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ $item->nombre }}">

                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" required name="telefono" id="telefon" value="{{ $item->telefono }}">

                <label for="email">email</label>
                <input type="email" class="form-control" required name="email" id="email" value="{{ $item->email}}">

                <label for="cp">Codigo Postal</label>
                <input type="text" class="form-control" required name="cp" id="cp" value="{{ $item->cp }}">

                <label for="sitio web">Sitio Web</label>
                <input type="text" class="form-control" required name="sitio_web" id="sitio_web" value="{{ $item->sitio_wev }}">

                <label for="notas">Notas</label>
                <input type="text" class="form-control" required name="notas" id="notas" value="{{ $item->notas }}">

                <button class="btn btn-primary mt-3">Actualizar</button>
                <a href="{{ route("provedores") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
