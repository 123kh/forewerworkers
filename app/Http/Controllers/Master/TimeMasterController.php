<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\TimeMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeMasterController extends Controller
{
    public function index()
    {
        $data = TimeMaster::first();
        return view('Master.time-master', compact('data'));
    }

    public function update(Request $request)
    {
        // Assuming you have one configuration record with ID 1

        $validator = Validator::make($request->all(), [
            'day_start_time' => 'required',
            'day_end_time' => 'required',
            'night_start_time' => 'required',
            'night_end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }

        $configuration = TimeMaster::first();
        $configuration->update($request->all());

        return redirect()->back()->with('success', 'Time Setting updated successfully');
    }
}
