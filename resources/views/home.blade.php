@extends('layouts.layout')

@section('content')
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid p-m-0 p-lg-0">
      <a class="navbar-brand" href=""></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor01" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorías
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach($categorias as $categoria)
                        <li><a class="dropdown-item" href="#">{{$categoria->name}}</a></li>
                    @endforeach
                </ul>
              </li>
        </ul>
            <!-- ESTO DEBE SER UN COMPONENTE DE LIVEWIRE -->
            <button type="button" class="btn btn-dark position-relative">
                Ver mi carrito <i class="bi bi-cart4" style="color: white; font-size: 1.4rem;"></i>

                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
            </button>
        <a class="navbar-brand" href=""></a>
        <a class="navbar-brand" href=""></a>
      </div>
    </div>
  </nav>
@endsection
