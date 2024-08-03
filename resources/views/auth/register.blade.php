<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    {{-- start register form --}}
    <section class="vh-100 bg-dark">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 0;">
                        <div class="card-body text-center px-5">
                            <h3 class="mb-3">Register</h3>
                            <form action="/register" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" autofocus required>
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="name@example.com" value="{{ old('phone') }}">
                                    <label for="phone">Phone</label>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Type address here..." value="{{ old('address') }}" required></textarea>
                                    <label for="address">Address</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <input type="hidden" name="role_id" value="2"> --}}
                                <button type="submit" class="btn btn-dark w-100 mb-3" name="register">Register</button>
                              </form>
                            <p class="text-secondary">Already have an account? <a href="/login" class="text-decoration-none text-dark fw-semibold mt-3">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end register form --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>