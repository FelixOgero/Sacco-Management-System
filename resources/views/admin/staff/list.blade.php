@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Staff List</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        @include('_message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
                <a class="btn btn-primary" href="{{ url('admin/staff/add') }}">Add Staff</a>
            </h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Is Role</th>
                  <th scope="col">Create Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getRecord as $value)
                <tr>
                  <th scope="row">{{ $value->id}}</th>
                  <td>{{ $value->name}}</td>
                  <td>{{ $value->last_name}}</td>
                  <td>{{ $value->surname}}</td>
                  <td>{{ $value->email}}</td>
                  <td>{{ !empty($value->is_role) ? 'Admin' : 'Staff'}}</td>
                  <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                  <td>
                    <a href="{{ url('admin/staff/view/'.$value->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                    <a href="{{ url('admin/staff/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('admin/staff/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection