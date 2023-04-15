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
		@include('alerts')
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                    
                            <h5 class="mb-0 text-primary">Edit Federal Tax Slab</h5>
                        </div>
                        <hr>
                        <form class="row g-2" action="{{route('master.update_fedralslab')}}" method="post">
							@csrf	
                            <input type="hidden" name="id" value="{{$editfd->id}}">
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Date </label>
                                <input type="date" class="form-control" id="inputFirstName" placeholder="Market Open Time"> 
                            </div> -->
                            
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Min Value</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Min Value" name="min_value" value="{{$editfd->min_value}}"> 
                            </div>
                            
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Max Value</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Max Value" name="max_value" value="{{$editfd->max_value}}"> 
                            </div>
                            
                            <!-- <div class="col-md-2" style="margin-top: 6vh;text-align: center;" ></div> -->
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Percentage of Tax</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Percentage of Tax" name="percentage_of_tax" value="{{$editfd->percentage_of_tax}}"> 
                            </div>
                            
                            <div class="col-md-1" style="margin-top: 6vh;text-align: left;" >
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
				
			
				<!-- <h6 class="mb-0 text-uppercase">DataTable</h6> -->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Min Value</th>
										<th>Max Value</th>
										<th>Percentage of Tax</th>
										<th style="background-color:#fff;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($fed as $fedraslab)
										
									
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$fedraslab->min_value}}</td>
										<td>{{$fedraslab->max_value}}</td>
										<td>{{$fedraslab->percentage_of_tax}}</td>
										 
										<td style="background-color:#fff;">
											<!-- <button type="button" class="btn1 btn-outline-primary"><i class='fadeIn animated bx bx-message-add' data-bs-toggle="modal" data-bs-target="#exampleLargeModal"></i></button> -->
                                            <a href="{{route('master.edit_fedralslab',$fedraslab->id)}}">
											<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button></a>
                                            <a href="{{route('master.destroy_fedralslab',$fedraslab->id)}}">
											<button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
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