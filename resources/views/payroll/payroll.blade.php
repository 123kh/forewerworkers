@extends('layout')
@section('content')
@include('paginatecss')
	

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
							
								<form class="row g-2" action="">
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Year</label>
										<select name="year" class="single-select mb-3" aria-label="Default select example">
											<option value="" selected>Select Year</option>
											@foreach (range(2015, date('Y')) as $i) 
												<option value="{{ $i }}"
												@if(app('request')->input('year')=='' && date('Y')==$i)selected @endif
													@if (app('request')->input('year') && app('request')->input('year') == $i) selected @endif">{{ $i }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Month</label>
										<select name="month" class="single-select mb-3" aria-label="Default select example">
											<option value="" selected>Select Month</option>
											@foreach (all_months() as $month) 
												<option value="{{ $loop->iteration }}"
												@if(app('request')->input('month')=='' && date('F')==$month)selected @endif

													@if (app('request')->input('month') && app('request')->input('month') == $loop->iteration) selected @endif">{{ $month }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Location</label>
										<select name="location_id" class="single-select mb-3" aria-label="Default select example">
											<option value="" selected>Select Location</option>
											@foreach ($locations as $location)
												<option value="{{ $location->id }}"
													@if (app('request')->input('location_id') && app('request')->input('location_id') == $location->id) selected @endif">{{ ucWords($location->location) }}</option>
											@endforeach
	
	
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Company</label>
										<select name="company_id" class="single-select mb-3"
											aria-label="Default select example">
											<option value="" selected>Select Company</option>
											@foreach ($companies as $company)
												<option value="{{ $company->id }}"
													@if (app('request')->input('company_id') && app('request')->input('company_id') == $company->id) selected @endif">
													{{ ucWords($company->company_name) }}
												</option>
											@endforeach
	
	
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Select Employee</label>
										<select name="employee_id" class="single-select mb-3"
											aria-label="Default select example">
											<option value="" selected>Select Employee</option>
											@foreach ($employees as $employee)
												<option value="{{ $employee->id }}"
													@if (app('request')->input('employee_id') && app('request')->input('employee_id') == $employee->id) selected @endif>
													{{ ucWords($employee->employee_name) }}
													({{ $employee->Email }})
												</option>
											@endforeach
	
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
									<div class="table-responsive">
										<form action="">
											<div class="row">
												<div class="col-sm-12 col-md-6">
													<div class="dataTables_length" id="example_length"><label>Show entries
														<select
																name="paginate_length"  aria-controls="example"
																class="form-select form-select-sm paginate_length">
																<option @if(app('request')->input('paginate_length')==10) selected @endif value="10">10</option>
																<option @if(app('request')->input('paginate_length')==25) selected @endif value="25">25</option>
																<option @if(app('request')->input('paginate_length')==50) selected @endif value="50">50</option>
																<option @if(app('request')->input('paginate_length')==100) selected @endif value="100">100</option>
															</select>
														</label>
													</div>
												</div>
											</div>
										</form>
										<table  class="table table-striped table-bordered without_paginataion_table">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th>Job Title</th>
													<th>Date</th>
													<th>Location</th>  
													<th>Company</th>
													<th>Employee</th>
													
													<th>Pay/Hour</th>
													<th>Approx Pay</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($all_jobs as $jobs)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ Str::limit($jobs->job_title,20) }}</td>

													<td>{{ $jobs->date }}</td>
													<td>{{ $jobs->location_name }}</td>
													<td>{{ $jobs->company_name }}</td>
													<td>

														<div class="popover__wrapper">
															<p>
																{{ $jobs->employee_name }}
															</p><a href="#">
																<p class="popover__title">Job Information</p>
															</a>
			
															<div class="popover__content">
																<div class="modal-area">
																	<p>Job Title: {{ $jobs->job_title }}
																		<br>
																		Job Description: {{ $jobs->job_description }}
																		<br>
																		Start & End Date: {{ $jobs->job_start_date }} to
																		{{ $jobs->job_end_date }}
																		<br>
																		Expected Hours For Complition: {{ $jobs->expected_hour }}Hr
																		<br>
																		{{-- Expected Date & Time For Closing Job: 13-2-2023 12:09
																		<br> --}}
																	</p>
																</div>
															</div>
														</div>
													</td>
												
													<td>{{ $jobs->working_hours}}</td>
													<td>{{ $jobs->approx_pay}}</td>
													<td>
														<a href="{{route('generate-payroll',$jobs->id)}}" class="btn1 btn-outline-primary">
															<i class='fadeIn animated bx bx-file me-0'></i></a>
														
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
										{!! $all_jobs->withQueryString()->links('pagination.custom') !!}

									</div>


							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<!--end page wrapper -->
		@stop