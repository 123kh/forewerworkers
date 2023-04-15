<?php




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

?>