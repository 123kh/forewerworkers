@extends('layout')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @include('alerts')

        <div class="col-md-12">
            <div class="row">


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Add Workplace/Location </h5>
                            </div>
                            <hr>
                            <form class="row g-2" action="{{route('master.create_location')}}" method="post">
                                @csrf
                                <div class="col-md-5">
                                    <label for="inputFirstName" class="form-label">Enter
                                        Workplace/Location</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Enter Workplace/Location" name="location">
                                </div>

                                <div class="col-md-2" style="margin-top: 7vh;">
                                    <button type="submit" class="btn btn-primary px-3">Add</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">Add Categories </h5>
                            </div>
                            <hr>
                            <form class="row g-2" action="{{route('master.create_ctegory')}}" method="post">
                                @csrf
                                <div class="col-md-5">
                                    <label for="inputFirstName" class="form-label">Enter Category</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Enter Category" name="category">
                                </div>


                                <div class="col-md-2" style="margin-top: 6vh;">
                                    <button type="submit" class="btn btn-primary px-3">Add</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Added Workplace/Location</th>
                                        <!-- <th>Mobile Number</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loca as $locat)
                                        
                                 
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ucWords($locat->location)}}</td>
                                        <!-- <td>9579915551</td> -->
                                        <td>
                                            <a href="{{route('master.edit_location',$locat->id)}}"><button type="button" class="btn1 btn-outline-primary"><i
                                                    class='bx bx-edit-alt me-0'></i></button></a>
                                                    <a href="{{route('master.destroy_location',$locat->id)}}">
                                            <button type="button" class="btn1 btn-outline-danger"><i
                                                    class='bx bx-trash me-0'></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Added Categories</th>
                                        <!-- <th>Mobile Number</th> -->
                                        <th style="background-color:#fff;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cat as $cats)
                                        
                                  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ucWords($cats->add_category)}}</td>
                                        <!-- <td>9579915551</td> -->
                                        
                                        <td style="background-color:#fff;">
                                            <a href="{{route('master.edit_category',$cats->id)}}">
                                            <button type="button" class="btn1 btn-outline-primary"><i
                                                    class='bx bx-edit-alt me-0'></i></button></a>
                                                    <a href="{{route('destroycat',$cats->id)}}">
                                            <button type="button" class="btn1 btn-outline-danger"><i
                                                    class='bx bx-trash me-0'></i></button></a>
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