@extends('control.app')
@section('content')


  <div class="content-wrapper pt-3">
    <section class="content">
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:600px;">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center" style="background-color: #020e29; color: white;">
              <h4>Feather Softwares</h4>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Edit Registration</p>

              <form action="{{ route('update') }}" id="updateform" method="post">
                @csrf
                 <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                <div class="mb-3">
                  <label for="name">Name</label><br>
                  <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="User Name">
                </div>
                <div class="mb-3">
                  <label for="email">Email</label><br>
                  <input type="email" class="form-control" value="{{$data->email}}" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label for="role">Role</label><br>
                 <select name="role" class="form-select" id="role">
                   <option {{ $data->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                   <option {{ $data->role == 'user' ? 'selected' : '' }} value="user">User</option>
                   <option {{ $data->role == 'member' ? 'selected' : '' }} value="member">Member</option>
                 </select>

                </div>
                <div class="mb-3">
                  <label for="password">Password</label><br>
                  <input type="password" class="form-control" id="passinput" name="password" placeholder="Password">
                </div>
                <!-- <div class="mb-3">
                  <label for="c_password">Confirm Password</label><br>
                  <input type="password" class="form-control" id="c_passinput" name="current_password" placeholder="Confirm Password">
                </div> -->
                 <div class="row g-3 align-items-center">
                  <div class="col-auto m-0"><p class="fw-bold">Is Active:</p></div>
                  <div class="col-auto">
                    <div class="input-group mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  {{ $data->is_active == '1' ? 'checked' : ''}} name="is_active" id="inlineRadio3"
                          value="1">
                        <label class="form-check-label" for="inlineRadio3">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  {{ $data->is_active == '0' ? 'checked' : ''}} name="is_active" id="inlineRadio4"
                          value="0">
                        <label class="form-check-label" for="inlineRadio4">Deactive</label>
                      </div>
                    </div>
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn submit_btn btn-block">Update</button>
                </div>
              </form>
              <!-- /.social-auth-links -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  </div>

@endsection
