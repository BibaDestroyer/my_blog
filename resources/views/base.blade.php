<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('posts.index') }}">Blog</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">About</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                  </li>

                </ul>
              </div>
            </div>
          </nav>
        @yield('content')
    </div>
    

</body>
</html>