


<div class="card my-5 col-12 zoom d-none d-lg-block ultAnn" >
    <div class="row g-0">
        <div class="col-md-4 m-2">
            {{-- @dd($announcement->images) --}}
            <img src="{{($announcement->images->first()->path == 'images/default.jpg') ? Storage::url('images/default.jpg') : $announcement->images->first()->getUrl(400, 300)}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-7">
            <div class="card-body  d-flex flex-column h-100">
                <div class="d-flex space-between">
                    <h5 class="card-title my-2">{{$announcement->title}}</h5>

                    {{-- BOTTONE REVISORE --}}
                    @auth
                    @if(Auth::user()->is_revisor)
                    <form class="ms-auto" action="{{route('revisor.reset_announcement', $announcement)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-warning btn-sm ">{{__('messages.revisiona')}}</button>
                        </form>
                
                @endif
                @endauth
                    
            
                </div>

                <p class="card-text my-2">{{__('messages.cardCat')}} <a class="text-decoration-none" href="{{route('category.show', $announcement->category)}}">{{$announcement->category->name}}</a></p>
                <p class="card-text mt-4 fs-5">{{__('messages.AnnPrice')}}: <span class="fs-3 text-primary">{{$announcement->price}} </span>&euro;</p>
                <div class="mt-auto d-flex">
                    <p class="card-text "><small class="text-muted">{{__('messages.created_at')}} {{$announcement->created_at->format('d-m-Y')}}</small></p>
                    
                    
                    <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary ms-auto">{{__('messages.Show')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- CARD MOBILE --}}


<div class="card col-12 d-block d-lg-none ultAnn my-3 ">
    <img src="{{($announcement->images->first()->path == 'images/default.jpg') ? Storage::url('images/default.jpg') : $announcement->images->first()->getUrl(400, 300)}}" class="imgcard img-fluid card-img-top p-2" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">{{$announcement->title}}</h5>
<div class="d-flex justify-content-between">
    <p class="card-text my-2">{{__('messages.cardCat')}} <a class="text-decoration-none" href="{{route('category.show', $announcement->category)}}">{{$announcement->category->name}}</a></p>
    
    {{-- BOTTONE REVISORE --}}
    @auth
    @if(Auth::user()->is_revisor)
    <form class="ms-auto" action="{{route('revisor.reset_announcement', $announcement)}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-outline-warning btn-sm ">{{__('messages.revisiona')}}</button>
        </form>

    @endif
    @endauth
</div>

      <p class="card-text mt-4 fs-5">{{__('messages.AnnPrice')}}: <span class="fs-3 text-primary">{{$announcement->price}} </span>&euro;</p>

      <div class="mt-auto d-flex">
        <p class="card-text "><small class="text-muted">{{__('messages.created_at')}} {{$announcement->created_at->format('d-m-Y')}}</small></p>
        
        
        <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary ms-auto">{{__('messages.Show')}}</a>
    </div>

    </div>
  </div>