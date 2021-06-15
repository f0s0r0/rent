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
    
        <h3><i class="fa fa-angle-pencil"></i>Your Room Details</h3>
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
                        <th class="th-sm">Date Joined</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
            </div>
           
    @endsection
    @section('footer')
</body>

</html>
@endsection
@endguest