<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    {{-- start login form --}}
    <section class="vh-100 bg-dark">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 0;">
                        <div class="card-body text-center px-5">
                            <h3 class="mb-3">Log In</h3>
                            @if(session()->has('loginError'))
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="name@example.com" value="{{ old('password') }}" required>
                                    <label for="password">Password</label>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 mb-3" name="login">Login</button>
                              </form>
                            <p class="text-secondary">Doesn't have an account? <a href="/register" class="text-decoration-none text-dark fw-semibold mt-3">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end login form --}}

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>