@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Hacer Comprar</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Compra Nueva de: {{ $item->nombre }}</h5>

              <form action="{{ route('compras.store') }}" method="POST">
                @csrf

                <input type="text" value="{{ $item->id }}" id="id" name="id" hidden>
                <div class="mb-3">
                  <label for="cantidad" class="form-label">Cantidad del Producto</label>
                  <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="precio_compra" class="form-label">Precio de Comprar</label>
                  <input type="text" name="precio_compra" id="precio_compra" class="form-control">
                </div>

                <button class="btn btn-primary">Comprar</button>
                  <a href="{{ route('productos') }}" class="btn btn-info">Cancelar</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
