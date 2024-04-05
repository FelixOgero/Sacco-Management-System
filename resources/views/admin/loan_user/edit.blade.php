@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Edit Loan User</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Loan User</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/loan_user/edit/'.$getRecord->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">National ID <span style="color: red"> *</span></label>
                  <div class="col-sm-10">
                    <input required type="number" name="national_id" class="form-control" oninput="javascript: this.value = this.value
                    .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" value="{{ $getRecord->national_id }}">
                <span style="color: red;">{{ $errors->first('national_id')}}</span>  
                </div>
                </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">First Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="first_name" class="form-control" value="{{ $getRecord->first_name }}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Middle Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="middle_name" class="form-control" value="{{ $getRecord->middle_name }}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Last Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="last_name" class="form-control" value="{{ $getRecord->last_name }}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Address <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <textarea type="text" name="address" class="form-control">{{ $getRecord->address }}</textarea>
                </div>
              </div>            

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Contact <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="number" name="contact" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="{{ $getRecord->contact }}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Email <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="email" name="email" class="form-control" value="{{ $getRecord->email }}">
                  <span style="color: red;">{{ $errors->first('email')}}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Tax ID <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input readonly required type="text" name="tax_id" class="form-control" value="{{ $getRecord->tax_id }}">
                  <span style="color: red;">{{ $errors->first('tax_id')}}</span>
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