<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home Spaces Solution</title>
    <!-- Twitter meta-->
    <meta property="twitter:card" content="hasibuzzaman">
    <meta property="twitter:site" content="@hasibuzzaman">
    <meta property="twitter:creator" content="@hasibuzzaman">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://hasib.club">
    <meta property="og:image" content="http://hasib.club/hasib.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--DataTables [ OPTIONAL ]-->
    {{-- <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>

    <!--DataTables Sample [ SAMPLE ]-->
    <script src="{{ asset('js/demo/tables-datatables.js')}}"></script> --}}

    


    {{-- for datattables  --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('homepage')}}">Home Spaces Solution</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{url('admin/profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('images') }}/{{Auth::User()->photo}}"  height="50px" width="50px" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::User()->name}}</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{url('admin/dashboard')}}" id="dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li> --}}


        @if(Auth::user()->is_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
        <li><a class="app-menu__item" href="{{url('admin/register')}}" id="admin"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Admin</span></a></li>
        @endif

        <!--@if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))-->
        <!--<li><a class="app-menu__item" href="{{url('admin/role')}}" id="role"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Roles</span></a></li>-->
        <!--@endif-->

        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        <li>
          <a class="app-menu__item {{ request()->is('admin/company-detail') ? 'active' : '' }}" 
             href="{{ url('admin/company-detail') }}" id="company-detail">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Company Details</span>
          </a>
        </li>
        @endif

        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        {{-- <li><a class="app-menu__item" href="{{route('admin.property')}}" id="addproperty"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Property</span></a></li> --}}


        <li class="treeview" id="property"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Property</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('admin.category')}}" id="category"><i class="icon fa fa-circle-o"></i> Category</a></li>
            <li><a class="treeview-item" href="{{route('admin.property')}}" id="addproperty"><i class="icon fa fa-circle-o"></i>Property</a></li>
          </ul>
        </li>



        @endif


        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        <li class="{{ (request()->is('admin/admin-contact-mail*')) ? 'active' : '' }}"><a class="app-menu__item" href="{{ route('admin.contactmail') }}" id=""><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Contact Mail</span></a></li>
        @endif

        
        
        
        <!--<li class="treeview" id="alluser"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
        <!--  <ul class="treeview-menu">-->
            

        <!--    @if(Auth::user()->is_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))-->
        <!--    <li><a class="treeview-item" href="{{url('admin/user-register')}}" id="user"><i class="icon fa fa-circle-o"></i> User</a></li>-->
        <!--    @endif-->

        <!--    @if(Auth::user()->is_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))-->
        <!--    <li><a class="treeview-item" href="{{url('admin/staff')}}" id="staff"><i class="icon fa fa-circle-o"></i> Staff</a></li>-->
        <!--    @endif-->

        <!--  </ul>-->
        <!--</li>-->


        

        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        <li><a class="app-menu__item" href="{{url('admin/pages')}}" id="pages"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Pages</span></a></li>
        @endif

        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        <li><a class="app-menu__item" href="{{url('admin/sliders')}}" id="slider"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Slider Image</span></a></li>
        @endif
        @if(Auth::user()->is_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
        <li><a class="app-menu__item" href="{{route('admin.banner')}}" id="banner"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Banner Image</span></a></li>
        @endif

        <li>
          <a class="app-menu__item {{ request()->routeIs('allVideoBlogCategories') ? 'active' : '' }}" href="{{ route('allVideoBlogCategories') }}" id="banner">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Video Blog Categories</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item {{ request()->routeIs('allVideoBlogs') ? 'active' : '' }}" href="{{ route('allVideoBlogs') }}" id="banner">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Video Blogs</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item {{ request()->routeIs('allServices') ? 'active' : '' }}" href="{{ route('allServices') }}" id="banner">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Services</span>
          </a>
        </li>

        
        {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li> --}}
      </ul>
    </aside>
    @yield('content')
     <!-- Essential javascripts for application to work-->
     <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
     <script src="{{ asset('js/popper.min.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/main.js')}}"></script>
     <!-- The javascript plugin to display page loading on top-->
     <script src="{{ asset('js/plugins/pace.min.js')}}"></script>
     <!-- Page specific javascripts-->
     <script type="text/javascript" src="{{ asset('js/plugins/chart.js')}}"></script>
     <script>
      // page schroll top
      function pagetop() {
          window.scrollTo({
              top: 130,
              behavior: 'smooth',
          });
      }


      function success(msg){
             $.notify({
                     // title: "Update Complete : ",
                     message: msg,
                     // icon: 'fa fa-check'
                 },{
                     type: "info"
                 });

         }
     function dlt(){
       swal({
         title: "Are you sure?",
         text: "You will not be able to recover this imaginary file!",
         type: "warning",
         showCancelButton: true,
         confirmButtonText: "Yes, delete it!",
         cancelButtonText: "No, cancel plx!",
         closeOnConfirm: false,
         closeOnCancel: false
     }, function(isConfirm) {
         if (isConfirm) {
             swal("Deleted!", "Your imaginary file has been deleted.", "success");
         } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");

         }
 });


     }


     $(document).ready(function () {
        $('#example').DataTable();
    });

  </script>
   {{-- for datatables  --}}

   




 <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>

 <script type="text/javascript" src="{{asset('js/plugins/bootstrap-notify.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('js/plugins/sweetalert.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

  <script>
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.editorConfig = function (config) {
        config.removePlugins = 'autosave';
        config.versionCheck = false;
    };

    CKEDITOR.replace('description', {
        versionCheck: false
    });
  </script>  
  
     @yield('script')

     <script>
      function showSuccess(message, title = 'Success') {
        toastr.success(message, title, {
            positionClass: 'toast-top-right',
            timeOut: 3000
        });
      }

      function showError(message, title = 'Error') {
          toastr.error(message, title, {
              positionClass: 'toast-top-right',
              timeOut: 5000
          });
      }
      
      function reloadPage(timeout) {
          window.setTimeout(function() {
              location.reload();
          }, timeout);
      }
     </script>

    </body>
    </html>
