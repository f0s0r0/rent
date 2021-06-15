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
              <h3>New Room</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('addroom') }}">
                    {{ csrf_field() }}
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room Number</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"  required="" placeholder="Enter Room Number" name="roomno">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Floor</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"  required="" placeholder="Enter Floor" name="floor">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room Type</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="roomtype">
                        <option selected=true disabled>Choose Room type </option>
                        <option>Single Room </option>
                        <option>One BD</option>
                        <option>Two BD</option>
                        <option>Three BD</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Amount</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control"   placeholder="Enter Amount in Kshs 12000" name="amount">
                  </div>
                </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Add Room</button>
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
