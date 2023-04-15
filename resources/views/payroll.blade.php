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
				
				<div class="overlay toggle-icon"></div>
				<!--end overlay-->
				<!--Start Back To Top Button--> 
				<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
				<!--End Back To Top Button-->
				
				<div class="col">
					<!-- <h6 class="mb-0 text-uppercase">Success Nav Tabs</h6>
					<hr/> -->
					<div class="card">
						<div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Payroll</h5>
                            </div>
                            <hr>
							
							<div class="tab-content py-3">
								<form class="row g-2">
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">From Date</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
									</div> 
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">To Date</label>
										<input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
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
											<option selected>All</option>
											<option >Lorem</option>
											<option value="1">Javier</option>
											<option value="2">Diego</option>
											
										</select>
									</div>
									<div class="col-md-2" style="margin-top: 6vh;">
										<button type="submit" class="btn btn-primary px-3" >Search</button>
									</div>
								</form>
								<!-- <div class="popup-container">
									<button class="popup-btn">Hover Me</button>
									<div class="popup-content">
									  <p>This is the popup content!</p>
									</div>
								  </div> -->
								<div class="tab-pane fade show active" id="successhome" role="tabpanel">
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
													<th>Pay/Hour</th>
													<th>Approx Pay</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>12-2-2023</td>
													<td>Canada</td>
													<td>Workplace</td>
													<td>
														<div class="popup-container">
														<span class="popup-btn">Lorem</span>
														<div class="popup-content">
														  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
														Start & End Dt: 12-3-2023 to 13-2-2023<br>
														Expected Hours For Complition: 3Hr <br>
														Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
														</div>
													  </div>
													</td>
												
													<td>46</td>
													<td>7878</td>
													<td>
														<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
														<button type="button" class="btn1 btn-outline-success"><i class='fadeIn animated bx bx-check-double'></i></button> 
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>12-2-2023</td>
													<td>Canada</td>
													<td>Workplace</td>
													<td><div class="popup-container">
														<span class="popup-btn">Lorem</span>
														<div class="popup-content">
														  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
														Start & End Dt: 12-3-2023 to 13-2-2023<br>
														Expected Hours For Complition: 3Hr <br>
														Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
														</div>
													  </div></td>
												
													<td>46</td>
													<td>7878</td>
													<td>
														<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
														<button type="button" class="btn1 btn-outline-success"><i class='fadeIn animated bx bx-check-double'></i></button> 
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="successprofile" role="tabpanel">
									<div class="table-responsive">
										<table id="example4" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th>Date</th>
													<th>Location</th>  
													<th>Company</th>
													<th>Employee</th>
												
													<th>Pay/Hour</th>
													<th>Approx Pay</th>
													<th style="background-color: #ffffff;">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>12-2-2023</td>
													<td>Canada</td>
													<td>Workplace</td>
													<td><div class="popup-container">
														<span class="popup-btn">Lorem</span>
														<div class="popup-content">
														  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
														Start & End Dt: 12-3-2023 to 13-2-2023<br>
														Expected Hours For Complition: 3Hr <br>
														Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
														</div>
													  </div></td>
												
													<td>45</td>
													<td>5000</td>
													<td style="background-color: #ffffff;">
														<button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
														<button type="button" class="btn1 btn-outline-success"><i class='fadeIn animated bx bx-check-double'></i></button> 
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>12-2-2023</td>
													<td>Canada</td>
													<td>Workplace</td>
													<td ><div class="popup-container">
														<span class="popup-btn">Lorem</span>
														<div class="popup-content">
														  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
														Start & End Dt: 12-3-2023 to 13-2-2023<br>
														Expected Hours For Complition: 3Hr <br>
														Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
														</div>
													  </div></td>
												
													<td>45</td>
													<td>5000</td>
													<td style="background-color: #ffffff;">
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
				</div>
			
			</div>
		</div>
		<!--end page wrapper -->
		@stop