
<x-slot:bodysfondo>"loginBg"</x-slot>


<div class="container my-5">
    <div class="row justify-content-center">
<div class="col-8">

<div class="input-group mb-5 dashSearch">
    <input type="text" class="form-control " wire:model="query" placeholder="{{__('messages.SearchPlaceHolder')}}" aria-label="Recipient's username" aria-describedby="basic-addon2">

</div>
</div>

<div class="col-12">

<div class="divtable">
    <table class="table m-3">
        <thead>
            <tr>
            <th wire:click="orderById" scope="col"> <span class="btn btn-outline-dark fw-bold">Id</span></th>
            <th wire:click="orderByTitle" scope="col"><span class="btn btn-outline-dark fw-bold">{{__('messages.DashTitle')}}</span></th>
            <th wire:click="orderByCategory" scope="col"><span class="btn btn-outline-dark fw-bold">{{__('messages.AnnCategory')}}</span></th>
            <th wire:click="orderByCreated_at" scope="col"><span class="btn btn-outline-dark fw-bold">{{__('messages.created_at')}}</span></th>
            <th wire:click="orderByUpdated_at"  scope="col"><span class="btn btn-outline-dark fw-bold"> {{__('messages.DashMod')}}</span></th>
            <th wire:click="orderByAccepted"  scope="col"><span class="btn btn-outline-dark ms-5 fw-bold">{{__('messages.DashStatus')}}</span></th>
            <th scope="col"><span class="ps-5">{{__('messages.DashAction')}}</span></th>
            <th scope="col"><span class="ps-4"></span></th>
            <th scope="col"><span class="ps-4">{{__('messages.DashVisual')}}</span></th>
                
            </tr>
        </thead>
        <tbody>
            <div class="container">
                <div class="row">
                    @foreach($announcements as $announcement)
                        <div class="col-12 col-md-6">
                            <tr>
                                <th  scope="row"><span class="ps-3">{{$announcement->id}}</span></th>
                                <td>{{$announcement->title}}</td>
                                <td>{{$announcement->category->name}}</td>
                                <td>{{$announcement->created_at}}</td>
                                <td>{{$announcement->updated_at}}</td>
                                <td><span class="ps-5">
                                    @switch(true)
                                    @case(is_null ($announcement->is_accepted))
                                    <em>{{__('messages.Revision')}}</em>
                                    @break
                                    @case($announcement->is_accepted)
                                    {{__('messages.Yes')}}
                                    @break
                                    @case(!$announcement->is_accepted)
                                    {{__('messages.No')}}
                                        @break
                                    @endswitch
                                </span></td>
                                <td class="lead d-flex">@if($announcement->is_accepted)
                                        <form action="{{route('revisor.reject_announcement', $announcement)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">{{__('messages.BtnRejL')}}</button>
                                        </form>
                                    @else(!$announcement->is_accepted)
                                    <form action="{{route('revisor.accept_announcement', $announcement)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-success btn-sm">{{__('messages.BtnAccL')}}</button>
                                        </form></td>
                                    
                                        @endif
                                        <td><form action="{{route('revisor.reset_announcement', $announcement)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-warning btn-sm">{{__('messages.BtnRevL')}}</button>
                                            </form></td>
                                        <td><form action="{{route('announcement.delete', $announcement)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-dark btn-sm">{{__('messages.annDel')}}</button>
                                            </form></td>
                                        {{-- <td><a href="{{ route('announcement.edit', $announcement)}}" class="btn btn-warning">Modifica annuncio</a></td> --}}
                                
                                </td>
                                <td>
                                    <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-primary btn-sm mx-2">{{__('messages.Show')}}</a>
                                </td>
                            </tr>
                        </div>
                    @endforeach
                </div>
            </div>
        </tbody>
    </table>
    {{$announcements->links()}}
</div>



</div>


</div>

</div>

        


