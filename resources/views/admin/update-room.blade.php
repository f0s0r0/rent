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
              <h3>Update Room</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('updatedroom/'.$uroom->id) }}">
                    {{ csrf_field() }}
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room No/Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ $uroom->room_no }}"  required="" placeholder="Enter Room No/Name" name="roomnumber">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Floor</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" value="{{ $uroom->floor }}"  required="" placeholder="Enter Floor Number" name="floor">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room Type</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="role">
                        <option>{{ $uroom->room_type}}</option>
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
                    <input type="number" class="form-control" value="{{ $uroom->amount }}"  required="" placeholder="Enter Amount" name="amountpaid">
                  </div>
                </div>  
                </div>  
                <div class="col-lg-6">            
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Update Room</button>
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