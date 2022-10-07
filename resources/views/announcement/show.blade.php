<x-layout>
    <x-slot:bodysfondo>"loginBg"</x-slot>

<div class="container my-5 d-none d-lg-block">
    <div class="row justify-content-center ultAnn">
        <div class="col-9">
            <div class="row">

            

      
        
            {{-- @if ($announcement->images) --}}
            <div class="col-12 col-md-8 mt-5">
                <div class="swiper mySwiper">
                    <div class="swiper-pagination d-flex justify-content-center"></div>
                    <div class="swiper-wrapper">
                        @foreach ($announcement->images as $image)
                        <div class="swiper-slide">
                           
                            <img class="borderShow" src="{{($image->path == 'images/default.jpg') ? Storage::url('images/default.jpg') : $image->getUrl(400, 300)}}"/>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="swiper-pagination d-flex justify-content-center"></div> --}}
            </div>
                
                    <div class="col-4 my-3 d-flex flex-column">
                        <div>
                            
                                <p class="card-text text-end">{{__('messages.cardCat')}} <a class="text-decoration-none" href="{{route('category.show', $announcement->category)}}">{{$announcement->category->name}}</a></p>
                                    
                                <h3 class="text-decoration-none card-title rowLine">{{$announcement->title}}</h3>
                            

                        </div>
                        <p class="card-text my-5 fs-5">{{__('messages.AnnPrice')}}: <span class="fs-2 text-primary">{{$announcement->price}} &euro;</span></p>
                        <div class="mt-5">
                            <p class="card-text fs-6">{{__('messages.userShow')}} {{$announcement->user->name}}</p>
                            <p class="card-text fs-6 text-muted">{{__('messages.created_at')}} {{$announcement->created_at->format('d-m-Y')}}</p>
    
                            <p class="card-text text-end fs-6 rowLine">{{__('messages.contactMe')}} : <span class="textB2">{{$announcement->prefix->name}} {{$announcement->telephone}}</span></p>
                            
                        </div>
                        
                        
                    </div>
                    <div>
                        
                        <h5 class="card-text fs4 mt-3">{{__('messages.AnnBody')}}</h5>
                   
                           
                        <p class="rowLine w-100 p-3">{{$announcement->body}}</p>
                        
                        
                        <div class="d-flex justify-content-end">
                            
                        
                            {{-- BOTTONE REVISORE --}}
                            @auth
                            @if(Auth::user()->is_revisor)
                            <form class="ms-auto" action="{{route('revisor.reset_announcement', $announcement)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-warning btn-sm mb-3">{{__('messages.revisiona')}}</button>
                                </form>

                            @endif
                            @endauth
                        </div>
                    </div>

                        
                </div>
            </div>
        </div>
    </div>


    {{-- SHOW DA MOBILE --}}


    <div class="container d-block d-lg-none">
        <a href="{{route('announcement.index')}}" class="btn btn-primary ultAnn my-3"><i class="bi bi-arrow-bar-left"></i> Torna agli annunci</a>
        <div class="row ultAnn">
            <div class="col-12 my-3">
                <div class="swiper mySwiper">
                    <div class="swiper-pagination d-flex justify-content-center"></div>
                    <div class="swiper-wrapper">
                        @foreach ($announcement->images as $image)
                        <div class="swiper-slide">
                           
                            <img class="borderShow" src="{{($image->path == 'images/default.jpg') ? Storage::url('images/default.jpg') : $image->getUrl(400, 300)}}"/>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p class="card-text text-end">{{__('messages.cardCat')}} <a class="text-decoration-none" href="{{route('category.show', $announcement->category)}}">{{$announcement->category->name}}</a></p>
                                    
                <h3 class="text-decoration-none text-center card-title rowLine">{{$announcement->title}}</h3>
                <p class="card-text my-3 fs-5">{{__('messages.AnnPrice')}}: <span class="fs-2 text-primary">{{$announcement->price}} &euro;</span></p>
                <p class="card-text text-end fs-6">{{__('messages.userShow')}} {{$announcement->user->name}}</p>
                            <p class="card-text text-end fs-6 text-muted">{{__('messages.created_at')}} {{$announcement->created_at->format('d-m-Y')}}</p>
    
                            <p class="card-text text-center fs-6 rowLine">{{__('messages.contactMe')}} : <span class="textB2">{{$announcement->prefix->name}} {{$announcement->telephone}}</span></p>
            </div>
            <div class="col-12">
                <h5 class="card-text text-center fs-4 mt-3">{{__('messages.AnnBody')}}</h5>
                   
                           
                        <p class="rowLine w-100 p-3">{{$announcement->body}}</p>
            </div>
        </div>
    </div>




</x-layout>