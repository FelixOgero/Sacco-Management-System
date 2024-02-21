@extends('admin.layouts.app')
@section('content')

 

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                

                <div class="card-body">
                  <h5 class="card-title">Staff and Admin</h5>
                  <a href="{{ url('admin/staff/list') }}">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getStaffandAdminCount}}</h6>
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Loan Types</h5>
                  <a href="{{ url('admin/loan_types/list') }}">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getLoanTypeCount}}</h6>
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Loan Plan</h5>
                  <a href="{{ url('admin/loan_plan/list') }}">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getLoanPlanCount}}</h6>
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                

                <div class="card-body">
                  <h5 class="card-title">Loan</h5>
                  <a href="{{ url('admin/loan/list') }}">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-caret-up"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getLoanCount}}</h6>
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Loan Users</h5>
                  <a href="{{ url('admin/loan_user/list') }}">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getLoanUserCount}}</h6>
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div>

              </div>
            </div><!-- End Reports -->
          

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        </div><!-- End Right side columns -->

      </div>
    </section>

  

@endsection

 
 