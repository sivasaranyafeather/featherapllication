@extends('control.app')

@section('content')

   <div class="content-wrapper pt-3" >
    <section class="content" >
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:600px;">
          <!-- /.login-logo -->
          <div class="card card-outline " >
            <div class="card-header text-center" style="background-color: #12071f; color: white;">
              <h4>Feather Softwares</h4>
            </div>
            <div class="card-body">
              <p class="login-box-msg">New Registration</p>

            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name">Name</label><br>
                  <input type="text" class="form-control" name="name" placeholder="User Name">
                </div>
                <div class="mb-3">
                  <label for="email">Email</label><br>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label for="role">Role</label><br>
                  <select name="role" class="form-select" id="role">
                    <option value="admin" selected>Admin</option>
                    <option value="user">User</option>
                    <option value="member">Member</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="password">Password</label><br>
                  <input type="password" class="form-control" id="passinput" name="password" placeholder="Password">
                </div>
                <!-- <div class="mb-3">
                  <label for="c_password">Confirm Password</label><br>
                  <input type="password" class="form-control" id="c_passinput" name="c_password" placeholder="Confirm Password">
                </div> -->
                 <div class="row g-3 align-items-center">
                  <div class="col-auto m-0"><p class="fw-bold">Is Active:</p></div>
                  <div class="col-auto">
                    <div class="input-group mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio3"
                          value="1">
                        <label class="form-check-label" for="inlineRadio3">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio4"
                          value="0">
                        <label class="form-check-label" for="inlineRadio4">Deactive</label>
                      </div>
                    </div>
                  </div>
                 <div class="text-center">
                  <button type="submit" class="btn submit_btn btn-block">Add User</button>
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
