@extends('layouts.header')
@section('headerside')
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Update Exams</h3>
            </div>
            <form class="form-horizontal style-form" method="POST" action="{{ url('updatedexam/'.$uexam->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Exam Title </label>
                  <div class="col-sm-10">
                    <input type="hidden"  value="{{ ucwords(Auth()->user()->id) }}" name="teacherid">
                    <input type="text" class="form-control" value="{{ $uexam->exam_title }}"  required="" placeholder="Exam Paper Title" name="examtitle">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Subject</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="subject">
                    
                        <option>{{ $uexam->subject }} </option>
                    
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Form</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="form">
                        <option>{{ $uexam->form }} </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Exam Paper</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" value="{{ asset('/public/uploads/exams/'. $uexam->exam_paper) }}"   required=""  name="image">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                  <button type="submit" class="btn btn-theme btn-lg">Update Exam</button>
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