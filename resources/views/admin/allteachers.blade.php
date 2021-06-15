
@extends('layouts.header')
@section('headerside')
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
    
        <h3><i class="fa fa-angle-pencil"></i>Our Teachers</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
                <table id="dt-horizontal-scroll" class="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Firt Name
                        </th>
                        <th class="th-sm">Middle Name
                        </th>
                        <th class="th-sm">Last Name
                        </th>
                        <th class="th-sm">Phone Number
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Email
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($userdata as $udata)
                      <tr class="fixed">
                        <td>{{ $udata->firstName }}</td>
                        <td>{{ $udata->middleName }}</td>
                        <td>{{ $udata->lastName }}</td>
                        <td>{{ $udata->phoneNumber }}</td>
                        <td>{{ $udata->userType }}</td>
                        <td>{{ $udata->email }}</td>
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