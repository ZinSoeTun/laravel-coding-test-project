<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    {{-- bootstrap css cdn link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .dropdown {
                width: 10%
            }
            .dropdown-item:hover{
                background-color: rgba(0, 0, 0, 0.5)
            }

            .dropdown-menu{
                background-color: rgba(0, 0, 0, 0.63)
            }
        </style>
</head>

<body class="bg-dark">

    <h1 class="text-warning text-center mt-5 mb-5" style="margin-top: 200px">Please login here</h1>
    <div class="dropdown mx-auto mt-5">
        <a class="btn btn-primary px-5 py-2" href="#"  data-bs-toggle="dropdown" aria-expanded="false">
          Login
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item text-success" href="{{route('adminLogin')}}">Admin</a></li>
          <li><a class="dropdown-item text-success" href="{{route('editorLogin')}}">Editor</a></li>
          <li><a class="dropdown-item text-success" href="{{route('viewerLogin')}}">Viewer</a></li>
        </ul>
      </div>


</body>
{{-- bootstrap js cdn link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
