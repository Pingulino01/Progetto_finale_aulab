<div class="container-fluid bg-white footerM">
    <footer class="py-3 mt-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
        @auth
          @if(!Auth::user()->is_revisor)
        <li class="nav-item"><a href="" class="nav-link text-decoration-none text-muted" data-bs-toggle="modal" data-bs-target="#exampleModal">
          {{__('messages.WorkWithUs')}}
        </a></li>
        @endif
        @endauth

        @guest
        <li class="nav-item"><a href="" class="nav-link text-decoration-none text-muted" data-bs-toggle="modal" data-bs-target="#exampleModal">
          {{__('messages.WorkWithUs')}}
        </a></li>
        @endguest
      <!-- Button trigger modal -->

      <li class="nav-item"><a href="https://aulab.it/" class="nav-link px-2 text-muted">{{__('messages.FootPrice')}}</a></li>
      <li class="nav-item"><a href="{{route('about')}}" class="nav-link px-2 text-muted">{{__('messages.FootAbout')}}</a></li>
    </ul>
    </ul>
    <p class="text-center text-muted">&copy; 2022 Presto.it</p>
  </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-4 fw-bolder text-dark" id="exampleModalLabel">Lavora con noi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark ">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel dolore expedita laboriosam? Aliquam quidem asperiores et quaerat eius mollitia fugiat vitae enim minus, ab vero porro reiciendis iusto quibusdam?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-primary"><a href="{{route('become.revisor')}}" class="nav-link text-white fs-5 active">Accetta</a></button>
      </div>
    </div>
  </div>
</div>
<div class="d-lg-none" style="height: 7vh">

</div>

      
        
  