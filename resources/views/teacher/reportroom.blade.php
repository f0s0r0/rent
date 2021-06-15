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
              <h3>File Complain</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('report-room') }}">
                    {{ csrf_field() }}
               

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Subject</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control"   placeholder="Complain subject" name="subject">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Message.</label>
                  <div class="col-sm-12">
                    <textarea class="form-control"   placeholder="Complain Message" name="message"></textarea>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
              	<div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Room No</label>
                  <div class="col-sm-12">
                    <input type="text"  class="form-control" value="{{ $rumnumber }}" readonly placeholder="Your Room no" name="roomno">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label"></label>
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-theme btn-lg">Send Complain</button>
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