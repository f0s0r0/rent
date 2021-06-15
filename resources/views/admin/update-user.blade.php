@guest                    
    @else
@extends('layouts.header')
@section('headerside')
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Update User</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('updateduser/'.$u_user->id) }}">
                    {{ csrf_field() }}
                <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">First Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ $u_user->firstName }}"  required="" placeholder="Enter First name" name="fname">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Middle Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ $u_user->middleName }}"  required="" placeholder="Enter Middle Name" name="mname">
                  </div>
                </div>
              </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Last Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ $u_user->lastName }}"  required="" placeholder="Enter Last Name" name="lname">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Phone Number</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" value="{{ $u_user->phoneNumber }}"   placeholder="Enter Phone Number" name="pnumber">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Id/Passport </label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" value="{{ $u_user->idNumber }}"  placeholder="Enter Id/Passport Number" name="idnumber">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Role</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="role">
                        <option>{{ $u_user->userType}}</option>
                        <option value="admin">Admin </option>
                        <option value="tenant">Tenant</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Email</label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control" value="{{ $u_user->email }}"  placeholder="Enter Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Password </label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" value="{{ $u_user->password }}"  placeholder="Enter Password" name="password">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">User Status </label>
                  <div class="col-sm-12">
                    <select class="form-control" name="status">
                        <option>{{ $u_user->user_status}}</option>
                        <option value="active">active </option>
                        <option value="inactive">inactive</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Profile </label>
                  <div class="col-sm-12">
                    <img class="img-circle" src="{{ asset('/public/uploads/profiles/'.$u_user->profile_photo) }}"  height="80" width="150">
                  </div>
                </div>                 
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Make Changes</button>
                  </div>
                </div>
              </div>
                
            </form>
            
           
            
           
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    @endsection
    @section('footer')
</body>

</html>
@endsection
@endguest