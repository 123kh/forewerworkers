<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Companyres;
use App\Models\Master\Employee;
use App\Models\Master\Location;
use DB;
use Carbon\CarbonInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class AssignJobModel extends Model
{

    use HasFactory;
    protected $fillable = [
        'date',
        'location_id',
        'company_id',
        'employee_id',
        'job_title',
        'job_description',
        'job_start_date',
        'job_start_time',
        'job_end_date',
        'payrun_id',
        'expected_hour',
        'check_in_time',
        'check_out_time',
        'status',
        'timesheet',
        'payout_category_id'
    ];

    public function scopeCompletedJob($query)
    {
        return $query->where('status', '3');
    }

    public function getCompanyNameAttribute()
    {
        return ucWords(Companyres::find($this->company_id)->company_name ?? '');
    }

    public function getLocationNameAttribute()
    {
        return ucWords(Location::find($this->location_id)->location ?? '') ;
    }

    public function getEmployeeNameAttribute()
    {
        return ucWords(Employee::find($this->employee_id)->employee_name ?? '');
    }
    public function getEmployeeInfoAttribute()
    {
        return Employee::find($this->employee_id);
    }

    public function getWorkingHoursAttribute()
    {
        $total_work_time = 0;
        if ($this->status == '3' && $this->check_in_time && $this->check_out_time) {
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_time);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_out_time);
            $options = [
                'join' => ', ',
                'parts' => 2,
                'syntax' => CarbonInterface::DIFF_ABSOLUTE,
            ];
            $total_work_time = $from->diffForHumans($to, $options);
        }
        return $total_work_time;
    }

    public function getApproxPay2Attribute()
    {
        $total_pay = 0;
        $total_hr_min = 0;
        if ($this->status == '3' && $this->check_in_time && $this->check_out_time) {
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_time);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_out_time);
            $diff_in_minutes = $from->diffInMinutes($to);
            //$total_hr = round($diff_in_minutes / 60);
            $total_hr_min = round($diff_in_minutes);

            $employee_payout = DB::table('employeesappend')->where('select_categories', $this->payout_category_id)->where('employee_id', $this->employee_id)->orderby('id', 'asc')->first();
            $company_payout = DB::table('companysregsappend')->where('select_categories', $this->payout_category_id)->where('company_id', $this->company_id)->orderby('id', 'asc')->first();
          
            //if employee work for strainght hr . total pay will be base on amount of straight hr.
            //pay out by first pay out consideration
if($employee_payout && $company_payout){

            if ($this->employee_info->Only_Straight_hours == '1') {
                $total_pay = ($employee_payout->straight_pay_hours / 60) * $total_hr_min;
            } else {
                if ($total_hr_min > ($company_payout->straight_pay_hours * 60)) {
                    $straight_hr_pay = $company_payout->straight_pay_hours * $employee_payout->straight_pay_hours;
                    $total_hr_min = $total_hr_min - ($company_payout->straight_pay_hours * 60);
                    $total_pay = $total_pay + $straight_hr_pay;

                    if ($total_hr_min > ($company_payout->overtime_hours1 * 60)) {
                        $overtime_hours1_pay = $company_payout->overtime_hours1 * $employee_payout->overtime_hours1;
                        $total_hr_min = $total_hr_min - ($company_payout->overtime_hours1 * 60);
                        $total_pay = $total_pay + $overtime_hours1_pay;


                        if ($total_hr_min > ($company_payout->overtime_hours2 * 60)) {
                            $overtime_hours2_pay = $company_payout->overtime_hours2 * $employee_payout->overtime_hours2;
                            $total_hr_min = $total_hr_min - ($company_payout->overtime_hours2 * 60);
                            $total_pay = $total_pay + $overtime_hours2_pay;


                            if ($total_hr_min > ($company_payout->night_hours_pay * 60)) {
                                $night_hours_pay = $company_payout->night_hours_pay * $employee_payout->night_hours_pay;
                                $total_hr_min = $total_hr_min - ($company_payout->night_hours_pay * 60);
                                $total_pay = $total_pay + $night_hours_pay;
                            } else {
                                $night_hours_pay = $total_hr_min * ($employee_payout->night_hours_pay / 60);
                                $total_pay = $total_pay + $night_hours_pay;
                            }
                        } else {
                            $overtime_hours2_pay = $total_hr_min * ($employee_payout->overtime_hours2 / 60);
                            $total_pay = $total_pay + $overtime_hours2_pay;
                        }
                    } else {
                        $overtime_hours1_pay = $total_hr_min * ($employee_payout->overtime_hours1 / 60);
                        $total_pay = $total_pay + $overtime_hours1_pay;
                    }
                } else {
                    $straight_hr_pay = $total_hr_min * ($employee_payout->straight_pay_hours / 60);
                    $total_pay = $total_pay + $straight_hr_pay;
                }
}

            }
        }
        return round($total_pay);
    }

    public function getApproxPayAttribute()
    {
        $total_pay = 0;
        $total_hr_min = 0;
        if ($this->status == '3' && $this->check_in_time && $this->check_out_time) {
        $check_in_time = \Carbon\Carbon::parse($this->check_in_time)->format('H:i:s');
        $check_out_time = \Carbon\Carbon::parse($this->check_out_time)->format('H:i:s');
        

        $time = JobAssignedTimeMaster::where('job_id', $this->id)->first();

        // Define the day and night time slots
        $dayStartTime = \Carbon\Carbon::createFromFormat('H:i:s', $time->day_start_time);
        $dayEndTime = \Carbon\Carbon::createFromFormat('H:i:s', $time->day_end_time);
        $checkin = \Carbon\Carbon::createFromFormat('H:i:s', $check_in_time);
        $checkout = \Carbon\Carbon::createFromFormat('H:i:s', $check_out_time);

        // Calculate the time duration of the day
        $day_duration = $dayStartTime->diffInHours($dayEndTime);

        if ($dayStartTime <= $checkin && $checkin <= $dayEndTime && $dayStartTime <= $checkout && $checkout <= $dayEndTime) {
            // Calculate the hours worked
            $hours_worked = $checkout->diffInHours($checkin);

            dump($hours_worked);
        } else {
            dump(12);
        }
        $nightStartTime = \Carbon\Carbon::createFromFormat('H:i:s', $time->night_start_time);
        $nightEndTime = \Carbon\Carbon::createFromFormat('H:i:s', $time->night_end_time);

        // Initialize counters for day and night slots
       
        dump($dayStartTime);
        dump($dayEndTime);

        dump($check_in_time);
        dump($check_out_time);

            $diff_in_minutes = $check_in_time->diffInMinutes($check_out_time);
            $total_hr = round($diff_in_minutes / 60);
            return $total_hr;

            $total_hr_min = round($diff_in_minutes);
            return;

            $employee_payout = DB::table('employeesappend')->where('select_categories', $this->payout_category_id)->where('employee_id', $this->employee_id)->orderby('id', 'asc')->first();
            $company_payout = DB::table('companysregsappend')->where('select_categories', $this->payout_category_id)->where('company_id', $this->company_id)->orderby('id', 'asc')->first();
          
            //if employee work for strainght hr . total pay will be base on amount of straight hr.
            //pay out by first pay out consideration
if($employee_payout && $company_payout){

            if ($this->employee_info->Only_Straight_hours == '1') {
                $total_pay = ($employee_payout->straight_pay_hours / 60) * $total_hr_min;
            } else {
                if ($total_hr_min > ($company_payout->straight_pay_hours * 60)) {
                    $straight_hr_pay = $company_payout->straight_pay_hours * $employee_payout->straight_pay_hours;
                    $total_hr_min = $total_hr_min - ($company_payout->straight_pay_hours * 60);
                    $total_pay = $total_pay + $straight_hr_pay;

                    if ($total_hr_min > ($company_payout->overtime_hours1 * 60)) {
                        $overtime_hours1_pay = $company_payout->overtime_hours1 * $employee_payout->overtime_hours1;
                        $total_hr_min = $total_hr_min - ($company_payout->overtime_hours1 * 60);
                        $total_pay = $total_pay + $overtime_hours1_pay;


                        if ($total_hr_min > ($company_payout->overtime_hours2 * 60)) {
                            $overtime_hours2_pay = $company_payout->overtime_hours2 * $employee_payout->overtime_hours2;
                            $total_hr_min = $total_hr_min - ($company_payout->overtime_hours2 * 60);
                            $total_pay = $total_pay + $overtime_hours2_pay;


                            if ($total_hr_min > ($company_payout->night_hours_pay * 60)) {
                                $night_hours_pay = $company_payout->night_hours_pay * $employee_payout->night_hours_pay;
                                $total_hr_min = $total_hr_min - ($company_payout->night_hours_pay * 60);
                                $total_pay = $total_pay + $night_hours_pay;
                            } else {
                                $night_hours_pay = $total_hr_min * ($employee_payout->night_hours_pay / 60);
                                $total_pay = $total_pay + $night_hours_pay;
                            }
                        } else {
                            $overtime_hours2_pay = $total_hr_min * ($employee_payout->overtime_hours2 / 60);
                            $total_pay = $total_pay + $overtime_hours2_pay;
                        }
                    } else {
                        $overtime_hours1_pay = $total_hr_min * ($employee_payout->overtime_hours1 / 60);
                        $total_pay = $total_pay + $overtime_hours1_pay;
                    }
                } else {
                    $straight_hr_pay = $total_hr_min * ($employee_payout->straight_pay_hours / 60);
                    $total_pay = $total_pay + $straight_hr_pay;
                }
}

            }
        }
        return round($total_pay);
    }

    //payroll hour calculation by month
    public function getMonthWorkingHoursAttribute()
    {
        $date = date('m', strtotime($this->date));
        $get_employee_month_job = AssignJobModel::where('status', '3')->where('employee_id', $this->employee_id)
            ->whereMonth('date', '=', $date)
            ->whereYear('date', '=', date('Y'))
            ->select('check_in_time', 'check_out_time', 'status')->get();
        $total_work_time = 0;
        foreach ($get_employee_month_job as $job) {
            if ($job->status == '3' && $job->check_in_time && $job->check_out_time) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_in_time);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_out_time);
                $totalDuration = $to->diffInMinutes($from);
                $total_work_time = $total_work_time + $totalDuration;
            }
        }
        $options = [
            'join' => ', ',
            'parts' => 3,
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
        ];
        return $duration = Carbon::now()->addMinutes($total_work_time)->diffForHumans($options);
    }

    public function getMonthApproxPayAttribute()
    {
        $month = date('m', strtotime($this->date));
        $employee_id = $this->employee_id;
        $total_pay = $this->getMonthWiseApproxPayAttribute($month, $employee_id);
        return $total_pay;
    }

    public function getPreviousMonthApproxPayAttribute()
    {
        $month = date('m', strtotime($this->date));
        $total_pay = 0;
        $overtime_hours1_pay = 0;
        $overtime_hours2_pay = 0;
        $night_hours_pay = 0;
        $straight_pay = 0;
        $payout = [];
        for ($i = $month; $i >= 1; $i--) {
            $employee_id = $this->employee_id;
            $first = $this->getMonthWiseApproxPayAttribute($i, $employee_id);
            $first = array($first['payout']);

            if (isset($first[0]['straight_pay'])) {
                $straight_pay += $first[0]['straight_pay'];
            }
            if (isset($first[0]['total_pay'])) {
                $total_pay += $first[0]['total_pay'];
            }
            if (isset($first[0]['overtime_hours1_pay'])) {
                $overtime_hours1_pay += $first[0]['overtime_hours1_pay'];
            }
            if (isset($first[0]['overtime_hours2_pay'])) {
                $overtime_hours2_pay += $first[0]['overtime_hours2_pay'];
            }
            if (isset($first[0]['night_hours_pay'])) {
                $night_hours_pay += $first[0]['night_hours_pay'];
            }
        }

        $payout[] = ['straight_pay' => $straight_pay];
        $payout[] = ['overtime_hours1_pay' => $overtime_hours1_pay];
        $payout[] = ['overtime_hours2_pay' => $overtime_hours2_pay];
        $payout[] = ['night_hours_pay' => $night_hours_pay];
        $payout[] = ['total_pay' => $total_pay];

        $payout = collect($payout)->flatMap(function ($item) {
            return $item;
        })->toArray();

        return $payout;
    }

    public function getMonthWiseApproxPayAttribute($month, $employee_id)
    {

        $get_employee_month_job = AssignJobModel::where('status', '3')->where('employee_id', $employee_id)
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', date('Y'))
            ->select('id', 'employee_id', 'company_id', 'payout_category_id', 'check_in_time', 'check_out_time', 'status')
            ->get();
        // echo json_encode($get_employee_month_job );
        // exit();
        $total_pay = 0;
        $total_hr_min = 0;
        $payout = [];
        $total_hr_breakout = [];
        foreach ($get_employee_month_job as $job) {


            if ($job->status == '3' && $job->check_in_time && $job->check_out_time) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_in_time);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_out_time);
                $diff_in_minutes = $from->diffInMinutes($to);
                $total_hr = round($diff_in_minutes / 60);
                $total_hr_min = round($diff_in_minutes);

                $employee_payout = DB::table('employeesappend')->where('select_categories', $job->payout_category_id)->where('employee_id', $job->employee_id)->orderby('id', 'asc')->first();

                $company_payout = DB::table('companysregsappend')->where('select_categories', $job->payout_category_id)->where('company_id', $job->company_id)->orderby('id', 'asc')->first();

                //if employee work for strainght hr . total pay will be base on amount of straight hr.
                //pay out by first pay out consideration
                if($employee_payout && $company_payout){

                if ($job->employee_info->Only_Straight_hours == '1') {
                    $total_pay = round($total_pay + ($employee_payout->straight_pay_hours / 60) * $total_hr_min);
                    if (isset($payout['straight_pay'])) {
                        $payout['straight_pay'] += $total_pay;
                    } else {
                        $payout['straight_pay'] = $total_pay;
                    }
                    $total_hr_breakout[] = ['straight_hr' => number_format(($total_hr_min / 60), 2)];
                } else {
                    if ($total_hr_min > ($company_payout->straight_pay_hours * 60)) {
                        $straight_hr_pay = $company_payout->straight_pay_hours * $employee_payout->straight_pay_hours;
                        $total_hr_min = $total_hr_min - ($company_payout->straight_pay_hours * 60);
                        $total_pay += $straight_hr_pay;
                        //$payout[] = ['straight_pay' => $total_pay];
                        if (isset($payout['straight_pay'])) {
                            $payout['straight_pay'] += $total_pay;
                        } else {
                            $payout['straight_pay'] = $total_pay;
                        }
                        $total_hr_breakout[] = ['straight_hr' => number_format(($company_payout->straight_pay_hours), 2)];

                        if ($total_hr_min > ($company_payout->overtime_hours1 * 60)) {
                            $overtime_hours1_pay = $company_payout->overtime_hours1 * $employee_payout->overtime_hours1;
                            $total_hr_min = $total_hr_min - ($company_payout->overtime_hours1 * 60);
                            $total_pay += $overtime_hours1_pay;

                            //$payout[] = ['overtime_hours1_pay' => $overtime_hours1_pay];
                            if (isset($payout['overtime_hours1_pay'])) {
                                $payout['overtime_hours1_pay'] += $overtime_hours1_pay;
                            } else {
                                $payout['overtime_hours1_pay'] = $overtime_hours1_pay;
                            }
                            $total_hr_breakout[] = ['overtime_hours1' => number_format(($company_payout->overtime_hours1), 2)];

                            if ($total_hr_min > ($company_payout->overtime_hours2 * 60)) {
                                $overtime_hours2_pay = $company_payout->overtime_hours2 * $employee_payout->overtime_hours2;
                                $total_hr_min = $total_hr_min - ($company_payout->overtime_hours2 * 60);
                                $total_pay += $overtime_hours2_pay;

                                //$payout[] = ['overtime_hours2_pay' => $overtime_hours2_pay];
                                if (isset($payout['overtime_hours2_pay'])) {
                                    $payout['overtime_hours2_pay'] += $overtime_hours2_pay;
                                } else {
                                    $payout['overtime_hours2_pay'] = $overtime_hours2_pay;
                                }
                                $total_hr_breakout[] = ['overtime_hours2' => number_format(($company_payout->overtime_hours2), 2)];

                                if ($total_hr_min > ($company_payout->night_hours_pay * 60)) {

                                    //$night_hours_pay = $company_payout->night_hours_pay * $employee_payout->night_hours_pay;
                                    $night_hours_pay = ($total_hr_min / 60) * ($employee_payout->night_hours_pay);
                                    $total_hr_min = $total_hr_min - ($company_payout->night_hours_pay * 60);
                                    $total_pay += $night_hours_pay;

                                    //$payout[] = ['night_hours_pay' => $night_hours_pay];
                                    if (isset($payout['night_hours_pay'])) {
                                        $payout['night_hours_pay'] += $night_hours_pay;
                                    } else {
                                        $payout['night_hours_pay'] = $night_hours_pay;
                                    }

                                    //$total_hr_breakout[]=['night_hours_pay'=>($company_payout->night_hours_pay)];
                                    $total_hr_breakout[] = ['night_hours_pay' => number_format(($total_hr_min / 60), 2)];
                                } else {
                                    $night_hours_pay = ($total_hr_min / 60) * ($employee_payout->night_hours_pay);
                                    if (isset($payout['night_hours_pay'])) {
                                        $payout['night_hours_pay'] += $night_hours_pay;
                                    } else {
                                        $payout['night_hours_pay'] = $night_hours_pay;
                                    }
                                    $total_hr_breakout[] = ['night_hours_pay' => number_format(($total_hr_min / 60), 2)];

                                    $total_pay += $night_hours_pay;
                                }
                            } else {
                                $overtime_hours2_pay = ($total_hr_min / 60) * $employee_payout->overtime_hours2;
                                $total_pay += $overtime_hours2_pay;
                                if (isset($payout['overtime_hours2_pay'])) {
                                    $payout['overtime_hours2_pay'] += $overtime_hours2_pay;
                                } else {
                                    $payout['overtime_hours2_pay'] = $overtime_hours2_pay;
                                }
                                $total_hr_breakout[] = ['overtime_hours2' => number_format(($total_hr_min / 60), 2)];
                            }
                        } else {
                            $overtime_hours1_pay = ($total_hr_min / 60) * $employee_payout->overtime_hours1;
                            $total_pay += $overtime_hours1_pay;
                            if (isset($payout['overtime_hours1_pay'])) {
                                $payout['overtime_hours1_pay'] += $overtime_hours1_pay;
                            } else {
                                $payout['overtime_hours1_pay'] = $overtime_hours1_pay;
                            }
                            $total_hr_breakout[] = ['overtime_hours1' => number_format((($total_hr_min / 60)), 2)];
                        }
                    } else {
                        $straight_hr_pay = ($total_hr_min / 60) * $employee_payout->straight_pay_hours;
                        $total_pay += $total_pay + $straight_hr_pay;
                        $total_hr_breakout[] = ['straight_hr' => number_format(($total_hr_min / 60), 2)];
                    }
                }
            }
            }
        }

        $payout['total_pay'] = round($total_pay);
        // echo json_encode($payout['total_pay']);
        // exit();
        return ['payout' => $payout, 'hr_breakout' => $total_hr_breakout];
    }
}
