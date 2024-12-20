@extends('control.app')
@section('content')



   <div class="content-wrapper pt-3" >
    <section class="content" >
      <div class="container d-flex justify-content-center">
        <div class="login-box" style="width:100%;">
          <!-- /.login-logo -->
          <div class="card card-outline " >
            
            <div class="card-body">
              <h2 class="login-box-msg">Registration Form</h2>

            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="name">Registration Number:</label><br>
                  <input type="text" class="form-control"  name="reg_no" placeholder="Registration Number">
                </div>
                 <div class="col-md-4 mb-3">
                  <label for="name">Type:</label><br>
                
                  <select name="working_type" class="form-control" id="working_type">
                  <option value="internship">Internship</option>
                  <option value="project">Project</option>
                  <option value="course">Course</option>
                  <option value="other">Other</option>

                </select>
                </div>

                 <div class="col-md-4 mb-3">
                  <label for="name">Name of the Domain:</label><br>
                  <input type="text" class="form-control"  required name="name_domain" placeholder="Name of the domain">
                </div>
                 </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                  <label for="name">Name:</label><br>
                  <input type="text" class="form-control" required name="name" placeholder="Name">
                </div>
                 <div class="col-md-4 mb-3">
                  <label for="name">Date Of birth:</label><br>
                  <input type="date" class="form-control"  name="date_of_birth" placeholder="Date Of birth">
                </div>
              


                <div class="col-md-4 mb-3">
                  <label for="name">Mobile Number:</label><br>
                  <input type="number" class="form-control"  required name="mobile" placeholder="Mobile Number">
                </div>
                
                  
                    </div>
                </div>
                

                <div class="container">
                <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="name">Email:</label><br>
                  <input type="mail" class="form-control"  required name="mail" placeholder="Email">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="name">Working:</label><br>
                
                  <select name="working_status" class="form-control" id="working_status">
                  <option value="employed">Employed</option>
                  <option value="un-employed">Un-Employed</option>

                </select>
                </div>
                
                <div class="col-md-4 mb-3">
                  <label for="name">Parent's contact:</label><br>
                  <input type="number" class="form-control"   name="parents_contact" placeholder="Parent's contact">
                </div>

               
                 
                 </div>
                </div>
                <div class="container">
                   <div class="row">


                 <div class="col-md-4 mb-3">
                  <label for="name">Branch:</label><br>
                
                  <select name="branch" class="form-control" id="branch">
                  <option value="nagercoil">Nagercoil</option>
                  <option value="marthandam">Marthandam</option>
                  <option value="online">Online</option>
                  </select>

                 </div>      

                     <div class="col-md-4 mb-3">
                     <label for="name">Address:</label><br>
                     <textarea id="address" name="address" rows="3" cols="40" class="form-control">

                   </textarea>
                    </div>
                      <div class="col-md-4 mb-3">
                     <label for="name">Reason For Internship:</label><br>
                    <textarea id="reason" name="reason" rows="3" cols="40" class="form-control">

                   </textarea>
                    </div>

                  </div>

                </div>
                
                 <div class="container">
                <div class="row">
                    <h5>Education Details:</h5>
                <div class="col-md-4 mb-3">
                  <label for="name">College:</label><br>
                  <select name="college" class="form-control" id="college">
                    @foreach($college as $col)
                    <option value="{{$col->id}}" selected>{{$col->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="name">Department:</label><br>
                  <select name="department" class="form-control" id="department">
                    @foreach($department as $dep)
                    <option value="{{$dep->id}}" selected>{{$dep->name}}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="col-md-4 mb-3">
                  <?php $years = range(1900, strftime("%Y", time())); ?>
                  <label for="name">Year of Passout:</label><br>
                     <select name="year" class="form-control" id="year">
                      <option value="">Select Year</option>
                       @foreach($years as $year)  
                       <option value="{{$year}}">{{ $year}}</option>
                      @endforeach
                     </select>
                </div>
               
                 
                 </div>
                </div>
              <div class="container">
                <div class="row">
                    <center><h5>Internship Details:</h5></center>
                 <div class="col-md-4 mb-3">
                  <label for="name">Date of joining:</label><br>
                   <input type="date" class="form-control"  required name="date_of_joining" placeholder="Date Of birth">
                 </div>

                 

                  <div class="col-md-4 mb-3">
                  <label for="name">Internship Structure-days:</label><br>
                  <input type="number" class="form-control" name="intern_days" placeholder="Internship Structure-days">
                  </div>

                  <div class="col-md-4 mb-3">
                  <label for="week">Lead Source</label>
                  <input type="text" class="form-control"  name="lead_source" placeholder="Lead Source">
                  </div>

              
                 </div>
              </div>
               <div class="container">
                <div class="row">
                    <h5><center>Fees Details:</center></h5>

                     <div class="col-md-3 mb-3">
                      <label for="name">Amount:</label><br>
                      <input type="number" class="form-control amount"   name="amount" id="amount">
                      </div>
                      <div class="col-md-3 mb-3">
                      <label for="name">Pay:</label><br>
                      <input type="number" class="form-control pay"   name="pay" id="pay">
                      </div>
                       <div class="col-md-3 mb-3">
                      <label for="name">Balance:</label><br>
                      <input type="number" class="form-control balance" readonly  name="balance" id="balance">
                      </div>
                      <div class="col-md-3 mb-3">
                      <label for="name">Payment date:</label><br>
                      <input type="date" class="form-control"  required name="date_of_payment" >
                      </div>
                     <div>

                    </div>
              <!-- <div class="container">
                <div class="row">

                  </div>
              </div> -->
              
                
                 <div class="text-center">
                  <button type="submit" class="btn submit_btn btn-block" style="width:20%;">Save</button>
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
@push('scripts')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery and Select2 JS -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#college').select2({
            width: '100%'  // Optional: Makes it responsive
        });
        $('#department').select2({
            width: '100%'  // Optional: Makes it responsive
        });
        $('#year').select2({
            width: '100%'  
        });
      $(document).on("change","#amount,#pay",function() {
    pay_cal();
});
function pay_cal(){
  var amount=$('#amount').val();
  var pay = $('#pay').val();
  var balance = amount - pay;
  $('#balance').val(balance);

}

    });
</script>
@endpush


