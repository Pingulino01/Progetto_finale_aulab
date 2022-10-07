<x-layout>
    <x-slot:bodysfondo>"loginBg"</x-slot>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

<div class="container my-5 bg-white pb-5 shadow pt-2 form-create ">
    <div class="row my-5 justify-content-center">
        <div class="col-12 col-md-6">
            <h1 id="Insert" class="text-center"><em><strong>{{__('messages.inserAnn')}}</strong></em></h1>
        </div>
    </div>


    
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <livewire:create-announcement/>
        </div>
    </div>

</div>








</x-layout>
    








