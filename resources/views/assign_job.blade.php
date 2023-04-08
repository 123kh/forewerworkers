@extends('layout')
@section('content')
	<style>
	/* Base styling*/

/* Popover styling */

a {
  text-decoration: none;
}

.popover__title {
  font-size: 14px;
  line-height: 36px;
  text-decoration: none;
  color: rgb(0, 0, 0);
  text-align: center;
  padding: 15px 0;
}

.popover__wrapper {
  position: relative;
  margin-top: 1.5rem;
  display: inline-block;
}
.popover__content {
  opacity: 0;
  visibility: hidden;
  position: absolute;
  left: -40px;
  transform: translate(0, 10px);
  background-color: #fcfcfc;
  padding: 1.5rem;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  width: 960%;
}
.popover__content:before {
  position: absolute;
  z-index: 100;
  content: "";
  right: calc(50% - 10px);
  top: -8px;
  border-style: solid;
  border-width: 0 10px 10px 10px;
  border-color: transparent transparent #bfbfbf transparent;
  transition-duration: 0.3s;
  transition-property: transform;
}
.popover__wrapper:hover .popover__content {
  z-index: 100;
  opacity: 1;
  visibility: visible;
  transform: translate(0, -20px);
  transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
}


.modal {
  background:rgba(255, 255, 255, 0.7);
  position:fixed;
  width:100%;
  height:100%;
  top:0px;
  left:0px;
  bottom:0px;
  transition:all .5s ease-in-out;
  opacity:0;
  z-index:-1;
}





	</style>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
							
									<h5 class="mb-0 text-primary">Assign Job / Task</h5>
								</div>
								<hr>
								<form class="row g-2">	
									<!-- <div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Date </label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Market Open Time"> 
									</div> -->
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Date</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
									</div> 
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Location</label>
										<select class="form-select mb-3" aria-label="Default select example">
											<option selected>ABC</option>
											<option value="1">PQRS</option>
											<option value="2">MNPIO</option>
											
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Company</label>
										<select class="form-select mb-3" aria-label="Default select example">
											<option selected>ABC</option>
											<option value="1">PQRS</option>
											<option value="2">MNPIO</option>
											
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Employee</label>
										<select class="form-select mb-3" aria-label="Default select example">
											<option selected>ABC</option>
											<option value="1">PQRS</option>
											<option value="2">MNPIO</option>
											
										</select>
									</div>
									
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Job Title</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Job Title"> 
									</div>
									<div class="col-md-2">
										<label for="inputAddress" class="form-label">Job Description</label>
										<textarea class="form-control" id="inputAddress" placeholder="Job Description..." rows="1"></textarea>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Job Start Date</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
									</div> 
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Job End Date</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
									</div> 
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Expected Hours For Completion</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Expected Hours For Compleition"> 
									</div>
									<!-- <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Expected  Date & Time For Closing Job</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="xpected  Date & Time For Closing Job"> 
									</div> -->
									<!-- <div class="col-md-2">
										<label for="inputFirstName" class="form-label">Pay/Hour</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Pay/Hour"> 
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Approx Pay</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Approx Pay" disabled> 
									</div> -->
									<div class="col-md-2" style="margin-top: 6vh;">
										<button type="submit" class="btn btn-primary px-3" >Submit</button>
									</div>
									
									<!-- <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Starting Number</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Starting Number"> 
									</div> -->
									<!-- <div class="col-md-12" style="margin-top: 5px;text-align: right;" >
										<button type="submit" class="btn btn-primary px-3">Add</button>
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
										<th>Date</th>
										<th>Location</th>  
										<th>Company</th>
										<th>Employee</th>
										<!-- <th>Job Title</th>
										<th>Job Description</th>
										<th>Job Start Date</th>
										<th>Job End Date</th>
										<th>Expected Hours For Complition</th>
										<th>Expected Date & Time For Closing Job</th> -->
										<!-- <th>Pay/Hour</th>
										<th>Approx Pay</th> -->
										<th style="background-color:#ffffff;">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>12-2-2023</td>
										<td>Canada</td>
										<td>Workplace</td>
										<td ><div class="popover__wrapper">
											<a href="#">
											  <h2 class="popover__title">Lorem</h2>
											</a>
											<div class="popover__content">
											  <div class="modal-area">
												<p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
													Start & End Dt: 12-3-2023 to 13-2-2023<br>
													Expected Hours For Complition: 3Hr <br>
													Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>											
											  </div>
											</div>
										  </div></td>
										<!-- <td><div class="popup-container">
											<span class="popup-btn">Lorem</span>
											<div class="popup-content" style="z-index: 10000;">
											  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
											Start & End Dt: 12-3-2023 to 13-2-2023<br>
											Expected Hours For Complition: 3Hr <br>
											Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
											</div>
										  </div></td> -->
<!-- 									
										<td>3</td>
										<td>300</td> -->
										<td style="background-color:#ffffff;">
											<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
											<button type="button" class="btn1 btn-outline-success"><i class='fadeIn animated bx bx-check-double'></i></button> 
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>12-2-2023</td>
										<td>Canada</td>
										<td>Workplace</td>
										<td><div class="popover__wrapper">
											<a href="#">
											  <h2 class="popover__title">Lorem</h2>
											</a>
											<div class="popover__content">
											  <div class="modal-area">
												<p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
													Start & End Dt: 12-3-2023 to 13-2-2023<br>
													Expected Hours For Complition: 3Hr <br>
													Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>											
											  </div>
											</div>
										  </div>
									
										<!-- <td>3</td>
										<td>300</td> -->
										<td style="background-color:#ffffff;">
											<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
											<button type="button" class="btn1 btn-outline-success"><i class='fadeIn animated bx bx-check-double'></i></button> 
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<!--end page wrapper -->
@stop