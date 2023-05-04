@extends('layout')
@section('content')
   
   @include('paginatecss')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Assign Job / Task</h5>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('insert_assign_job') }}">
                                @csrf
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="inputFirstName"
                                        placeholder="Address">
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Location</label>
                                    <select name="location_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Location</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ ucWords($location->location) }}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Company</label>
                                    <select name="company_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ ucWords($company->company_name) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Employee</label>
                                    <select name="employee_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Employee</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ ucWords($employee->employee_name) }}
                                                ({{ $employee->Email }})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Payout Category</label>
                                    <select name="payout_category_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Payout Category</option>
                                        @foreach ($payout_category as $p_c)
                                            <option value="{{ $p_c->id }}">{{ ucWords($p_c->add_category) }}
                                              
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job Title</label>
                                    <input type="text" name="job_title" class="form-control" id="inputFirstName"
                                        placeholder="Job Title">
                                </div>



                                <div class="col-md-2">
                                    <label for="inputAddress" class="form-label">Job Description</label>
                                    <textarea name="job_description" class="form-control" id="inputAddress" placeholder="Job Description..." rows="1"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job Start Date</label>
                                    <input type="date" name="job_start_date" class="form-control" id="inputFirstName"
                                        placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job End Date</label>
                                    <input type="date" name="job_end_date" class="form-control" id="inputFirstName"
                                        placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Payrun Type</label>
                                    <select name="payrun_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Payrun Type</option>
                                        @foreach ($payrun as $payrun)
                                            <option value="{{ $payrun->id }}">{{ ucWords($payrun->add_payrun) }}
                                            </option>
                                        @endforeach
    
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Expected Hours For Completion</label>
                                    <input type="number" step="0.001" name="expected_hour" class="form-control"
                                        id="inputFirstName" placeholder="Expected Hours For Compleition">
                                </div>

                                <div class="col-md-2" style="margin-top: 6vh;">
                                    <button type="submit" class="btn btn-primary px-3">Submit</button>
                                </div>


                            </form>

                        </div>

                    </div>
                </div>
            </div>



            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->


            <!-- <h6 class="mb-0 text-uppercase">DataTable</h6> -->
            <hr />
            <div class="card">
                <div class="card-body">
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

                        <table class="table table-striped table-bordered without_paginataion_table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Company</th>
                                    <th>Employee</th>
                                    <th>Status</th>

                                    <th style="background-color:#ffffff;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_jobs as $jobs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
                                        <td>
                                            @if ($jobs->status == 1)
                                                <label class="badge bg-secondary" for="">Assigned</label>
                                            @elseif($jobs->status == 2)
                                                <label class="badge bg-primary" for="">Accepted</label>
                                            @elseif($jobs->status == 3)
                                                <label class="badge bg-success" for="">Completed</label>
                                            @elseif($jobs->status == 0)
                                                <label class="badge bg-danger" for="">Rejected</label>
                                                <button job_id="{{ $jobs->id }}"
                                                    location_id="{{ $jobs->location_id }}"
                                                    company_id="{{ $jobs->company_id }}"
                                                    employee_id="{{ $jobs->employee_id }}"
                                                    job_title="{{ $jobs->job_title }}"
                                                    job_description="{{ $jobs->job_description }}"
                                                    date="{{ $jobs->date }}" type="button"
                                                    class="badge bg-primary reassign_model" title="Reassign"><i
                                                        class="fadeIn animated bx bx-transfer"></i>
                                                    Reassign</button>
                                            @endif

                                        </td>
                                        <td style="background-color:#ffffff;">
                                            <a  @if ($jobs->status == 2 || $jobs->status == 3) href="#" @else href="{{ route('edit-assignjob', $jobs->id) }}" @endif  type="button"
                                                class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></a>
                                            <a  @if ($jobs->status == 2 || $jobs->status == 3) href="#" @else href="{{ route('delete-assignjob', $jobs->id) }}" @endif  type="button"
                                                class="btn1 btn-outline-danger"><i
                                                    class='fadeIn animated bx bx-trash me-0'></i></a>

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
    <!--end page wrapper -->

    @include('assign-job.reassignmodal')
@stop
