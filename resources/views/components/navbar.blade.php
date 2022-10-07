<nav class="navbar navbar-expand-lg bar d-none d-md-block">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <img src="{{Storage::url('\images\Navbar.png')}}"alt="">


        <!-- Blocco centrale Navbar -->
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">



        
        
        
        <li class="nav-item">
          <a class="nav-link text-white fs-5 active" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white fs-5 active" aria-current="page" href="{{route('announcement.index')}}">{{__('messages.navAllannouncements')}}</a>
        </li>
        
        
                {{-- DROPDWON CATEGORIE Personalizzato --}}
        
                <li class="d-none d-lg-block nav-item dropdown">
                  <a class="nav-link text-white fs-5 dropdown-toggle" role="button" id="buttonCat" href="#">{{__('messages.navCategories')}}</a>
                </li>
        
                    {{-- CATEGORIE DENTRO DROPDOWN --}}
                    
                      <ul class="d-none d-lg-block Dropdown-menuCat">
                        @foreach($categories as $category)
                        <li class="d-none menuCat bg1 text-center Opacity mb-4 fs-6 px-2"><a class="dropdown-item text-white" href="{{route('category.show', $category)}}">{{$category->name}}</a></li>
                        @endforeach
                      </ul>


      </ul>





      <!-- Blocco finale Navbar -->
      <ul class="navbar-nav mx-2 mb-lg-0">


      {{-- Dropdown Lingue --}}
      <div class="dropdown">
        <button class="btn dropdown-toggle bg1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="flag-icon flag-icon-{{ Lang::locale() == 'en' ? 'gb' : Lang::locale() }}"></span>
            {{-- <x-_locale lang='it' nation='it'/> --}}
        </button>

        <ul class="dropdown-menu bg1 flagMenu">
          
            @if(Lang::locale() != 'it')
            <li class="ms-2 btnMenuFlag"><x-_locale lang='it' nation='it'/></li>
            @endif
            @if(Lang::locale() != 'en')
            <li class="ms-2 btnMenuFlag"><x-_locale lang='en' nation='gb'/></li>
            @endif
            @if(Lang::locale() != 'ro')
            <li class="ms-2 btnMenuFlag"><x-_locale lang='ro' nation='ro'/></li>
            @endif
        </ul>
      </div>

      



        <!-- Pulsanti Guest -->
        @guest
        <div>
          <a href="{{route('register')}}" class="btn btnNav btn-outline-primary" type="submit">{{__('messages.Register')}}</a>
          <a href="{{route('login')}}" class="btn btnNav btn-outline-primary" type="submit">LogIn</a>
        </div>
        @endguest


        @auth
        <!-- User Menù -->
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> {{Auth::user()->name}}
            @if(Auth::user()->is_revisor && App\Models\Announcement::toBeRevisionedCount() )

            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{App\Models\Announcement::toBeRevisionedCount()}}
              <span class="visually-hidden">unread messages</span>
            </span>

            @endif

          </button>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end bg1" aria-labelledby="dropdownMenuButton7">

            <li class="nav-item">
              <a class="dropdown-item text-white text-center" aria-current="page" href="{{route('announcement.create')}}">{{__('messages.New announcement')}}</a>
            </li>

              <!-- DIVENTA REVISORE -->
              @auth
              @if(!Auth::user()->is_revisor)

            <li class="nav-item">
              <a href="{{route('become.revisor')}}" class="dropdown-item text-white text-center">{{__('messages.WorkWithUs')}}</a>
            </li>
            @endif
            @endauth

            @guest
            <li class="nav-item me-5">
              <a href="{{route('become.revisor')}}" class="dropdown-item text-white text-center">{{__('messages.WorkWithUs')}}</a>
            </li>
            @endguest


            @if(Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="dropdown-item text-white text-center position-relative" aria-current="page" href="{{route('revisor.index')}}">
                {{__('messages.RevisorIndex')}}
                <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
            <li class="nav-item">
            
            <a class="dropdown-item text-white text-center" aria-current="page" href="{{route('dashboard')}}">{{__('messages.RevisorDash')}}</a>
            </li>
            @endif



            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="dropdown-item text-danger text-center" type="submit">Logout</button>
              </form>
            </li>

          </ul>
        </div>

        @endauth
      </ul>
    </div>
  </div>
  </div>
</nav>


{{-- NAVBAR DA MOBILE_________________________________________________________________________ --}}

<nav class="NavPhone d-flex align-items-center d-md-none">

  {{-- PULSANTE MENU DROPDOWN --}}
<button id="menuButton" class="ms-2 btn btn-primary">MENU</button>
<div class="Dropdown-menuPhone d-none">

    <img class="mt-3" src="{{Storage::url('\images\Navbar.png')}}"alt="">
    
    {{-- Search Bar --}}
      <div class="ms-2 my-4">
      <form action="{{route('announcements.search')}}" method="GET" class="d-flex me-3">
        <div class="input-group">
          <input type="search" name="searched" class="form-control" aria-label="Search">
          <button class=" btn btn-outline-primary" type="submit">{{__('messages.srcBtn')}}</button>

        </div>
      </form>
    </div>
     {{-- Dropdown Lingue --}}
        <div class="dropend ms-2 mb-4">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="flag-icon flag-icon-{{ Lang::locale() == 'en' ? 'gb' : Lang::locale() }}"></span>
              
          </button>
  
          <ul class="dropdown-menu">
            <li class="d-flex">

              @if(Lang::locale() != 'it')
              <span class="ms-4"><x-_locale lang='it' nation='it'/></span>
              @endif
              @if(Lang::locale() != 'en')
              <span class="ms-4 btnMenuFlag"><x-_locale lang='en' nation='gb'/></span>
              @endif
              @if(Lang::locale() != 'ro')
              <span class="ms-4 btnMenuFlag"><x-_locale lang='ro' nation='ro'/></span>
              @endif
            </li>
          </ul>
        </div>
    {{-- Link Menu --}}
    <div class="divMenu">
      <a class=" text-decoration-none textB1 fs-5 active" aria-current="page" href="{{route('welcome')}}">Home</a>
    </div>
    <div class="divMenu">
      <a class=" text-decoration-none textB1 fs-5 active" aria-current="page" href="{{route('announcement.index')}}">{{__('messages.navAllannouncements')}}</a>
    </div>
    
      <div class="dropdown divMenu">
      <div class=" p-0 btn fs-5 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('messages.navCategories')}}
      </div>
      <ul class="dropdown-menu">
        @foreach($categories as $category)
        <li><a class="dropdown-item textB1" href="{{route('category.show', $category)}}">{{$category->name}}</a></li>
        @endforeach
      </ul>
    </div>
    


</div>








      <!-- Blocco finale Navbar -->
      <ul class=" d-flex me-2 ms-auto my-auto">
  

          <!-- Pulsanti Guest -->
          @guest
          <div>
            <a href="{{route('register')}}" class="btn btnNav btn-outline-primary" type="submit">{{__('messages.Register')}}</a>
            <a href="{{route('login')}}" class="btn btnNav btn-outline-primary" type="submit">LogIn</a>
          </div>
          @endguest
  
  
          @auth
          <!-- User Menù -->
          <div class="dropup">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> {{Auth::user()->name}}
              @if(Auth::user()->is_revisor && App\Models\Announcement::toBeRevisionedCount() )
  
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">unread messages</span>
              </span>
  
              @endif
  
            </button>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end bg1" aria-labelledby="dropdownMenuButton7">
  
              <li class="nav-item">
                <a class="dropdown-item text-white text-center" aria-current="page" href="{{route('announcement.create')}}">{{__('messages.New announcement')}}</a>
              </li>
  
                <!-- DIVENTA REVISORE -->
                @auth
                @if(!Auth::user()->is_revisor)
  
              <li class="nav-item">
                <a href="{{route('become.revisor')}}" class="dropdown-item text-white text-center">Lavora con noi</a>
              </li>
              @endif
              @endauth
  
              @guest
              <li class="nav-item me-5">
                <a href="{{route('become.revisor')}}" class="dropdown-item text-white text-center">Lavora con noi</a>
              </li>
              @endguest
  
  
              @if(Auth::user()->is_revisor)
              <li class="nav-item">
                <a class="dropdown-item text-white text-center position-relative" aria-current="page" href="{{route('revisor.index')}}">
                  {{__('messages.RevisorIndex')}}
                  <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                    {{App\Models\Announcement::toBeRevisionedCount()}}
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </a>
              </li>
              <li class="nav-item">
              
              <a class="dropdown-item text-white text-center" aria-current="page" href="{{route('dashboard')}}">{{__('messages.RevisorDash')}}</a>
              </li>
              @endif
  
  
  
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <button class="dropdown-item text-danger text-center" type="submit">Logout</button>
                </form>
              </li>
  
            </ul>
          </div>
  
          @endauth
        </ul>
</nav>