@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Loan Savings List</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @include('_message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary" href="{{ url('admin/savings/add') }}">Add Loan Saving</a>
                </h5>
                 <!-- Table with stripped rows -->

                 <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID Number</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact and Email</th>
                      <th scope="col">Tax ID</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Create Date</th>
                      {{-- <th scope="col">Update Date</th> --}}
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <th scope="row">{{ $value->id}}</th>
                      <th scope="row">{{ $value->id_number}}</th>
                      {{-- <td scope="row">{{ $value->first_name }} {{ $value->middle_name }} {{ $value->last_name}}</td> --}}
                      <td>
                          <p>First Name: <b>{{ $value->first_name }}</b></p>
                          <p>Middle Name: <b>{{ $value->middle_name }}</b></p>
                          <p>Last Name: <b>{{ $value->last_name}}</b></p>
                      </td>
                      <td>{{ $value->address}}</td>
                      <td>
                        <p>Contact: <b>{{ $value->contact }}</b></p>
                        <p>Email: <b>{{ $value->email }}</b></p>
                      </td>
                      <td>{{ $value->tax_id }}</td>
                      <td>{{ $value->amount }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                      {{-- <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td> --}}
                      <td>
                        <a href="{{ url('admin/savings/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ url('admin/savings/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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