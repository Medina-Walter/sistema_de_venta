@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Eliminar Categoría</h1>

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
              <h5 class="card-title">¿Estas seguro de eliminar esta Categoría?</h5>

              <form action="{{ route("categorias.destroy", $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <label for="nombre">Nombre de Categoría</label>
                <input type="text" class="form-control" readonly name="nombre" id="nombre" value="{{ $item->nombre }}">
                <button class="btn btn-danger mt-3">Eliminar</button>
                <a href="{{ route("categorias") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
