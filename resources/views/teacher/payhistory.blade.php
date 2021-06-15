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
    
        <h3><i class="fa fa-angle-pencil"></i>Your Payment History</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
                <table id="dt-horizontal-scroll" class="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Occupant Name</th>
                        <th class="th-sm">Room No</th>
                        <th class="th-sm">Rent</th>
                        <th class="th-sm">Amount Paid</th>
                        <th class="th-sm">Balance</th>
                        <th class="th-sm">Date Paid</th>                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($pay as $pays)
                      <tr class="fixed">
                        <td>{{ $pays->firstName }}</td>
                        <td>{{ $pays->room }}</td>
                        <td>{{ $pays->amount }}</td>
                        <td>{{ $pays->amount_paid }}</td>
                        <td>{{ $pays->amount_paid }}</td>
                        <td>{{ $pays->created_at }}</td>
                      </tr>  
                      @endforeach                  
                    </tbody>
                  </table>
                  <p style="font-weight: bold;font-size: 20px;color: red;">Total Expenditure:Kshs. {{ $ttl }}</p>
            </div>
    @endsection
    @section('footer')
</body>

</html>
@endsection
@endguest