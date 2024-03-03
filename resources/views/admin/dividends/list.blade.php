@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Dividends List</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @include('_message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary" href="{{ url('admin/dividends/add') }}">New Dividend Application</a>
                </h5>
                 <!-- Table with stripped rows -->

                 <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID Number</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Accumulated Amount</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <th scope="row">{{ $value->id}}</th>
                      <th scope="row">{{ $value->id_number}}</th>
                      <td>
                          <p>First Name: <b>{{ $value->first_name }}</b></p>
                          <p>Middle Name: <b>{{ $value->middle_name }}</b></p>
                          <p>Last Name: <b>{{ $value->last_name}}</b></p>
                      </td>
                      <td>{{ $value->accumulated_amount}}</td>
                      <td>{{ $value->amount }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td>
                      <td>
                        <a href="{{ url('admin/dividends/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ url('admin/dividends/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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