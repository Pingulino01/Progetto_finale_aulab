<div>

        @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('message') }}
    </div>
    @endif
    @if (session('access.denied'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('access.denied') }}
    </div>
    @endif

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h1 class="text-center">{{__('messages.navAllannouncements')}}</h1>
                </div>
            </div>
        </div>
    
        
        
    
        <div class="container my-5">
            <div class="row rowLine justify-content-around">
    
                <div class=" col-12 col-md-4 my-5">
    
                    {{-- SEARCH --}}
    
                    <div class="mx-2">
                        <div class="input-group">
                            <input type="search" wire:model.debounce.1000="search" class="form-control" placeholder="{{__('messages.searchAnn')}}" aria-label="Search">
                            <button class=" btn btn-outline-primary" type="submit">{{__('messages.srcBtn')}}</button>
                        </div>
                      </div>
                      <div class="my-5 col-12  m-auto">
                        <a class="text-decoration-none fs-5 me-2 btn btn-danger pulse2 w-100" aria-current="page" href="{{route('announcement.create')}}"><i class="bi bi-pencil-square"> {{ __('messages.inserAnn') }}</i></a>
                      </div>  
                      <a id="aulab" href="https://aulab.it/"><div class="d-none d-lg-block">

                        <div class="aulabBanner d-flex  align-items-end">
                            <p class="aulabDiscount w-100 mb-3 fw-bold mb-0 text-center"> <span class="corso">Corsi di formazione Full-Stack</span></p>

                        </div>
                    </div>  </a> 
                    <div class="mt-5 d-none d-lg-block">
                        <iframe  mute=1 autoplay=1 loop=1 controls=0 width="420" height="315"
                            src="https://www.youtube.com/embed/pmxRWbq-pq0?autoplay=1&mute=1&loop=1&controls=0">
                        </iframe> 
                    </div>
                    </div>
                        
                        <div class="col-12 col-md-6">

    
                    {{-- CARD ANNUNCI --}}
    
                @forelse($announcements as $announcement)
            
            
                    
    
                         
                    <x-card :announcement="$announcement"/>
    
                    
                @empty
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <p class="lead">{{__('messages.noAnn')}}</p>
                        <p class="fs-5 ps-2">{{ __('messages.Pubb') }} <a href="{{route('announcement.create')}}" class="btn btn-primary">{{ __('messages.BtnNewAnn') }}</a></p>
                    </div>
                </div>
                @endforelse
                {{$announcements->links()}}
            </div>
        </div>
    </div>

</div>