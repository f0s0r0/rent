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
    
        <h3><i class="fa fa-angle-pencil"></i>Occupied Rooms</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
                <table id="dt-horizontal-scroll" class="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Room No/Name</th>
                        <th class="th-sm">Floor</th>
                        <th class="th-sm">Room Type</th>
                        <th class="th-sm">Tenant Name</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($occupied as $ocpd)
                      <tr>
                        <td>{{ $ocpd->room }}</td>
                        <td>2</td>
                        <td>2</td>
                        <td>{{ $ocpd->firstName .'  '.$ocpd->lastName }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
           
            
           
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