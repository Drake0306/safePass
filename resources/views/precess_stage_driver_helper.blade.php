<div class="col-md-12">

    <!-- 1 -->
    @if($truck_data->process_stage > 0)
    <a type="button" class="btn btn-success" href="{{url('truck/data/scan/edit/'.$truck_data->id)}}">
        1 Step Form Complete <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
    @else
    <a type="button" class="btn btn-danger text-light" href="#">
        1 Step Form Complete <i class="fa fa-lock" aria-hidden="true"></i> </a>
    @endif

    <!-- 2 -->
    @if($truck_data->process_stage > 1)
    <a type="button" class="btn btn-success" href="{{url('/truck/data/update/file/upload/section/'.$truck_data->id)}}" style="margin-left: 20px">
        2 Step Upload / Take picture <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
    @else
    <a type="button" class="btn btn-danger text-light" href="#" style="margin-left: 20px" onClick="alert('First complete this form before moving to the next one');" >
        2 Step Upload / Take picture <i class="fa fa-lock" aria-hidden="true"></i> </a>
    @endif

  <!-- 3 -->
    @if($truck_data->process_stage > 1)
    <a type="button" class="btn btn-info" href="{{url('/truck/data/pdf/print/'.$truck_data->id)}}" style="margin-left: 20px">
        3 Step Print PDF <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
    @else
    <a type="button" class="btn btn-danger text-light" href="#" style="margin-left: 20px" onClick="alert('First complete this form before moving to the next one');">
        3 Step Print PDF <i class="fa fa-lock" aria-hidden="true"></i> </a>
    @endif

</div>