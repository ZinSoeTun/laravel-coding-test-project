@extends('LoginLayout')
@section('title', 'Edit Page')
@section('content')
<body style="background-color:grey">
    <div class="text-center my-3">
        <h1>Member Edit Form</h1>
    </div>


    <section class="mx-auto" style="width: 500px">
        <form method="POST" style="background-color: whitesmoke; box-shadow:2px 2px 5px 5px white; border-radius:7px"
            class="p-5" action="{{route('edit', $user->id)}}">
            @csrf
            @if (session('success'))
            <p class="text-success f-5">**{{session('success')}}</p>
             @endif
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name"
                    name="name" placeholder="Enter your name..." value="{{ old('name',$user->name) }}">
                @error('name')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
                    name="email" placeholder="Enter your email..." value="{{ old('email',$user->email) }}">
                @error('email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <input type="text" class="form-control @error('role')is-invalid @enderror" id="role"
                    name="role" placeholder="Enter your role..." value="{{ old('role',$user->role) }}">
                @error('role')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">

                <div class="mt-4">
                    <input style="border-radius: 5px; border:none" class="bg-warning py-2 px-3" type="submit"
                        value="Edit">
                </div>
            </div>
        </form>
    </section>
@endsection
