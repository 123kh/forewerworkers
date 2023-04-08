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
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Number of Employee</p>
                                <h4 class="my-1">100</h4>
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
                                <h4 class="my-1">80</h4>
                            </div>
                            <div class="text-warning ms-auto font-35"><i class='bx bx-comment-detail'></i>
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#successhome" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                    </div> -->
                                    <div class="tab-title">Assign Jobs
                                        <!-- <div class="col">
                                            <div class="position-relative bg-primary me-sm-5"> 
                                                
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    +22 <span class="visually-hidden"></span>
                                                </span>
                                            </div>
                                        </div> -->
                                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">22</span> -->

                                    </div>
                                    <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">23</span>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#successprofile" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                    </div> -->
                                    <div class="tab-title">Accepted Jobs</div>
                                    <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">27</span>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#successcontact" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                    </div> -->
                                    <div class="tab-title">Rejected Jobs</div>
                                    <span type="" class=" position-relative me-lg-5" style="margin-left:2.4vh;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">29</span>
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
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
                                <button type="submit" class="btn btn-primary px-3" >Submit</button>
                            </div>
                        </form>
                        
                        <div class="tab-pane fade show active" id="successhome" role="tabpanel">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered">
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
                                                
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
                                                </div>
                                              </div></td>
                                            <!-- <td>Snow Clean</td>
                                            <td>Snow Clean</td> -->
                                            <td>13-2-2023  12:09</td>
                                            
                                            <td>
                                                <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
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
                                                
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
                                                </div>
                                              </div></td>
                                            <!-- <td>Snow Clean</td>
                                            <td>Snow Clean</td> -->
                                            <td>13-2-2023  12:09</td>
                                            
                                            <td>
                                                <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>12-2-2023</td>
                                            <td>Canada</td>
                                            <td>Workplace</td>
                                            <td><div class="popup-container">
                                                <span class="popup-btn">Lorem</span>
                                                <div class="popup-content">
                                                  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
                                                Start & End Dt: 12-3-2023 to 13-2-2023<br>
                                                
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
                                                </div>
                                              </div></td>
                                            <!-- <td>Snow Clean</td>
                                            <td>Snow Clean</td> -->
                                            <td>13-2-2023  12:09</td>
                                            
                                            <td>
                                                <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="successprofile" role="tabpanel">
                            <div class="table-responsive">
                                <table id="example3" class="table table-striped table-bordered">
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
                                        <tr>
                                            <td>1</td>
                                            <td>12-2-2023</td>
                                            <td>Canada</td>
                                            <td>Workplace</td>
                                            <td><div class="popup-container">
                                                <span class="popup-btn">Lorem</span>
                                                <div class="popup-content">
                                                  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
                                                <!-- Start & End Dt: 12-3-2023 to 13-2-2023<br> -->
                                                <!-- Expected Hours For Complition: 3Hr <br> -->
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
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
                                        <tr>
                                            <td>2</td>
                                            <td>12-2-2023</td>
                                            <td>Canada</td>
                                            <td>Workplace</td>
                                            <td><div class="popup-container">
                                                <span class="popup-btn">Lorem</span>
                                                <div class="popup-content">
                                                  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
                                                <!-- Start & End Dt: 12-3-2023 to 13-2-2023<br> -->
                                                <!-- Expected Hours For Complition: 3Hr <br> -->
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="successcontact" role="tabpanel">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered">
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
                                        <tr>
                                            <td>1</td>
                                            <td>12-2-2023</td>
                                            <td>Canada</td>
                                            <td>Workplace</td>
                                            <td><div class="popup-container">
                                                <span class="popup-btn">Lorem</span>
                                                <div class="popup-content">
                                                  <p>Job Title: Snow Clean <br>Job Description: Snow Snow<br>
                                                <!-- Start & End Dt: 12-3-2023 to 13-2-2023<br> -->
                                                <!-- Expected Hours For Complition: 3Hr <br> -->
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
                                                </div>
                                              </div>
                                            </td>
                                            
                                            <td>1day 1hr</td>
                                            <td>
                                                <span class="badge bg-danger">Rejected</span>
                                                <br>(13-2-2023 | 1.00)
                                                
                                            </td>
                                            <td>
                                                <button type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal" data-bs-toggle="popover" title="Reassign" data-bs-content="And here's some amazing content. It's very engaging. Right?"><i class="fadeIn animated bx bx-transfer"></i> Reassign</button>
                                                <!-- <button type="button" class="btn1 btn-outline-primary"></button> -->
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
                                                <!-- Start & End Dt: 12-3-2023 to 13-2-2023<br> -->
                                                <!-- Expected Hours For Complition: 3Hr <br> -->
                                                Expected Date & Time For Closing Job: 13-2-2023 12:09<br></p>
                                                </div>
                                              </div>
                                            </td>
                                            
                                            <td>1day 1hr</td>
                                            <td>
                                                <span class="badge bg-danger">Rejected</span>
                                                <br>(13-2-2023 | 1.00)
                                                
                                            </td>
                                            <td>
                                                <button type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal" data-bs-toggle="popover" title="Reassign" data-bs-content="And here's some amazing content. It's very engaging. Right?"><i class="fadeIn animated bx bx-transfer"></i> Reassign</button>
                                                <!-- <button type="button" class="btn1 btn-outline-primary"></button> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col">
                            <!-- Button trigger modal -->
                        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reassign Job</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">	
                                            <form class="row g-2">	
                                        
                                            <div class="col-md-3">
                                                <label for="inputFirstName" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="inputFirstName" placeholder="Address"> 
                                            </div> 
                                            <div class="col-md-3">
                                                <label for="inputFirstName" class="form-label">Select Location</label>
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>ABC</option>
                                                    <option value="1">PQRS</option>
                                                    <option value="2">MNPIO</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputFirstName" class="form-label">Select Company</label>
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>ABC</option>
                                                    <option value="1">PQRS</option>
                                                    <option value="2">MNPIO</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputFirstName" class="form-label">Select Employee</label>
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>ABC</option>
                                                    <option value="1">PQRS</option>
                                                    <option value="2">MNPIO</option>
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="inputFirstName" class="form-label">Job Title</label>
                                                <input type="text" class="form-control" id="inputFirstName" placeholder="Job Title"> 
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Job Description</label>
                                                <textarea class="form-control" id="inputAddress" placeholder="Job Description..." rows="3"></textarea>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label for="inputFirstName" class="form-label">Expected  Date & Time For Closing Job</label>
                                                <input type="date" class="form-control" id="inputFirstName" placeholder="ID Proof"> 
                                            </div>
                                        
                                        
                                        </form>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Reassign</button>
                                        </div>
                                    </div>
                                </div>
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