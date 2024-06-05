<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
      {{-- bootstrap css cdn link --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
         .dropdown {
                width: 10%
            }
      </style>
</head>
<body class="bg-dark">
    <h1 class="text-info text-center mt-4">Your Account that You Currently Logged In is {{Auth::user()->role}} Account .</h1>
   <h1 class="text-warning text-center mt-4">Admin Dashboard</h1>
   <h1 class="text-warning text-center mt-4">Member List</h1>
    @if (session('success'))
    <h1 class="text-success text-center mt-4">***{{session('success')}}</h1>
    @endif


    @if (Auth::user()->role === 'admin')
    <h3 class="text-primary text-center mt-4">Create Member</h3>
    <div class="dropdown mx-auto mt-3 ">
        <a class="btn btn-primary " href="{{route('createPage')}}">
         create member
        </a>
      </div>
    @endif

    <a href="{{route('logout')}}" class="text-light">
        <button class="btn btn-primary float-end me-4 mb-4">
            logout
        </button>
         </a>

   <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>
                @if (Auth::user()->role === 'admin'  || Auth::user()->role  === 'editor')
                <a href="{{route('editPage',$user->id)}}" class="btn btn-warning">
                    edit
                 </a>
                @endif
                 @if (Auth::user()->role === 'admin'  || Auth::user()->role  === 'editor')
                 <a href="{{route('delete', $user->id)}}" class="btn btn-danger">
                    delete
                  </a>
                 @endif
            </td>

          </tr>
    @endforeach
    </tbody>
  </table>
</body>
{{ $users->links() }}
</html>
