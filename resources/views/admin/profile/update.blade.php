@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Profile</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        @include('_message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/profile/update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-4">
                <label for="inputText" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" required value="{{ $getRecord->name }}">
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputText" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="last_name" class="form-control" value="{{ $getRecord->last_name }}">
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputText" class="col-sm-2 col-form-label">Surname</label>
                <div class="col-sm-10">
                  <input type="text" name="surname" class="form-control" required value="{{ $getRecord->surname }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" required value="{{ $getRecord->email }}">
                  <span style="color: red;">{{ $errors->first('email')}}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                  <input type="number" name="mobile_number" class="form-control" value="{{ $getRecord->mobile_number }}" oninput="javascript: this.value = this.value
                  .replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Profile Upload</label>
                <div class="col-sm-10">
                  <input class="form-control" name="profile_image" type="file" id="formFile">
                  @if(!empty($getRecord->profile_image))
                    <img src="{{ $getRecord -> getProfileImage() }}" height="70px" width="70px">
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">BOD Date</label>
                <div class="col-sm-10">
                  <input type="date" value="{{ $getRecord->bod_date }}" name="bod_date" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" value="">
                  (Leave field blank if you are not changing the password)
                  <span style="color: red;">{{ $errors->first('password')}}</span>
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