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

                                    <h5 class="mb-0 text-primary">Payout Type</h5>
                                </div>
                                <hr>
                                <form class="row g-2" action="{{route('master.create_payout')}}" method="post">
                                    @csrf
                                    <div class="col-md-5">
                                        <label for="inputFirstName" class="form-label">
                                             Add Payout Type</label>
                                        <input type=" " class="form-control" id="inputFirstName"
                                            placeholder="Add Payout Type" name="add_payout">
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

                                    <h5 class="mb-0 text-primary">Payrun Type</h5>
                                </div>
                                <hr>
                                <form class="row g-2"  action="{{route('master.create_payrun')}}" method="post">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="inputFirstName" class="form-label">Add Payrun Type</label>
                                        <input type="text" class="form-control" id="inputFirstName"
                                            placeholder="Add Payrun Type" name="add_payrun">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputFirstName" class="form-label">Number of Days</label>
                                        <input type="number" class="form-control" id="inputFirstName"
                                            placeholder="Number of Days" name="no_of_days">
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
                                            <th> Added Payout Type</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payout as $pyo)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$pyo->add_payout}}</td>
                                        
                                            <td >
                                                <a href="{{route('master.edit_payout',$pyo->id)}}">
                                                <button type="button" class="btn1 btn-outline-primary"><i
                                                        class='bx bx-edit-alt me-0'></i></button></a>
                                               <a href="{{route('destroy_payout',$pyo->id)}}">
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
                                            <th>Added Payrun</th>
                                            <th>Number of Days</th>
                                            <th style="background-color: #fff;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payrun as $pyr)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$pyr->add_payrun}}</td>
                                            <td>{{$pyr->no_of_days}}</td>
                                            <td style="background-color: #fff;">
                                                <a href="{{route('master.edit_payrun',$pyr->id)}}">
                                                <button type="button" class="btn1 btn-outline-primary"><i
                                                        class='bx bx-edit-alt me-0'></i></button></a>
                                                        <a href="{{route('master.destroy_payrun',$pyr->id)}}">
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

@stop
