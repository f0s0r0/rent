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
              <h3>User Profile Update</h3>
            </div>
            @foreach($userdata as $udata)
            <form class="form-horizontal style-form" method="POST" action="{{ url('update-user/'.$udata->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
            <div class="col-lg-6">                   
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">First Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly="" value="{{ $udata->firstName }}"  required="" placeholder="Enter First name" name="fname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Middle Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly="" value="{{ $udata->middleName }}"  required="" placeholder="Enter Middle Name" name="mname">
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Last Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly="" value="{{ $udata->lastName }}" required="" placeholder="Enter Last Name" name="lname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Phone Number</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" readonly="" value="{{ $udata->phoneNumber }}"   placeholder="Enter Phone Number" name="pnumber">
                  </div>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Id/Passport </label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" readonly="" value="{{ $udata->idNumber }}"  placeholder="Enter Id/Passport Number" name="idnumber">
                  </div>
                </div>               
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Email</label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control" readonly="" value="{{ $udata->email }}"  placeholder="Enter Email" name="email">
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Profile Photos</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control" value="{{ asset('/public/uploads/profiles/'. Auth()->user()->profile_photo) }}" name="image">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Change Password </label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control"  value="{{ $udata->password }}" placeholder="Enter Password" name="password">
                  </div>
                </div>
            </div>
            <div class="col-lg-6">              
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Update Profile</button>
                  </div>
                </div>
             </div>
                
            </form>
            @endforeach
           
            
           
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