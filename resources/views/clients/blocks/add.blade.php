<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title'){{$title}}</title>
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.style.css')}}">
    @yield('css')
 
</head>
<body>

  @include('clients.header.header')

     
    <main>
          <div class="col-2">
            @include('clients.blocks.sidebar')
          </div>
      
        {{-- <aside>
         
           @section('sidebar')
           <h2>Home sidebar</h2>
           @show
        </aside> --}}
        {{-- <div class="content">
            @yield('content')
        </div> --}}
    </main>
    <footer>
        <h1> footer</h1>
    </footer>
    @yield('js')
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
</body>
</html>