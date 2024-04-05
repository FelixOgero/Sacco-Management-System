@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Payments List</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @include('_message')
            <div class="card"  style="width: 120vw;">
              <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary" href="{{ url('admin/payments/add') }}">Add New Payment</a>
                </h5>
                 <!-- Table with stripped rows -->
                 <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">National ID</th>
                      <th scope="col">Tax ID</th>
                      <th scope="col">Username/Borrower</th>
                      <th scope="col">Staff Name</th>
                      <th scope="col">Loan Type</th>
                      <th scope="col">Loan Plan</th>
                      <th scope="col">Loan Amount</th>
                      <th scope="col">Loan Amount Paid</th>
                      <th scope="col">Loan Amount Pending</th>
                      <th scope="col">Reference Number</th>
                      <th scope="col">Purpose</th>
                      <th scope="col">Create Date</th>
                      <th scope="col">Update Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <th scope="row">{{ $value->id}}</th>
                      <td>{{ $value->user_national_id}}</td>
                      <td>{{ $value->user_tax_id}}</td>
                      <td>{{ $value->getUserName->first_name}} {{ $value->getUserName->middle_name}} {{ $value->getUserName->last_name}}</td>
                      <td>{{ $value->getStaffName->name}} {{ $value->getUserName->last_name}} {{ $value->getUserName->surname}}</td>
                      <td>{{ $value->getLoanType->type_name}}</td>
                      <td>{{ $value->getLoanPlan->months .'['. $value->getLoanPlan->interest_percentage .'% '. $value->getLoanPlan->penalty_rate. ']'}}</td>
                      <td>{{ $value->loan_amount}}</td>
                      <td>{{ $value->loan_amount_paid}}</td>
                      <td>{{ $value->loan_amount_remaining}}</td>
                      <td>{{ $value->reference_number}}</td>
                      <td>{{ $value->purpose}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->updated_at))}}</td>
                      <td>
                        <a href="{{ url('admin/payments/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ url('admin/payments/delete/'.$value->id) }}" type="button" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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