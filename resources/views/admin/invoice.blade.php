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
    
        <h3><i class="fa fa-angle-pencil"></i>Tenants Payments</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
                <table id="dt-horizontal-scroll" class="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                      	<th class="th-sm">Paid By</th>
                        <th class="th-sm">Room No/Name</th>
                        <th class="th-sm">Floor</th>
                        <th class="th-sm">Room Type</th>
                        <th class="th-sm">Amount Paid</th> 
                        <th class="th-sm">Balance</th>
                        <th class="th-sm">Date Paid</th>                    
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pay as $payments)
                      <tr class="fixed">
                        <td>{{ $payments->firstName ." " .$payments->middleName." ".$payments->lastName }}</td>
                        <td>{{ $payments->room_no }}</td>
                        <td>{{ $payments->floor }}</td>
                        <td>{{ $payments->room_type }}</td>
                        <td>{{ $payments->amount_paid }}</td>
                        <td>0</td>
                        <td>{{ $payments->created_at }}</td>
                      </tr>
                      @endforeach                                         
                    </tbody>
                  </table>
                  <p style="font-weight: bold;font-size: 20px;color: blue;">Total Collection:Kshs. {{ $ttl }}</p>
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