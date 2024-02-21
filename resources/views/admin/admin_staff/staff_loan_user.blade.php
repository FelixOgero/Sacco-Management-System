@extends('admin.layouts.app')
@section('content')
 
<div class="pagetitle">
    <h1>Loan User List</h1>
</div>

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        @include('_message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
           
             <!-- Table with stripped rows -->
             <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Loan Type</th>
                  <th scope="col">Loan Plan</th>
                  <th scope="col">Loan Amount</th>
                  <th scope="col">Purpose</th>
                  <th scope="col">Create Date</th>
                  <th scope="col">Update Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($getRecord as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->name }} {{ $value->last_name }} {{ $value->surname }}</td>
                    <td>{{ $value->type_name }}</td>
                    <td>{{ $value->months .' months' }}</td>
                    <td>{{ $value->loan_amount }}</td>
                    <td>{{ $value->purpose }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                    <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td>
                    <td>
                        <a href="{{ url('staff/loan_user/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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