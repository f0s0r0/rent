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
              <h3>Admin Dashboard</h3>
            </div>
                  <div class="row text-center">
                    <div class="col-md-3 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                         
                        <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-users"></i></span>
                          <h4 class="card-title">Tenants</h4>
                          <p class="card-text">{{ $totalt }}</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Tenants</h4>
                          <p class="card-text">{{ $totalt }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                          <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-university"></i></span>
                          <h4 class="card-title">Rooms</h4>
                          <p class="card-text">{{ $totalr }}</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Rooms</h4>
                          <p class="card-text">{{ $totalr }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                          <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-lock"></i></span>
                          <h4 class="card-title">Occupied Rooms</h4>
                          <p class="card-text">{{ $totalb }}</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Occupied Rooms</h4>
                          <p class="card-text">{{ $totalb }}</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 card-container">
                      <div class="card card-flip">
                        <div class="front card-block">
                          <span class="card-img-top fa" style="font-size: 4em"><i class="fa fa-user-times"></i></span>
                          <h4 class="card-title">Vacant Rooms</h4>
                          <p class="card-text">3</p>
                        </div>
                        <div class="back card-block">
                        <h4 class="card-title">Vacant Rooms</h4>
                          <p class="card-text">3</p>
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