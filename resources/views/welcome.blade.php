<x-layout>
    <x-slot:tab>Homepage</x-slot>
    
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
    <x-header/>
    
    
    {{-- @if(Lang::locale() == "ro")
    @dd("ciao")
    @endif --}}
    
    <div class="d-flex divUltAnn justify-content-center w-100 col-12 mt-4 ">
        <em><h1 class=" ultAnn pe-3 p-2"> {{__('messages.allAnnouncements')}} </h1></em>
    </div>
    
    <div class="col-12 d-none d-lg-block sticky zIndex">
        
        @if(Lang::locale() == "it")
        <p class="text-end me-4 sticky"><a class="text-decoration-none fs-5 me-3 btn btn-outline-danger sticky pulseIta" aria-current="page" href="{{route('announcement.create')}}"><i class="bi bi-pencil-square"></i></a></p>
        @elseif(Lang::locale() == "en")
        <p class="text-end me-4 sticky"><a class="text-decoration-none fs-5 me-3 btn btn-outline-danger sticky pulseEn" aria-current="page" href="{{route('announcement.create')}}"><i class="bi bi-pencil-square"></i></a></p>
        @else
        <p class="text-end me-4 sticky"><a class="text-decoration-none fs-5 me-3 btn btn-outline-danger sticky pulseRo" aria-current="page" href="{{route('announcement.create')}}"><i class="bi bi-pencil-square"></i></a></p>
        @endif
    </div>
    
    
    
    
    
    
    
    <div class="container ">
        <div class="row  justify-content-around">
            
            <div class=" col-12 col-md-4 my-5 d-none d-md-block">
                {{-- SEARCH E CATEGORIE --}}
                
                <div class="mx-4 ">
                    <form action="{{route('announcements.search')}}" method="GET" class="d-flex me-3">
                        <div class="input-group">
                            <input type="search" name="searched" class="form-control" placeholder="{{__('messages.searchAnn')}}" aria-label="Search">
                            <button class=" btn btn-outline-primary" type="submit">{{__('messages.srcBtn')}}</button>
                            
                        </div>
                    </form>
                </div>
                
                
                <div class="my-5 ultAnn m-auto boxAuto d-flex flex-column justify-content-around align-items-center  ">
                    
                    <h2 class="text-white mt-5"><i class="bi bi-car-front-fill"></i> {{__('messages.catAuto')}} </h2>
                    <a class="btnCategory text-white text-decoration-none d-flex align-items-center  justify-content-center" href=" {{ route('category.show', "3") }}">{{__('messages.searchBox')}} {{__('messages.catAuto')}}</a>
                </div>
                
                <div class="my-5 m-auto ultAnn boxElettronica d-flex flex-column justify-content-around align-items-center ">
                    
                    <h2 class="text-white mt-5"><i class="bi bi-mouse2-fill"></i>{{__('messages.catElett')}}</h2>
                    <a class="btnCategory text-white text-decoration-none d-flex align-items-center  justify-content-center" href=" {{ route('category.show', "5") }}">{{__('messages.searchBox')}} {{__('messages.catElett')}}</a>
                </div>
                
                <div class="my-5 m-auto ultAnn boxSport d-flex flex-column justify-content-around align-items-center">
                    
                    <h2 class="text-white mt-5"><i class="bi bi-dribbble"></i> {{__('messages.catSport')}}</h2>
                    <a class="btnCategory text-white text-decoration-none d-flex align-items-center  justify-content-center" href=" {{ route('category.show', "9") }}">{{__('messages.searchBox')}} {{__('messages.catSport')}}</a>
                </div>
                
                <div class="my-5 m-auto ultAnn boxVideogiochi d-flex flex-column justify-content-around align-items-center">
                    
                    <h2 class="text-white mt-5"><i class="bi bi-controller"></i> {{__('messages.catVid')}}</h2>
                    <a class="btnCategory text-white text-decoration-none d-flex align-items-center  justify-content-center" href=" {{ route('category.show', "10") }}">{{__('messages.searchBox')}} {{__('messages.catVid')}}</a>
                </div>
                
                <div class="mt-5  rowLine">
                    <h5 class="text-end my-3 fw-bold">{{__('messages.wel1')}}</h5>
                    <h5 class="text-end text-sm">{{__('messages.wel2')}}</h5>
                    <h5 class="text-end">{{__('messages.buy')}}</h5>
                    
                </div>
                
                
                
                
            </div>
            
            <div class="col-12 col-md-6">
                
                {{-- CARD ANNUNCI --}}
                @foreach($announcements as $announcement)
                
                
                <x-card :announcement="$announcement"/>
                
                
                
                @endforeach
                
            </div>
        </div>
    </div>
</x-layout>