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
              <h3>Tenant's Main Dashboard</h3>
            </div>
                  <div class="row text-center">
                    <div class="col-md-4 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                         
                        <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-university"></i></span>
                          <h4 class="card-title">Your Room No.</h4>
                          <p class="card-text">{{ ucwords(Auth()->user()->room) }}</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Your Room No.</h4>
                          <p class="card-text">{{ ucwords(Auth()->user()->room) }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                          <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-money"></i></span>
                          <h4 class="card-title">Your Balance</h4>
                          <p class="card-text">1</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Your Balance</h4>
                          <p class="card-text">1</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                          <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-calendar"></i></span>
                          <h4 class="card-title">Period Stayed</h4>
                            
                          <p class="card-text">{{ $sty }} Months</p>
                          
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Period Stayed</h4>
                          <p class="card-text">{{ $sty }} Months</p>
                        </div>
                      </div>
                    </div>
           
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
<script>

$(document).ready(function() {
  var front = document.getElementsByClassName("front");
  var back = document.getElementsByClassName("back");

  var highest = 0;
  var absoluteSide = "";

  for (var i = 0; i < front.length; i++) {
    if (front[i].offsetHeight > back[i].offsetHeight) {
      if (front[i].offsetHeight > highest) {
        highest = front[i].offsetHeight;
        absoluteSide = ".front";
      }
    } else if (back[i].offsetHeight > highest) {
      highest = back[i].offsetHeight;
      absoluteSide = ".back";
    }
  }
  $(".front").css("height", highest);
  $(".back").css("height", highest);
  $(absoluteSide).css("position", "absolute");
});


</script>
</html>
@endsection
@endguest