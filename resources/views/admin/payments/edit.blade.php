@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Edit Payment</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Payment</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/payments/edit/'.$getRecord->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">User National ID</label>
                    <div class="col-sm-10">
                      <input required type="number" name="user_national_id" class="form-control" oninput="javascript: this.value = this.value
                      .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" value="{{$getRecord->user_national_id}}" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">User Tax ID</label>
                    <div class="col-sm-10">
                      <input required type="number" name="user_tax_id" class="form-control" oninput="javascript: this.value = this.value
                      .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" value="{{$getRecord->user_tax_id}}" readonly>
                    </div>
                  </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan User</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="user_id" required>
                        <option value="">Select Loan User</option>
                        @foreach($getLoanUser as $value_3)
                        <option  {{ ($value_3->id == $getRecord->user_id) ? 'selected' : ''}} value="{{ $value_3->id }}">{{ $value_3->first_name }} {{ $value_3->middle_name }} {{ $value_3->last_name }}</option>
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
                        <option {{ ($value_4->id == $getRecord->staff_id) ? 'selected' : ''}} value="{{ $value_4->id }}">{{ $value_4->name }} {{ $value_4->last_name }} {{ $value_4->surname }}</option>
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
                            <option {{ ($value_1->id == $getRecord->loan_types_id) ? 'selected' : ''}} value="{{$value_1->id}}">{{$value_1->type_name}}</option>
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
                            <option {{ ($value_2->id == $getRecord->loan_plan_id) ? 'selected' : ''}} value="{{$value_2->id}}">{{$value_2->months}} [ {{ $value_2->interest_percentage .'% '. $value_2->penalty_rate}} ]</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Loan Amount</label>
                <div class="col-sm-10">
                  <input required type="number" name="loan_amount" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="{{$getRecord->loan_amount}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Loan Amount Paid</label>
                <div class="col-sm-10">
                  <input required type="number" name="loan_amount_paid" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="{{$getRecord->loan_amount_paid}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Loan Amount Pending</label>
                <div class="col-sm-10">
                  <input required type="number" name="loan_amount_remaining" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="{{$getRecord->loan_amount_remaining}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Purpose</label>
                <div class="col-sm-10">
                  <textarea name="purpose" class="form-control">{{$getRecord->purpose}}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
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