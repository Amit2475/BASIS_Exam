
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                              <li><a onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{Route('adminDashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Product
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{Route('viewforaddproduct')}}">Add Product</a>
                                    <a class="nav-link" href="{{Route('manage')}}">Manage Product</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    {{-- ----contant------ --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-2 mt-4">
                                <form action="{{Route('productupdate',$products->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group p-2">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{ $products->name}}"/>
                                        @error('name') 
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group  p-2">
                                        <label for="category_name">Category </label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" value="{{$products->category_name}}"/>
                                        @error('category_name') 
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group  p-2">
                                        <label for="brand_name">Brand</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="{{$products->brand_name}}"/>
                                        @error('brand_name') 
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group  p-2">
                                        <label for="drescreption">Drescreption</label>
                                        <textarea name="drescreption" id="drescreption" cols="30" rows="5" class="form-control" placeholder="Enter Product Drescreption">{{$products->drescreption}}</textarea>
                                        @error('drescreption') 
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <img height="80"src="{{asset('backend/product/'.$products->image)}}"  alt="product">
                                    <div class="form-group  p-2">
                                        <label for="image">image</label>
                                        <input type="file" class="form-control" id="image" name="image" value="{{$products->image}}"/>
                                        @error('image') 
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group p-2">
                                        <label id="status">Status</label>
                                        <select name="status" id="" class="form-control">
                                          <option value="1">---Statu---</option>
                                          <option @if($products->status==1) selected @endif value="1">Active</option>
                                          <option @if($products->status==0) selected @endif value="0">In Active</option>  
                                        </select>
                                        @error('status') 
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn btn-primary" value="Update"/>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </main>

            
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('backend')}}/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>
