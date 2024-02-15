 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{ url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'staff') @else collapsed @endif" href="{{ url('admin/staff/list')}}">
          <i class="bi bi-person"></i>
          <span>Staff</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_types') @else collapsed @endif" href="{{ url('admin/loan_types/list')}}">
          <i class="bi bi-person"></i>
          <span>Loan Types</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_plan') @else collapsed @endif" href="{{ url('admin/loan_plan/list')}}">
          <i class="bi bi-person"></i>
          <span>Loan Plan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan') @else collapsed @endif" href="{{ url('admin/loan/list')}}">
          <i class="bi bi-person"></i>
          <span>Loan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_user') @else collapsed @endif" href="{{ url('admin/loan_user/list')}}">
          <i class="bi bi-person"></i>
          <span>Loan User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
