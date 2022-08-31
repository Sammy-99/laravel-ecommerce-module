{{-- @extends('product::layouts.master') --}}

{{-- @section('header') --}}


<div class="container-fluid">
    <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-light" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">Pricing</a>
                  </li>
                  <li class="nav-item justify-content-end   ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    
                        <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="nav-link text-light" >
                          <i class="fa fa-user"></i>  {{ __('Log Out') }}
                    </a>
                    </form>
                  </li>

                </ul>
              </div>
            </div>
          </nav>
    </div>

    <div class="row vh-100">
        <div class="col-md-2 border">

            <div class="list-group mt-4">
                <input type="hidden" id="currentTab" value="student">
                <a href="{{ route('product-list') }}" class="list-group-item list-group-item-action text-white bg-primary sidebar"
                    id="student" value="student">Product List</a>
                <a href="{{ route('add-product') }}" class="list-group-item list-group-item-action sidebar" id="teacher"
                    value="teacher">Add Product</a>
            </div>

        </div>


{{-- @endsection --}}
