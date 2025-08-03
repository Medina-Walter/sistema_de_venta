@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Producto</h1>

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
              <h5 class="card-title">Agregar Nuevos Productos</h5>

              <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="categoria_id" class="form-label">Categoría</label>
                  <select name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">Selecciona una Categoría</option>
                    @foreach ($categorias as $item)
                     <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="proveedor_id" class="form-label">Proveedor</label>
                  <select name="proveedor_id" id="proveedor_id" class="form-control">
                    <option value="">Selecciona un Proveedor</option>
                    @foreach ($proveedores as $item)
                     <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="codigo" class="from-label">Código</label>
                  <input type="text" class="form-control" required name="codigo" id="codigo">
                </div>

                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre de Producto</label>
                  <input type="text" class="form-control" required name="nombre" id="nombre">
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea name="descripcion" id="descripcion" class="form-control" rows="5"></textarea>
                </div>

                <div class="mb-3">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input type="file" class="form-control" name="imagen" id="imagen">
                </div>

                <button class="btn btn-primary">Guardar</button>
                  <a href="{{ route('productos') }}" class="btn btn-info">Cancelar</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
