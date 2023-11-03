@extends('layout')
@section('content')

<style>
    .popup-container {
  position: relative;
}
.popup-content {
  display: none;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 0;
  background-color: #F9F9F9;
  padding: 10px;
  border: 1px solid #ccc;
}
.popup-container:hover .popup-content {
  display: block;
}
.popup-btn {
  /* background-color: #f2f2f2; */
  color: black;
  border: none;
  padding: 10px;
  cursor: pointer;
}
.popup-btn:hover {
  background-color: #f2f2f2;
}
</style>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-6 offset-md-3">
        @include('alerts')

                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                    
                            <h5 class="mb-0 text-primary">Time Master Setting</h5>
                        </div>
                        <hr>
                        <form class="row g-2" method="post" action="{{route('update-time-master')}}">	
                            @csrf
                        
                            <div class="col-md-6 ">
                                <label for="inputFirstName" class="form-label">Day Start Time</label>
                                <input type="time" class="form-control" id="inputFirstName" name="day_start_time" 
                    value="{{ $data->day_start_time ? date($data->day_start_time,strtotime('H:i')) : date('H:i')}}"> 
                            </div>
                            <div class="col-md-6 ">
                                <label for="inputFirstName" class="form-label">Day End Time</label>
                                <input type="time" class="form-control" id="inputFirstName" name="day_end_time" 
                                value="{{ $data->day_end_time ? date($data->day_end_time,strtotime('H:i')) : date('H:i')}}"> 
 
                            </div>
                            <div class="col-md-6 ">
                                <label for="inputFirstName" class="form-label">Night Start Time</label>
                                <input type="time" class="form-control" id="inputFirstName" name="night_start_time" 
                                value="{{ $data->night_start_time ? date($data->night_start_time,strtotime('H:i')) : date('H:i')}}"> 

                            </div>
                            <div class="col-md-6 ">
                                <label for="inputFirstName" class="form-label">Night End Time</label>
                                <input type="time" class="form-control" id="inputFirstName" name="night_end_time"
                                value="{{ $data->night_end_time ? date($data->night_end_time,strtotime('H:i')) : date('H:i')}}"> 
 
                            </div>
                            
                            <div class="col-md-2" style="margin-top: 1vh;text-align: left;" >
                                <button type="submit" class="btn btn-primary px-3">Update</button>
                            </div>
                        
                            <!-- <div class="col-md-12" style="margin-top: 5px;text-align: right;" >
                                <button type="submit" class="btn btn-primary px-3">Submit</button>
                            </div> -->
                        </form>

                    </div>

                </div>
            </div>
        </div>
        

        
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
    
      
        
        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payout Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="card">
                            <div class="card-body">
                            
                            </div>
                        </div> -->
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col">Selected Location</th>
                                    <th scope="col">Selected Categories</th>
                                    <th scope="col">Straight pay hours</th>
                                    <th scope="col">Overtime 1.5 pay hours</th>
                                    <th scope="col">Overtime 2.0 pay hours</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Pune</td>
                                    <td>10</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <!-- <td>
                                        <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                        <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Pune</td>
                                    <td>10</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <!-- <td>
                                        <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                        <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->


@stop