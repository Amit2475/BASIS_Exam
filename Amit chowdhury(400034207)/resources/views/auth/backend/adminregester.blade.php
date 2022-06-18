
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Admin</h3></div>
                                    <div class="card-body">
                                          <!-- Validation Errors -->
                                           <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus  placeholder="Enter your first name"/>
                                                        <label for="name">Name</label>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="form-floating mb-3">
                                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required placeholder="name@example.com"/>
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password"  placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required placeholder="Confirm password"/>
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                </div>

                                                <x-input id="role" type="hidden" name="role" :value="1"/>

                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submite" class="btn btn-primary btn-block" href="login.html">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/scripts.js"></script>
    </body>
</html>
