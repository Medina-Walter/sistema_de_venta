@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bienvenido, {{ Auth::user()->name }}!</h5>

              <div class="row text-center">
                <div class="col bg-success text-white py-3 rounded m-2 shadow">
                  <h4>Total de Ventas</h4>
                  <p class="fs-4">${{ number_format($totalVentas, 2) }}</p>
                </div>
                <div class="col bg-primary text-white py-3 rounded m-2 shadow">
                  <h4>Cantidad de Ventas</h4>
                  <p class="fs-4">{{ $cantidadVentas }}</p>
                </div>
                <div class="col bg-danger text-white py-3 rounded m-2 shadow">
                  <h4>Productos con Bajo Stock</h4>
                  <p class="fs-4">{{ count($productosBajosStock) }}</p>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <h3>Últimas Ventas</h3>
                  <ul class="list-group">
                    @foreach ($ventasRecientes as $item)
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Venta #{{ $item->id }}</span>
                        <span class="fw-bold">${{ number_format($item->total_venta, 2) }}</span>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
