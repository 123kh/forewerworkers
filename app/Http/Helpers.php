<?php
use Carbon\Carbon;
use App\Models\Tax_Master\Othertax;


if (!function_exists('get_company')) {
    function get_company()
    {
        $company=DB::table('companysregs')->orderby('company_name','asc')->select('id','company_name')->get();
        return $company;
    }
}

if (!function_exists('get_location')) {
    function get_location()
    {
        $location=DB::table('locations')->orderby('location','asc')->select('id','location')->get();
        return $location;
    }
}

if (!function_exists('get_employee')) {
    function get_employee()
    {
        $employees=DB::table('employees')->orderby('employee_name','asc')->select('id','employee_name','Email')->get();
        return $employees;
    }
}

if (!function_exists('get_categories')) {
    function get_categories()
    {
        $categories=DB::table('categorys')->orderby('add_category','asc')->select('id','add_category')->get();
        return $categories;
    }
}

if (!function_exists('all_months')) {
    function all_months()
    {
        $year = 2023; // set the year
        $months =[];
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::createFromDate($year, $month, 1);
            $monthName = $date->format('F');
            $months[]=$monthName;

        }
return $months;
    }
}

if (!function_exists('amount_to_words')) {
    function amount_to_words($amount)
    {
        $spell_out = new \NumberFormatter(
            'en_US', 
            \NumberFormatter::SPELLOUT
        );
        
        return $spell_out->format($amount);
    }
}

if (!function_exists('get_ELTax')) {
    function get_ELTax($job_id,$amount)
    {
        $ELTax=Othertax::pluck('EI_Employee_Contribution')->first();
        return ($amount/100)*$ELTax;
    }
}

if (!function_exists('get_CPPTax')) {
    function get_CPPTax($job_id,$amount)
    {
        $CPPTax=Othertax::pluck('CPP_Employee_Contribution')->first();
        return ($amount/100)*$CPPTax;
    }
}

if (!function_exists('get_Tax')) {
    function get_Tax($job_id,$amount)
    {
        $Tax=1; //static because we dont know which tax is this
        return ($amount/100)*$Tax;
    }
}

if (!function_exists('vacation_pay')) {
    function vacation_pay($job_id,$amount)
    {
        $vacation_percentage=Othertax::pluck('vacation_pay')->first();

        return ($amount/100)*$vacation_percentage;
    }
}

if (!function_exists('get_employee_payout')) {
    function get_employee_payout($job_id)
    {
        $get_employee_payout = DB::table('assign_job_models')
        ->join('employeesappend', function ($join) {
            $join->on('employeesappend.employee_id', '=', 'assign_job_models.employee_id');
                 //->on('employeesappend.select_categories', '=', 'assign_job_models.payout_category_id');
        })
        ->where('assign_job_models.id', $job_id)
        ->first();
        return $get_employee_payout;
    }
}



?>