<div>
    <a href="{{route('micarrito')}}" type="button" class="btn btn-dark position-relative">
        Ver mi carrito <i class="bi bi-cart4" style="color: white; font-size: 1.4rem;"></i>

        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          {{$cantidad}}
          <span class="visually-hidden">unread messages</span>
        </span>
      </a>
</div>
