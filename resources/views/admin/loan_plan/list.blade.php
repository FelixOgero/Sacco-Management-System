@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Loan Plan List</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @include('_message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary" href="{{ url('admin/loan_plan/add') }}">Add Loan Plan</a>
                </h5>
                 <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>
                        <p>Years/Months: <b>{{ $value->months}}</b></p>
                        <p>Interest: <b>{{ $value->interest_percentage}} %</b></p>
                        <p>Overdue Penalty: <b>{{ $value->penalty_rate}}</b></p>
                    </td>
                    
                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                    <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td>
                    <td>
                      <a href="{{ url('admin/loan_plan/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a href="{{ url('admin/loan_plan/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
        </div>

      </div>
    </div>
  </section>

@endsection