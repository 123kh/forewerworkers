<div class="col">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleLargeModal"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reassign Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form  action="{{route('reassign_job')}}" method="post">
                    @csrf
                    <input type="hidden" id="model_id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label  class="form-label">Date</label>
                            <input type="date" name="date" id="modal_date" class="form-control"
                                id="inputFirstName" placeholder="Address">
                        </div>
                       
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">Location</label>
                            <input type="text" name="location_id" class="form-control" id="modal_location_id"
                            placeholder="Enter Location">
                        </div>



                        <div class="col-md-3">
                            <label  class="form-label">Select
                                Company</label>
                            <select name="company_id" id="modal_company_id" class="single-select3 mb-3"
                                aria-label="Default select example">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ ucWords($company->company_name) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label  class="form-label">Select
                                Employee</label>
                            <select name="employee_id" id="modal_employee_id" class="single-select4 mb-3"
                                aria-label="Default select example">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ ucWords($employee->employee_name) }}
                                        ({{ $employee->Email }})
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label  class="form-label">Job Title</label>
                            <input type="text" id="modal_job_title" name="job_title" class="form-control"
                                id="inputFirstName" placeholder="Job Title">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label">Job
                                Description</label>
                            <textarea name="job_description" id="modal_job_description" class="form-control" id="inputAddress" placeholder="Job Description..."
                                rows="1"></textarea>
                        </div>

                        <div class="col-md-5">
                            <label  class="form-label">Expected Date &
                                Time For Closing Job</label>
                            <input type="date" class="form-control" id="inputFirstName"
                                placeholder="ID Proof">
                        </div>
                    </div>

                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Reassign</button>
                </div> 
             </form>
            </div>
        </div>
    </div>
</div>