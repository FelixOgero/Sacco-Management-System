@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>New Dividend Application</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dividend</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/dividends/add') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">ID Number <span style="color: red"> *</span></label>
                    <div class="col-sm-10">
                      <input required type="number" name="id_number" class="form-control" oninput="javascript: this.value = this.value
                      .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
                      <span style="color: red;">{{ $errors->first('id_number')}}</span>
                    </div>
                  </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">First Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="first_name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Middle Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="middle_name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Last Name <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="text" name="last_name" class="form-control">
                </div>
              </div>
            

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Accumulated Amount <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="number" name="accumulated_amount" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Amount <span style="color: red"> *</span></label>
                <div class="col-sm-10">
                  <input required type="number" name="amount" class="form-control" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
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