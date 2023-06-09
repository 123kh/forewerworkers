@extends('layout')
@section('content')


    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Company Registration </h5>
                                {{-- 
                            {{testfunction()}} --}}
                            </div>
                            <hr>
                            <form class="row g-2" action="{{ route('master.create_company') }}" method="post">
                                @csrf
                                <!-- <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Date </label>
                                    <input type="date" class="form-control" id="inputFirstName" placeholder="Market Open Time">
                                </div> -->

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Company Name" name="company_name">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label"> Transit Number </label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Transit Number" name="transit_number">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label"> Institution Number </label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Institution Number" name="institution_number">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label"> Account Number </label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Account Number" name="account_number">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Address"
                                        name="address">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">ZIP</label>
                                    <input type="number" class="form-control" id="inputFirstName" placeholder="ZIP"
                                        name="zip">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Contact Person" name="contact_person">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Email"
                                        name="email">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Contact Number" name="contact_number">
                                </div>
                                <!-- <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Payrun</label>
                                    <input type="date" class="form-control" id="inputFirstName" placeholder="Payrun">
                                </div>
                                <div class="col-md-1" style="margin-top: 6vh;">
                                    <button type="submit" class="btn btn-primary px-3">Add</button>
                                </div> -->

                                <!-- <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Starting Number</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Starting Number">
                                </div> -->
                                <hr>
                                <div class="card-title d-flex align-items-center">

                                    <h5 class="mb-0 text-primary">Payout Settings<h5>
                                </div>
                                <!-- <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Location</label>
                                    <select class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Pune</option>
                                        <option value="1">Nagpur</option>
                                        <option value="2">Amravati</option>
                                        
                                    </select>
                                </div> -->
                                <!-- <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Add Location</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Add Location">
                                </div> -->
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Categories</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="category">
                                        <option value="">Select</option>
                                        @foreach ($cat as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ ucWords($cat->add_category) }} </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Straight pay hours</label>
                                    <input type="number" step="0.001" class="form-control total_hr" id="straight"
                                        placeholder="Straight Pay hours">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Overtime 1.5 pay hours</label>
                                    <input type="number" step="0.001" class="form-control total_hr" id="overtime1"
                                        placeholder="Overtime 1.5 pay hours">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Overtime 2.0 pay hours</label>
                                    <input type="number" step="0.001" class="form-control total_hr" id="overtime2"
                                        placeholder="Overtime 2.0 pay hours">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Night pay hours</label>
                                    <input type="number" step="0.001" class="form-control total_hr" id="nighthours"
                                        placeholder="Night hours pay">
                                </div>
                                <div class="col-md-2" style="margin-top: 6vh;">
                                    <button type="button" class="btn btn-primary px-3 add-row">ADD</button>
                                </div>
                                <div class="row d-none" id="total_hr_error">
                                    <p class="error">Total hours should not exceed 24 hours.
                                    <p>
                                </div>
                                <div class="row d-none" id="payout_category_error">
                                    <p class="error">The same payout category can not be added again.
                                    <p>
                                </div>

                                <!-- <div class="row"> -->
                                <div class="col-xl-12 mx-auto">

                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        {{-- <th scope="col">Sr.No.</th> --}}
                                                        <!-- <th scope="col">Selected Location</th> -->
                                                        <th scope="col">Selected Categories</th>
                                                        <th scope="col">Straight pay hours</th>
                                                        <th scope="col">Overtime 1.5 pay hours</th>
                                                        <th scope="col">Overtime 2.0 pay hours</th>
                                                        <th scope="col">Night hours pay hours</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add_more">

                                                    {{-- <tr>
                                                        <th scope="row">2</th>
                                                        <!-- <td>Pune</td> -->
                                                        <td>10</td>
                                                        <td>20</td>
                                                        <td>20</td>
                                                        <td>20</td>
                                                        <td>
                                                            {{-- <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button> --}}
                                                    {{-- <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- </div> -->
                                <!-- <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Only Straight hours applicable</label>
                                    </div>
                                </div> -->

                                <div class="col-md-12" style="margin-top: 5px;text-align: right;">
                                    <button type="submit" class="btn btn-primary px-3">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Company Name</th>
                                    <th>Transit Number</th>
                                    <th>Institution Number</th>
                                    <th>Account Number</th>
                                    <th>Address</th>
                                    <th>ZIP</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th style="background-color:#ffffff;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->transit_number }}</td>
                                        <td>{{ $company->institution_number }}</td>
                                        <td>{{ $company->account_number }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->zip }}</td>
                                        <td>{{ $company->contact_person }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->contact_number }}</td>

                                        <td style="background-color:#ffffff;">
                                            <button type="button" class="btn1 btn-outline-primary"><i
                                                    class='fadeIn animated bx bx-message-add' data-bs-toggle="modal"
                                                    data-bs-target="#exampleLargeModal"></i></button>
                                            <button type="button" class="btn1 btn-outline-primary"><i
                                                    class='bx bx-edit-alt me-0'></i></button>
                                            <button type="button" class="btn1 btn-outline-danger"><i
                                                    class='bx bx-trash me-0'></i></button>
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



    <!--end page wrapper -->

@stop
@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.total_hr', function() {
                let total_hr = 0;
                $(".total_hr").each(function(key, value) {
                    if (!isNaN(parseFloat($(this).val()))) {
                        total_hr = parseFloat(Math.abs(total_hr)) + parseFloat(Math.abs($(this)
                        .val()));
                    }
                })

                if (total_hr > 24) {
                    $(".add-row").prop("disabled", true);
                    $("#total_hr_error").removeClass('d-none');
                } else {
                    $(".add-row").prop("disabled", false);
                    $("#total_hr_error").addClass('d-none');
                }
            })

            let payout_categories = [];
            $(".add-row").click(function() {
                    if (payout_categories.includes($('#category').val())) {
                        $("#payout_category_error").removeClass('d-none');
                    } else {
                        $("#payout_category_error").addClass('d-none');
                        payout_categories.push($('#category').val());
                        var category = $('#category option:selected').text().trim().replace(/\d+/g, "");
                        var straight = $('#straight').val();
                        var overtime1 = $('#overtime1').val();
                        var overtime2 = $('#overtime2').val();
                        var nighthours = $('#nighthours').val();

                        var markup =
                            '<tr><td><input type="hidden" value="' + $('#category').val() +
                            '" name="select_categories[]" ><input type="text"  style="border:none; width: 100%;" value="' +
                            category +
                            '"></td><td><input type="text" name="straight_pay_hours[]" required="" style="border:none; width: 100%;" value="' +
                            straight +
                            '"></td><td><input type="text" name="overtime_hours1[]" required="" style="border:none; width: 100%;" value="' +
                            overtime1 +
                            '"></td><td><input type="text" name="overtime_hours2[]" style="border:none; width: 100%;" value="' +
                            overtime2 +
                            '"></td><td><input type="text" name="night_hours_pay[]" required="" style="border:none; width: 100%" value="' +
                            nighthours +
                            '"></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';

                        $(".add_more").append(markup);
                        $('#category').val('');
                        $('#straight').val('');
                        $('#overtime1').val('');
                        $('#overtime2').val('');
                        $('#nighthours').val('');
                    }
                }



            )
            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                var mpsqnty = $(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                var ptrqnty = $(this).parents("tr").find('input[name="ptrqnty[]"]').val()

                var grandtotal1 = $('#grandtotal1').val();
                var grandtotal2 = $('#grandtotal2').val();

                var total1 = parseFloat(grandtotal1) - parseFloat(mpsqnty)
                var total2 = parseFloat(grandtotal2) - parseFloat(ptrqnty)
                $('#grandtotal1').val(total1);
                $('#grandtotal2').val(total2);

                $(this).parents("tr").remove();

                // final_calculations();


            });
        })
    </script>
@stop
