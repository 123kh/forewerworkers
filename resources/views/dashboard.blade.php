@extends('layout')
@section('content')

    @include('paginatecss')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Number of Employee</p>
                                    <h4 class="my-1">{{ count($employees) }}
                                    </h4>
                                </div>
                                <div class="text-primary ms-auto font-35"><i class='bx bx-user-circle'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Number of Companies </p>
                                    <h4 class="my-1">{{ count($companies) }}</h4>
                                </div>
                                <div class="text-warning ms-auto font-35"><i class='bx bx-building-house'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end page wrapper -->
            <!--start overlay-->
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
                        <ul class="nav nav-tabs nav-success" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if (!app('request')->input('tab')) active @endif @if (app('request')->input('tab') == 1) active @endif"
                                    data-bs-toggle="tab" href="#tab1" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Assign Jobs
                                        </div>
                                        <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $assign_Job->total() }}</span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if (app('request')->input('tab') == 2) active @endif" data-bs-toggle="tab"
                                    href="#tab2" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Accepted Jobs</div>
                                        <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $accepted_Job->total() }}</span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if (app('request')->input('tab') == 3) active @endif" data-bs-toggle="tab"
                                    href="#tab3" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Rejected Jobs</div>
                                        <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $rejected_Job->total() }}</span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>


                        <div class="tab-content py-3">
                            <form action="" class="row g-2">
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">From Date</label>
                                    <input name="from_date"
                                        value="@if (app('request')->input('from_date')) {{ app('request')->input('from_date') }} @endif"
                                        type="date" class="form-control" id="inputFirstName" placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">To Date</label>
                                    <input name="to_date"
                                        value="@if (app('request')->input('to_date')) {{ app('request')->input('to_date') }} @endif"
                                        type="date" class="form-control" id="inputFirstName" placeholder="Address">
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
                                    <button type="submit" class="btn btn-primary px-3">Submit</button>
                                </div>
                            </form>

                            <div class="tab-pane fade @if (!app('request')->input('tab')) show active @endif @if (app('request')->input('tab') == 1) show active @endif"
                                id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <form action="">
                                        <input type="hidden" name="tab" value="1">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example_length"><label>Show entries
                                                        <select name="paginate_length" aria-controls="example"
                                                            class="form-select form-select-sm paginate_length">
                                                            <option @if (app('request')->input('paginate_length') == 10) selected @endif
                                                                value="10">10</option>
                                                            <option @if (app('request')->input('paginate_length') == 25) selected @endif
                                                                value="25">25</option>
                                                            <option @if (app('request')->input('paginate_length') == 50) selected @endif
                                                                value="50">50</option>
                                                            <option @if (app('request')->input('paginate_length') == 100) selected @endif
                                                                value="100">100</option>
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
                                                <th>Employee Name</th>
                                                <!-- <th>Job Title</th>
                                                    <th>Job Description</th> -->
                                                <th>Expected Date & Time For Closing Job</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assign_Job as $jobs)
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
                                                                        Expected Hours For Complition:
                                                                        {{ $jobs->expected_hour }}Hr
                                                                        <br>
                                                                        {{-- Expected Date & Time For Closing Job: 13-2-2023 12:09
                                                                <br> --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>not define</td>
                                                    <td style="background-color:#ffffff;">
                                                        <a href="{{ route('edit-assignjob', $jobs->id) }}" type="button"
                                                            class="btn1 btn-outline-primary"><i
                                                                class='bx bx-edit-alt me-0'></i></a>
                                                        <a href="{{ route('delete-assignjob', $jobs->id) }}"
                                                            type="button" class="btn1 btn-outline-danger"><i
                                                                class='fadeIn animated bx bx-trash me-0'></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    {!! $assign_Job->withQueryString()->links('pagination.custom') !!}

                                </div>
                            </div>

                            <div class="tab-pane fade @if (app('request')->input('tab') == 2) show active @endif"
                                id="tab2" role="tabpanel">
                                <div class="table-responsive">
                                    <form action="">
                                        <input type="hidden" name="tab" value="2">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example_length"><label>Show entries
                                                        <select name="paginate_length" aria-controls="example"
                                                            class="form-select form-select-sm paginate_length">
                                                            <option @if (app('request')->input('paginate_length') == 10) selected @endif
                                                                value="10">10</option>
                                                            <option @if (app('request')->input('paginate_length') == 25) selected @endif
                                                                value="25">25</option>
                                                            <option @if (app('request')->input('paginate_length') == 50) selected @endif
                                                                value="50">50</option>
                                                            <option @if (app('request')->input('paginate_length') == 100) selected @endif
                                                                value="100">100</option>
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
                                                <!-- <th>Job Title</th>
                                                    <th>Job Description</th>
                                                    <th>Expected Date & Time For Closing Job</th> -->
                                                <th>TSH</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accepted_Job as $jobs)
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
                                                                        Expected Hours For Complition:
                                                                        {{ $jobs->expected_hour }}Hr
                                                                        <br>
                                                                        {{-- Expected Date & Time For Closing Job: 13-2-2023 12:09
                                                                <br> --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>1day 1hr</td>
                                                    <td>
                                                        <span class="badge bg-success">Accepted</span>
                                                        <br>
                                                        (13-2-2023 | 1.00)
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade @if (app('request')->input('tab') == 3) show active @endif"
                                id="tab3" role="tabpanel">
                                <div class="table-responsive">
                                    <form action="">
                                        <input type="hidden" name="tab" value="3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example_length"><label>Show entries
                                                        <select name="paginate_length" aria-controls="example"
                                                            class="form-select form-select-sm paginate_length">
                                                            <option @if (app('request')->input('paginate_length') == 10) selected @endif
                                                                value="10">10</option>
                                                            <option @if (app('request')->input('paginate_length') == 25) selected @endif
                                                                value="25">25</option>
                                                            <option @if (app('request')->input('paginate_length') == 50) selected @endif
                                                                value="50">50</option>
                                                            <option @if (app('request')->input('paginate_length') == 100) selected @endif
                                                                value="100">100</option>
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
                                                <!-- <th>Job Title</th>
                                                    <th>Job Description</th>
                                                    <th>Expected Date & Time For Closing Job</th> -->
                                                <th>TSH</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rejected_Job as $jobs)
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
                                                                        Expected Hours For Complition:
                                                                        {{ $jobs->expected_hour }}Hr
                                                                        <br>
                                                                        {{-- Expected Date & Time For Closing Job: 13-2-2023 12:09
                                                                <br> --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>1day 1hr</td>
                                                    <td>
                                                        <span class="badge bg-danger">Rejected</span>
                                                        <br>(13-2-2023 | 1.00)

                                                    </td>
                                                    <td>
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
                                                        <!-- <button type="button" class="btn1 btn-outline-primary"></button> -->
                                                    </td>
                                                </tr>
                                            @endforeach

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

    @include('assign-job.reassignmodal')

@stop
