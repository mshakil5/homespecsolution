<!-- header -->
<section class="siteHeader">

  @php
      $company_logo = \App\Models\CompanyDetail::select('company_logo')->first();
  @endphp

<nav class="navbar navbar-expand-lg   py-0  shadow-sm" style="background-color: #15363b;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage')}}">
            <img src="{{asset('images/company/'.$company_logo->company_logo)}}" class="p-1 img-fluid mx-auto" width="150px">
        </a>
        <button class="navbar-toggler border" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation" style="color: #fff;">
            <span class="iconify" data-icon="charm:menu-hamburger"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav ms-auto navCustomRight">
                <li class="nav-item m-1">
                    <a href="{{ route('homepage')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item m-1">
                    <a href="{{ route('about')}}" class="nav-link">About Us</a>
                </li>
                <li class="nav-item m-1">
                    <a href="{{ route('projects')}}" class="nav-link">Projects</a>
                </li>
                <li class="nav-item m-1">
                    <a href="{{ route('services')}}" class="nav-link">Services</a>
                </li>
                {{-- <li class="nav-item m-1">
                    <a href="{{ route('residential')}}" class="nav-link">Residential</a>
                </li> --}}
                {{-- <li class="nav-item m-1">
                    <a href="{{ route('commercial')}}" class="nav-link">Commercial</a>
                </li> --}}

                <li class="nav-item m-1 ">
                    <a href="{{ route('contact')}}" class="nav-link">Contact us</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
</section>
