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
            @livewire('home.categoriadropdown', ['categorias' => $categorias])
  
        </ul>

        <!-- ESTO DEBE SER UN COMPONENTE DE LIVEWIRE -->
        @guest
        
        @else
          @livewire('home.carritoicon', ['usuario_id' => Auth()->user()->id])
        @endguest  

        <a class="navbar-brand" href=""></a>
        <a class="navbar-brand" href=""></a>
      </div>
    </div>
</nav>





<div class="container">
  @livewire('home.homeproductos')
</div>



@endsection
