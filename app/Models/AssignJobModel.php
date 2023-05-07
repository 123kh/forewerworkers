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
        'check_in_time',
        'check_out_time',
        'status',
        'timesheet',
        'payout_category_id'
    ];

    public function scopeCompletedJob($query){
        return $query->where('status','3');
    }

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
                $total_work_time = 0;
                if ($this->status == '3' && $this->check_in_time && $this->check_out_time) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_time);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_out_time);
                    $options = [
                        'join' => ', ',
                        'parts' => 2,
                        'syntax' => CarbonInterface::DIFF_ABSOLUTE,
                    ];
                    $total_work_time = $from->diffForHumans($to,$options);
                }
                return $total_work_time;
    }

    public function getApproxPayAttribute()
    {
        $total_pay = 0;
        $total_hr_min=0;
        if ($this->status == '3' && $this->check_in_time && $this->check_out_time) {
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_in_time);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->check_out_time);
            $diff_in_minutes = $from->diffInMinutes($to);
            //$total_hr = round($diff_in_minutes / 60);
            $total_hr_min = round($diff_in_minutes);

            $employee_payout = DB::table('employeesappend')->where('select_categories',$this->payout_category_id)->where('employee_id', $this->employee_id)->orderby('id', 'asc')->first();
            $company_payout = DB::table('companysregsappend')->where('select_categories',$this->payout_category_id)->where('company_id', $this->company_id)->orderby('id', 'asc')->first();
            //if employee work for strainght hr . total pay will be base on amount of straight hr.
            //pay out by first pay out consideration

            if ($this->employee_info->Only_Straight_hours == '1') {
                $total_pay = ($employee_payout->straight_pay_hours/60) * $total_hr_min;
            } else {
                if($total_hr_min>($company_payout->straight_pay_hours*60)){
                    $straight_hr_pay=$company_payout->straight_pay_hours*$employee_payout->straight_pay_hours;
                    $total_hr_min=$total_hr_min-($company_payout->straight_pay_hours*60);
                    $total_pay= $total_pay+$straight_hr_pay;
                    
                    if($total_hr_min>($company_payout->overtime_hours1*60)){
                        $overtime_hours1_pay=$company_payout->overtime_hours1*$employee_payout->overtime_hours1;
                        $total_hr_min=$total_hr_min-($company_payout->overtime_hours1*60);
                        $total_pay= $total_pay+$overtime_hours1_pay;

                        
                        if($total_hr_min>($company_payout->overtime_hours2*60)){
                            $overtime_hours2_pay=$company_payout->overtime_hours2*$employee_payout->overtime_hours2;
                            $total_hr_min=$total_hr_min-($company_payout->overtime_hours2*60);
                            $total_pay= $total_pay+$overtime_hours2_pay;

                            
                            if($total_hr_min>($company_payout->night_hours_pay*60)){
                                $night_hours_pay=$company_payout->night_hours_pay*$employee_payout->night_hours_pay;
                                $total_hr_min=$total_hr_min-($company_payout->night_hours_pay*60);
                                $total_pay= $total_pay+$night_hours_pay;

                            }else{
                                $night_hours_pay=$total_hr_min*($employee_payout->night_hours_pay/60);
                                $total_pay= $total_pay+$night_hours_pay;

                            }
                        }else{
                            $overtime_hours2_pay=$total_hr_min*($employee_payout->overtime_hours2/60);
                            $total_pay= $total_pay+$overtime_hours2_pay;
                        }
                    }else{
                        $overtime_hours1_pay=$total_hr_min*($employee_payout->overtime_hours1/60);
                        $total_pay= $total_pay+$overtime_hours1_pay;
                    }
                }               
                else{
                    $straight_hr_pay=$total_hr_min*($employee_payout->straight_pay_hours/60);
                    $total_pay= $total_pay+$straight_hr_pay;
                }
            }
        }
        return round($total_pay);
    }


    //payroll hour calculation by month
    public function getMonthWorkingHoursAttribute()
    {
        $date=date('m',strtotime($this->date));
        $get_employee_month_job=AssignJobModel::where('status','3')->where('employee_id',$this->employee_id)
        ->whereMonth('date','=',$date)
        ->select('check_in_time','check_out_time','status')->get();
                $total_work_time = 0;
                foreach($get_employee_month_job as $job){
                if ($job->status == '3' && $job->check_in_time && $job->check_out_time) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_in_time);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_out_time);
                    $totalDuration = $to->diffInMinutes($from);
                    $total_work_time=$total_work_time+$totalDuration;
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
        $month=date('m',strtotime($this->date));
        $employee_id=$this->employee_id;
        $total_pay=$this->getMonthWiseApproxPayAttribute($month,$employee_id);
        return $total_pay;
    }

    public function getPreviousMonthApproxPayAttribute()
    {
      
        $month=date('m',strtotime($this->date));
        $total_pay=0;
        for ($i = $month; $i >= 1; $i--) {
            $employee_id=$this->employee_id;
            $total_pay=$total_pay+$this->getMonthWiseApproxPayAttribute($i,$employee_id);
        }
        return $total_pay;
    }

    public function getMonthWiseApproxPayAttribute($month,$employee_id){
        
       
        $get_employee_month_job=AssignJobModel::where('status','3')->where('employee_id',$employee_id)
        ->whereMonth('date','=',$month)
        ->select('id','employee_id','company_id','payout_category_id','check_in_time','check_out_time','status')->get();
        $total_pay = 0;
        $total_hr_min=0;


        foreach($get_employee_month_job as $job){
         
          
            if ($job->status == '3' && $job->check_in_time && $job->check_out_time) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_in_time);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->check_out_time);
                $diff_in_minutes = $from->diffInMinutes($to);
                //$total_hr = round($diff_in_minutes / 60);
                $total_hr_min = round($diff_in_minutes);
    
                $employee_payout = DB::table('employeesappend')->where('select_categories',$job->payout_category_id)->where('employee_id', $job->employee_id)->orderby('id', 'asc')->first();
                $company_payout = DB::table('companysregsappend')->where('select_categories',$job->payout_category_id)->where('company_id', $job->company_id)->orderby('id', 'asc')->first();
                
                //if employee work for strainght hr . total pay will be base on amount of straight hr.
                //pay out by first pay out consideration
    
                if ($job->employee_info->Only_Straight_hours == '1') {
                    $total_pay = $total_pay+($employee_payout->straight_pay_hours/60) * $total_hr_min;
                } else {
                    if($total_hr_min>($company_payout->straight_pay_hours*60)){
                        $straight_hr_pay=$company_payout->straight_pay_hours*$employee_payout->straight_pay_hours;
                        $total_hr_min=$total_hr_min-($company_payout->straight_pay_hours*60);
                        $total_pay= $total_pay+$straight_hr_pay;
                        
                        if($total_hr_min>($company_payout->overtime_hours1*60)){
                            $overtime_hours1_pay=$company_payout->overtime_hours1*$employee_payout->overtime_hours1;
                            $total_hr_min=$total_hr_min-($company_payout->overtime_hours1*60);
                            $total_pay= $total_pay+$overtime_hours1_pay;
    
                            
                            if($total_hr_min>($company_payout->overtime_hours2*60)){
                                $overtime_hours2_pay=$company_payout->overtime_hours2*$employee_payout->overtime_hours2;
                                $total_hr_min=$total_hr_min-($company_payout->overtime_hours2*60);
                                $total_pay= $total_pay+$overtime_hours2_pay;
    
                                
                                if($total_hr_min>($company_payout->night_hours_pay*60)){
                                    $night_hours_pay=$company_payout->night_hours_pay*$employee_payout->night_hours_pay;
                                    $total_hr_min=$total_hr_min-($company_payout->night_hours_pay*60);
                                    $total_pay= $total_pay+$night_hours_pay;
    
                                }else{
                                    $night_hours_pay=$total_hr_min*($employee_payout->night_hours_pay/60);
                                    $total_pay= $total_pay+$night_hours_pay;
    
                                }
                            }else{
                                $overtime_hours2_pay=$total_hr_min*($employee_payout->overtime_hours2/60);
                                $total_pay= $total_pay+$overtime_hours2_pay;
                            }
                        }else{
                            $overtime_hours1_pay=$total_hr_min*($employee_payout->overtime_hours1/60);
                            $total_pay= $total_pay+$overtime_hours1_pay;
                        }
                    }               
                    else{
                        $straight_hr_pay=$total_hr_min*($employee_payout->straight_pay_hours/60);
                        $total_pay= $total_pay+$straight_hr_pay;
                    }
                }
            }
        }
        return round($total_pay);
    
    }
}
