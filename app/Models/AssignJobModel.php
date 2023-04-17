<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Companyres;
use App\Models\Master\Employee;
use App\Models\Master\Location;
use DB;

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
        'job_end_date',
        'payrun_id',
        'expected_hour',
        'status'
    ];

    public function getCompanyNameAttribute()
    {
        return ucWords(Companyres::find($this->company_id)->company_name);
    }

    public function getLocationNameAttribute()
    {
        return ucWords(Location::find($this->location_id)->location);
    }

    public function getEmployeeNameAttribute()
    {
        return ucWords(Employee::find($this->employee_id)->employee_name);
    }
    public function getEmployeeInfoAttribute()
    {
        return Employee::find($this->employee_id);
    }

    public function getWorkingHoursAttribute()
    {
        $diff_in_minutes = 0;
        if ($this->status == '3') {
            $to = \Carbon\Carbon::createFromFormat('H:i:s', $this->check_in_time);
            $from = \Carbon\Carbon::createFromFormat('H:i:s', $this->check_out_time);
            $diff_in_minutes = $from->diffInMinutes($to);
        }
        return round($diff_in_minutes / 60) . ' Hrs';
    }

    public function getApproxPayAttribute()
    {
        $total_pay = 0;
        if ($this->status == '3') {
            $to = \Carbon\Carbon::createFromFormat('H:i:s', $this->check_in_time);
            $from = \Carbon\Carbon::createFromFormat('H:i:s', $this->check_out_time);
            $diff_in_minutes = $from->diffInMinutes($to);
            $total_hr = round($diff_in_minutes / 60);
            $employee_payout = DB::table('employeesappend')->where('employee_id', $this->employee_id)->orderby('id', 'asc')->first();
            $company_payout = DB::table('companysregsappend')->where('company_id', $this->company_id)->orderby('id', 'asc')->first();
            //if employee work for strainght hr . total pay will be base on amount of straight hr.
            //pay out by first pay out consideration

            if ($this->employee_info->Only_Straight_hours == '1') {
                $total_pay = round($employee_payout->straight_pay_hours * $total_hr);
            } else {
                if($total_hr>$company_payout->straight_pay_hours){
                    $straight_hr_pay=round($company_payout->straight_pay_hours*$employee_payout->straight_pay_hours);
                    $total_hr=$total_hr-$company_payout->straight_pay_hours;
                    $total_pay= $total_pay+$straight_hr_pay;
                    if($total_hr>$company_payout->overtime_hours1){
                        $overtime_hours1_pay=round($company_payout->overtime_hours1*$employee_payout->overtime_hours1);
                        $total_hr=$total_hr-$company_payout->overtime_hours1;
                        $total_pay= $total_pay+$overtime_hours1_pay;
                        if($total_hr>$company_payout->overtime_hours2){
                            $overtime_hours2_pay=round($company_payout->overtime_hours2*$employee_payout->overtime_hours2);
                            $total_hr=$total_hr-$company_payout->overtime_hours2;
                            $total_pay= $total_pay+$overtime_hours2_pay;
                            if($total_hr>$company_payout->night_hours_pay){
                                $night_hours_pay=round($company_payout->night_hours_pay*$employee_payout->night_hours_pay);
                                $total_hr=$total_hr-$company_payout->night_hours_pay;
                                $total_pay= $total_pay+$night_hours_pay;
                            }else{
                                $night_hours_pay=round($total_hr*$employee_payout->night_hours_pay);
                                $total_pay= $total_pay+$night_hours_pay;
                            }
                        }else{
                            $overtime_hours2_pay=round($total_hr*$employee_payout->overtime_hours2);
                            $total_pay= $total_pay+$overtime_hours2_pay;
                        }
                    }else{
                        $overtime_hours1_pay=round($total_hr*$employee_payout->overtime_hours1);
                        $total_pay= $total_pay+$overtime_hours1_pay;
                    }
                }               
                else{
                    $straight_hr_pay=round($total_hr*$company_payout->straight_pay_hours);
                    $total_pay= $total_pay+$straight_hr_pay;
                }
                //echo $total_hr;
            }
        }
        return $total_pay;
    }
}
