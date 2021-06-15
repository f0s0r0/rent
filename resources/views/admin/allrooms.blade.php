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
    
        <h3><i class="fa fa-angle-pencil"></i>All Rooms</h3>
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
                        <th class="th-sm">Room Rent</th>
                        <th class="th-sm">Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($allrms as $arms)
                      <tr class="fixed">
                        <td>{{ $arms->room_no }}</td>
                        <td>{{ $arms->floor }}</td>
                        <td>{{ $arms->room_type }}</td>
                        <td>{{ $arms->amount }}</td>
                        <td><a href="{{ url('update-room/'.$arms->id) }}"  type="button"><i class="fa fa-pencil btn btn-primary"></i></a>
                        &nbsp&nbsp<a href="{{ url('delete-room/'.$arms->id) }}" type="button"><i class="fa fa-trash btn btn-danger"></i></a></td>
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