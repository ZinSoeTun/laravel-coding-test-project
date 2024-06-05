@extends('LoginLayout')
@section('title', 'Admin Login')
@section('content')
<body style="background-color:grey">
    <div class="text-center my-3">
        <h1>Admin Login Form</h1>
    </div>


    <section class="mx-auto" style="width: 500px">
        <form method="POST" style="background-color: whitesmoke; box-shadow:2px 2px 5px 5px white; border-radius:7px"
            class="p-5" action="{{route('admin')}}">
            @csrf
            @if (session('error2'))
           <p class="text-danger">**{{session('error2')}}</p>
            @endif
            @if (session('error'))
            <p class="text-danger">**{{session('error')}}</p>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
                    name="email" placeholder="Enter your email..." value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <div class=" mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="password-input-container ">
                    <input type="password" class="form-control password-input @error('password')is-invalid @enderror"
                        id="password" name="password" placeholder="Enter your password..."
                        value="{{ old('password') }}">
                    <i class="toggle-password fa fa-eye"></i>
                    <i class="toggle-password fa fa-eye-slash"></i>
                    @error('password')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">

                <div class="mt-4">
                    <input style="border-radius: 5px; border:none" class="bg-success py-2 px-3" type="submit"
                        value="login">
                </div>
            </div>
        </form>
    </section>
@endsection
