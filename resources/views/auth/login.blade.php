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

    <div class="container my-5 py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 d-flex flex-column bg-white py-5  align-items-center shadow-lg">
          <h1 class="text-center mb-5">Login</h1>

          <form class="w-50" action="{{route('login')}}" method="post">
            @csrf


            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
              <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
              <input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Log in</button>

            <p class="text-center text-muted mt-2">{{__('messages.LogText')}} <a href="{{route('register')}}" class="textB2">{{__('messages.Register')}}</a></p>
          </form>


        </div>
      </div>
    </div>









</x-layout>