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
              <h3>Pay Rent</h3>
            </div>
            @foreach($userm as $roomuser)
            <form class="form-horizontal style-form" method="POST" action="{{ url('pay-ments') }}">
                    {{ csrf_field() }}       
                    <input type="" value="{{ $roomuser->id }}" hidden="true" name="userid">
                    <input type="" value="{{ $roomuser->roomid }}" hidden="true" name="roomid">
                    <input type="" value="{{ $roomuser->amount }}" hidden="true" name="amt"> 
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Phone Number</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control"   placeholder="Enter Phone Number" name="pnumber" value="{{ $roomuser->phoneNumber }}" required="">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
              	<div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Amount to Pay</label>
                  <div class="col-sm-12">
                    <input type="number"  class="form-control" placeholder="Your Rent" value="{{ $roomuser->amount }}" name="amountpay" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Pay Rent</button>
                  </div>
                </div>
              </div>  
              @endforeach              
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