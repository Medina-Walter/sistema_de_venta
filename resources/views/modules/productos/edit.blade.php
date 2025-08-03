@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Producto</h1>

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
              <h5 class="card-title">Editar Productos</h5>

              <form action="{{ route("productos.update", $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                  <label for="categoria_id" class="from-label">Categoría</label>
                  <select name="categoria_id" id="categoria_id" class="from-control">
                    <option value="">Selecciona una Categoría</option>
                    @foreach ($categorias as $categoria)
                    @if ($item->categoria_id == $categoria->id)
                        <option selected value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @else
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>


                <div class="mb-3">
                  <label for="proveedor_id" class="from-label">Proveedor</label>
                  <select name="proveedor_id" id="proveedor_id" class="from-control">
                    <option value="">Selecciona un Proveedor</option>
                    @foreach ($proveedores as $proveedor)
                    @if ($item->proveedor_id == $proveedor->id)
                        <option selected value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @else
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endif
                    @endforeach
                </select>
                </div>

                <div class="mb-3">
                  <label for="codigo" class="from-label">Código</label>
                  <input type="text" class="form-control" required name="codigo" id="codigo" value="{{ $item->codigo }}">
                </div>

                <div class="mb-3">
                  <label for="nombre" class="from-label">Nombre de Producto</label>
                  <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ $item->nombre }}">
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="from-label">Descripción</label>
                  <textarea name="descripcion" id="descripcion" cols="30" class="form-control" rows="10">{{ $item->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                  <label for="precio_venta">Precio de Venta</label>
                  <input type="text" class="form-control" required name="precio_venta" id="precio_venta" value="{{ $item->precio_venta }}">
                </div>

                <button class="btn btn-warning mt-3">Actualizar</button>
                <a href="{{ route("productos") }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
