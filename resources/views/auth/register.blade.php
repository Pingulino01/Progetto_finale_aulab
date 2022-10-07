<x-layout>
  <x-slot:bodysfondo>"loginBg"</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif



    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex flex-column bg-white py-5  align-items-center shadow-lg">




          <h1 class="text-center mb-5">{{__('messages.Register')}}</h1>




          <form class="w-50" method="POST" action="{{route('register')}}">
            @csrf

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="name" class="form-control" placeholder="Username" value="{{old('name')}}">

            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">@</i></span>
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('messages.ConfPass')}}" value="{{old('password_confirmation')}}">
            </div>
            <button type="submit" class="btn btn-primary w-100">{{__('messages.Register')}}</button>
            <p class="text-center text-muted mt-2">{{__('messages.RegisterText')}} <a href="{{route('login')}}">log in</a></p>
          </form>


        </div>
      </div>
    </div>

</x-layout>