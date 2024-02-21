@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Update Logo</h1>
</div>

<section>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Logo and Name</h5>

                    <form action="{{ url('admin/logo_update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Logo Name <span style="color: red"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{ $getRecord->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Logo Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo" class="form-control">
                                @if(!empty($getRecord->logo))
                                <img src="{{ $getRecord->getLogo() }}" alt="" height="100px" width="100px">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
