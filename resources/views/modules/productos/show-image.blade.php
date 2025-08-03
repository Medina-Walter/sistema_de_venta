@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editat Imagen de Producto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Imagen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Actualizar Imagen de Producto</h5>
              <hr>
              <form action="{{ route('productos.update.image', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="imagen" class="from-label">Seleccionar la nueva imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control mt-3">
                <button class="btn btn-danger mt-3">Actualizar Imagen</button>
                <a href="{{ route("productos") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection