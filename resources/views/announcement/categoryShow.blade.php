<x-layout>



    <div class="container my-5">

        <div class="row my-5">
            <div class="col-12">
                <h2 class="text-center">{{__('messages.catByAnn')}} {{$category->name}}</h2>
            </div>
        </div>




        <div class="row my-5 rowLine justify-content-around">
            
            {{-- SEARCH E CATEGORIE --}}
            <div class=" col-12 col-md-4 my-5">


                <div class="mx-2">
                    <form action="{{route('announcements.search')}}" method="GET" class="d-flex me-3">
                        <div class="input-group">
                        <input type="search" name="searched" class="form-control" placeholder="{{__('messages.searchAnn')}}" aria-label="Search">
                        <button class=" btn btn-outline-primary" type="submit">{{__('messages.srcBtn')}}</button>
        
                        </div>
                    </form>
                </div>
                <a id="aulab" href="https://aulab.it/"><div class="d-none mt-5 d-lg-block">

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
                
            

            {{-- CARD ANNUNCI CATEGORIE --}}
            <div class="col-12 col-md-6">

                @forelse($announcements as $announcement)

                    <x-card :announcement="$announcement" />

                @empty
                

                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <p class="lead">{{__('messages.noAnn')}}</p>
                        <p class="fs-5">{{ __('messages.Pubb') }} <a href="{{route('announcement.create')}}" class="btn btn-primary">{{ __('messages.BtnNewAnn') }}</a></p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>