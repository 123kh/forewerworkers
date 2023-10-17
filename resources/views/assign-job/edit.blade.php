@extends('layout')
@section('content')
    <style>
        /* Base styling*/

        /* Popover styling */

        a {
            text-decoration: none;
        }

        .popover__title {
            font-size: 12px;
            text-decoration: none;
            color: #0d6efd;
            text-align: center;
        }

        .popover__wrapper {
            position: relative;
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
            transform: translate(0, 0px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }


        .modal {
            background: rgba(255, 255, 255, 0.7);
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            bottom: 0px;
            transition: all .5s ease-in-out;
            opacity: 0;
            z-index: -1;
        }
    </style>
<style>
    .paginate_button {
    border-color: #0d6efd;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 5px;
    background-color: #969696;


}	.paginate_button.current.active {
    background-color: #0d6efd;
    color: #ffffff;
}
.paginate_button.disabled {
    border-color: #dedede;
    color: #ffffff;
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

                                <h5 class="mb-0 text-primary">Edit Assign Job / Task</h5>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('update_assign_job') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit_job->id }}">

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Date</label>
                                    <input type="date" value="{{ $edit_job->date }}" name="date" class="form-control"
                                        id="inputFirstName" placeholder="Address">
                                </div>


                                 <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Location</label>
                                    <input type="text" name="location_id" value="{{ $edit_job->location_id }}" class="form-control" id="location"
                                    placeholder="Enter Location">
                                </div>



                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Company</label>
                                    <select name="company_id" class="form-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Company</option>
                                        @foreach ($company as $company)
                                            <option value="{{ $company->id }}"
                                                @if ($company->id == $edit_job->company_id) selected @endif>
                                                {{ ucWords($company->company_name) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Employee</label>
                                    <select name="employee_id" class="form-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Employee</option>
                                        @foreach ($employee as $employee)
                                            <option value="{{ $employee->id }}"
                                                @if ($employee->id == $edit_job->employee_id) selected @endif>
                                                {{ ucWords($employee->employee_name) }}
                                                ({{ $employee->Email }})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job Title</label>
                                    <input type="text" value="{{ $edit_job->job_title }}" name="job_title"
                                        class="form-control" id="inputFirstName" placeholder="Job Title">
                                </div>

                                <div class="col-md-2">
                                    <label for="inputAddress" class="form-label">Job Description</label>
                                    <textarea value="{{ $edit_job->job_description }}" name="job_description" class="form-control" id="inputAddress"
                                        placeholder="Job Description..." rows="2">{{ $edit_job->job_description }}</textarea>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job Start Date</label>
                                    <input type="date" value="{{ $edit_job->job_start_date }}" name="job_start_date"
                                        class="form-control" id="inputFirstName" placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job Start Time</label>
                                    <input type="time" name="job_start_time"  value="{{ $edit_job->job_start_time }}" class="form-control" 
                                        >
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Job End Date</label>
                                    <input type="date" value="{{ $edit_job->job_end_date }}" name="job_end_date"
                                        class="form-control" id="inputFirstName" placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Payrun Type</label>
                                    <select name="payrun_id" class="single-select mb-3" aria-label="Default select example">
                                        <option value="" selected>Select Payrun Type</option>
                                        @foreach ($payrun as $payrun)
                                            <option value="{{ $payrun->id }}"
                                                @if ($payrun->id == $edit_job->payrun_id) selected @endif>{{ ucWords($payrun->add_payrun) }}
                                            </option>
                                        @endforeach
    
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Expected Hours For Completion</label>
                                    <input type="number" step="0.001" value="{{ $edit_job->expected_hour }}"
                                        name="expected_hour" class="form-control" id="inputFirstName"
                                        placeholder="Expected Hours For Compleition">
                                </div>

                                <div class="col-md-2" style="margin-top: 6vh;">
                                    <button type="submit" class="btn btn-primary px-3">Update</button>
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
                                        <td>{{ $jobs->location_id }}</td>
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
@stop
