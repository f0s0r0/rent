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
    
        <h3><i class="fa fa-angle-pencil"></i>All Users</h3>
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
                        <th class="th-sm">Id/Passport
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Room Number
                        </th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm">Profile</th>
                        <th class="th-sm">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($userdata as $udata)
                      <tr class="fixed">
                        <td>{{ $udata->firstName }}</td>
                        <td>{{ $udata->middleName }}</td>
                        <td>{{ $udata->lastName }}</td>
                        <td>{{ $udata->phoneNumber }}</td>
                        <td>{{ $udata->idNumber }}</td>
                        <td>{{ $udata->userType }}</td>
                        <td>{{ $udata->email }}</td>
                        <td>{{ $udata->room }}</td>
                        <td>{{ $udata->user_status }}</td>
                        <td><img src="{{ asset('/public/uploads/profiles/'.$udata->profile_photo) }}" height="30" width="30"></td>
                        <td><a href="{{ url('update-user/'.$udata->id) }}"  type="button"><i class="fa fa-pencil btn btn-primary"></i></a>
                        &nbsp&nbsp<a href="{{ url('delete-user/'.$udata->id) }}" type="button"><i class="fa fa-trash btn btn-danger"></i></a></td>
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