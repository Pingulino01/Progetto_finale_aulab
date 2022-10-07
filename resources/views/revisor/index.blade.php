<x-layout>
    <x-slot:bodysfondo>"loginBg"</x-slot>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 text-light mt-5">
                <h1 class="display-2 text-center ultAnn">
                    {{$announcement_to_check ? __('messages.RevHeader') :  __('messages.RevNoHeader') }}
                </h1>
            </div>

        </div>
    </div>
       
    
    @if($announcement_to_check)    
    <div class="container my-4">
        <div class="row justify-content-center mt-5 p-3 ultAnn">
            <div class="ms-3 col-12 col-md-4 borderRev">
                <p class="card-text text-end">{{__('messages.AnnCategory')}}: {{$announcement_to_check->category->name}}</p>
                <h3 class="card-title rowLine">{{$announcement_to_check->title}}</h3>
                <p class="card-text my-5 fs-4">{{__('messages.AnnPrice')}}: <span class="fs-2 text-primary">{{$announcement_to_check->price}} &euro;</span></p>
                <p class="card-text">{{__('messages.created_at')}} : {{$announcement_to_check->created_at->format('d-m-Y')}}</p>
                <p class="card-text">{{__('messages.AnnPhone')}}: {{$announcement_to_check->prefix->name}}  {{$announcement_to_check->telephone}}</p>
            </div>
            <div class="col-12 col-md-7">
                <h5 class="card-text fs4 mt-3">{{__('messages.AnnBody')}}</h5>
                   
                           
                        <p class="p-3">{{$announcement_to_check->body}}</p>
            </div>
            
       


            
            
            @foreach ($announcement_to_check->images as $image)
            
            <div class="row rowLine my-3">

            <div class="col-12 col-md-6 ms-1 m-3">
                <img  src="{{($image->path == 'images/default.jpg') ? Storage::url('images/default.jpg') : $image->getUrl(635, 300)}}" class="mt-3 revisorimg img-fluid rounded" alt="...">
            </div>
            
            <div class="col-12 col-md-3 border-end">
                <h5 class="tc-accent mt-3">Tags</h5>
                <div class="p-2 rowLine">
                    @if ($image->labels)
                    @foreach ($image->labels as $label)
                    <p class="d-inline">#{{$label}},</p>
                    @endforeach
                    @endif
                </div>
            </div>    
                <div class="col-12 col-md-2">
                    <div class="card-body mt-3">
                        <h5 class="tc-accent">{{__('messages.imgRev')}}</h5>
                        <p class="rowLine">{{__('messages.adult')}}: <span class="{{$image->adult}}"></span></p>
                        <p>{{__('messages.spoof')}}: <span class="{{$image->spoof}}"></span></p>
                        <p>{{__('messages.medical')}}: <span class="{{$image->medical}}"></span></p>
                        <p>{{__('messages.violence')}}: <span class="{{$image->violence}}"></span></p>
                        <p>{{__('messages.racy')}}: <span class="{{$image->racy}}"></span></p>
                    </div>
                </div>
            </div>
                @endforeach

            </div>
        </div>
            


  <div class="d-flex justify-content-around">

    <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="BtnAcc btn btn-success shadow my-5 fs-5">{{__('messages.BtnAcc')}}</button>
    </form>


    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="BtnRej btn btn-danger shadow my-5 fs-5">{{__('messages.BtnRej')}}</button>
    </form>
        
  </div>
    



@endif
<div style="height: 13vh"></div>
</x-layout>

