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
              <h3>New Tenant</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('new-user') }}">
                    {{ csrf_field() }}
                <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">First Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"  required="" placeholder="Enter First name" name="fname">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Middle Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"  required="" placeholder="Enter Middle Name" name="mname">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Last Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"  required="" placeholder="Enter Last Name" name="lname">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Phone Number</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control"   placeholder="Enter Phone Number" name="pnumber">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Id/Passport </label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control"  placeholder="Enter Id/Passport Number" name="idnumber">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Role</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="role">
                        <option value="admin">Admin </option>
                        <option value="tenant">Tenant</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room No.</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="roomno">
                    @foreach($rmno as $rooms)
                        <option>{{ $rooms->room_no }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Email</label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control"  placeholder="Enter Email" name="email">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Password </label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control"  placeholder="Enter Password" name="password">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Add Tenant</button>
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