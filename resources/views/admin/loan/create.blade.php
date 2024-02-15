@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Add New Loan Application</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">New Loan Application</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/loan/add') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan User</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="user_id" required>
                        <option value="">Select Loan User</option>
                        @foreach($getLoanUser as $value_3)
                        <option value="{{ $value_3->id }}">{{ $value_3->first_name }} {{ $value_3->middle_name }} {{ $value_3->last_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Staff Name</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="staff_id" required>
                        <option value="">Select Loan User</option>
                        @foreach($getStaff as $value_4)
                        <option value="{{ $value_4->id }}">{{ $value_4->name }} {{ $value_4->last_name }} {{ $value_4->surname }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan Types</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="loan_types_id" required>
                        <option value="">Select Loan Types</option>
                        @foreach($getLoanTypes as $value_1)
                            <option value="{{$value_1->id}}">{{$value_1->type_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan Plan</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="loan_plan_id" required>
                        <option value="">Select Loan Plan</option>
                        @foreach($getLoanPlan as $value_2)
                            <option value="{{$value_2->id}}">{{$value_2->months}} [ {{ $value_2->interest_percentage .'% '. $value_2->penalty_rate}} ]</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Loan Amount</label>
                <div class="col-sm-10">
                  <input required type="number" name="loan_amount" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Purpose</label>
                <div class="col-sm-10">
                  <textarea name="purpose" class="form-control"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    
    </div>
  </section>

{{-- </main><!-- End #main --> --}}

@endsection