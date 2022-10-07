<x-layout>
    <x-slot:bodysfondo>"dashBg"</x-slot>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif


    <div class="container my-y ">
        <div class="row my-5 justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">{{__('messages.editAnn')}}</h1>
            </div>
        </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <livewire:announcement-edit>/>
        </div>
    </div>

</x-layout>