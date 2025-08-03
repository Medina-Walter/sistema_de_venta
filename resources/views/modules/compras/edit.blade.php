@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar una Comprar</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Compras</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edición de: {{ $item->nombre_producto }}</h5>

              <form action="{{ route('compras.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" value="{{ $item->producto_id }}" id="producto_id" name="producto_id" hidden>
                <div class="mb-3">
                  <label for="cantidad" class="form-label">Cantidad del Producto</label>
                  <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{ $item->cantidad }}">
                </div>

                <div class="mb-3">
                  <label for="precio_compra" class="form-label">Precio de Comprar</label>
                  <input type="text" name="precio_compra" id="precio_compra" class="form-control" value="{{ $item->precio_compra }}">
                </div>

                <button class="btn btn-warning">Actualizar</button>
                  <a href="{{ route('compras') }}" class="btn btn-info">Cancelar</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
