<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Payroll Print</title>
</head>

<style>
  .table {
    border: 1px solid black;
    border-collapse: collapse;
  }

  .td {
    border: 1px solid black;
    border-collapse: collapse;
  }

  .font {
    font-size: 12px;
  }

  .font1 {
    font-size: 13px;
  }
</style>


<body>
    @php
  $month_pay=$job->month_approx_pay['payout']['total_pay'];
  $total_month_hr=number_format(array_sum(Arr::flatten($job->month_approx_pay['hr_breakout'])),2);
 
  $month_pay_total=$job->previous_month_approx_pay['total_pay'];
  $get_employee_payout=get_employee_payout($job->id);

  $vacation_pay=vacation_pay($job->id,$month_pay);
  $vacation_pay_total=vacation_pay($job->id,$month_pay_total);

  $gross_pay=$month_pay+$vacation_pay;
  $gross_pay_total=$month_pay_total+$vacation_pay_total;

  $ELTax=number_format(get_ELTax($job->id,$gross_pay),2);
  $CPPTax=number_format(get_CPPTax($job->id,$gross_pay),2);
  $Tax=number_format(get_Tax($job->id,$gross_pay),2);
  
  $ELTax_total=number_format(get_ELTax($job->id,$gross_pay_total),2);
  $CPPTax_total=number_format(get_CPPTax($job->id,$gross_pay_total),2);
  $Tax_total=number_format(get_Tax($job->id,$gross_pay_total),2);
  $withheld=$ELTax+((float)str_replace(',', '', $CPPTax))+$Tax+$vacation_pay;

  $withheld_total=$ELTax_total+((float)str_replace(',', '', $CPPTax_total))+$Tax_total+$vacation_pay_total;

  $net_pay=$month_pay-$withheld;
  $net_pay_total=$month_pay_total-$withheld_total;
 
@endphp

  <h2>{{config('app.company_name')}}
  </h2>
  <p class="font1"> <b>{!!config('app.company_address')!!}</b> </p>
   
  <div style="display: block;">
     <p style="float:right;margin-right:20px" class="font1">CHEQUE NO.
    <span style="margin-left:50px"></span>{{date('My',strtotime($job->date))}}
     </p>
   </div>
 <br>
<div style="display: block;">
      <p style="float:right;margin-right:20px" class="font1">DATE.
        <span style="margin-left:50px"></span>{{date('d m Y')}}
         </p>
</div>
   

  <div style="margin-top: -1%; display: flex;
  justify-content: space-between;">
    <p></p>
    <p>
    </p>
   
  </div>

  <div>
    <p>**{{amount_to_words($net_pay)}}
    <span style="float:right;margin-right:20px">$**{{$net_pay}}</span>
    </p>
  </div>

  <p class="font1">{{$job->employee_info->employee_name}}
     <br> {{$job->employee_info->address}}<br>
     {{$job->employee_info->contact_number}}

  <p> <b> {{config('app.company_name')}}</b></p>

  <table style="width:100%; border:1px solid black;">
    <tr>
      <td class="font1">{{$job->employee_info->employee_name}}</td>
      <td style="padding-right: 130px;" class="font1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td class="font1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->format('My')}}
      </td>
    </tr>
   
    <tr>
      <td class="font1">Pay Period:

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$get_employee_job_months_first->date)->startOfMonth()->format('d/m/Y')}} to

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$get_employee_job_months_last->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td></td>
      <td></td>
    </tr>
  </table>

  <table style="width:100%;" class="table">
    <tr>
      <td class="td">
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 30%;"
          class="font"> <b>YTD</b> </span><br>
          

          @if(isset($job->month_approx_pay['payout']['straight_pay']) && $job->month_approx_pay['payout']['straight_pay']>0)
          <span class="font">Regular</span> <span style="margin-left: 13%;" class="font"> {{$job->month_approx_pay['payout']['straight_pay']}}</span>
          <span
           style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['straight_pay']}}</span><br>
         <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
           class="font"></span><br>
           @endif

          @if(isset($job->month_approx_pay['payout']['overtime_hours1_pay']) && $job->month_approx_pay['payout']['overtime_hours1_pay']>0)
           <span class="font">Overtime 1</span> <span style="margin-left: 10%;" class="font"> {{$job->month_approx_pay['payout']['overtime_hours1_pay']}}</span>
           <span
            style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['overtime_hours1_pay']}}</span><br>
          <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
            class="font"></span><br>
            @endif

            @if(isset($job->month_approx_pay['payout']['overtime_hours2_pay']) && $job->month_approx_pay['payout']['overtime_hours2_pay']>0)
            <span class="font">Overtime 2</span> <span style="margin-left: 10%;" class="font"> {{$job->month_approx_pay['payout']['overtime_hours2_pay']}}</span>
            <span
             style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['overtime_hours2_pay']}}</span><br>
           <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
             class="font"></span><br>
             @endif

             {{-- @if(isset($job->month_approx_pay['payout']['night_hours_pay']) && $job->month_approx_pay['payout']['night_hours_pay']>0)
             <span class="font">Night Hours Pay</span> <span style="margin-left: 5%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$job->month_approx_pay['payout']['night_hours_pay']}}</span>
             <span
              style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$job->previous_month_approx_pay['night_hours_pay']}}</span><br>
            <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
              class="font"></span><br>
              @endif --}}

              <span class="font">Vacation Paid</span> <span style="margin-left: 5%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$vacation_pay}}</span>
              <span
               style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$vacation_pay_total}}</span><br>
             <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
               class="font"></span><br>

        <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$gross_pay}}</span> <span
          style="margin-left: 27%;" class="font">{{$gross_pay_total}}</span><br>
          
          <span class="font">Vacation Earned</span> <span style="margin-left: 5%;" class="font"> {{$vacation_pay}}</span>
          <span
           style="margin-left: 28%;" class="font">{{$vacation_pay_total}}</span><br>
         <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
           class="font"></span><br>
           <span class="font">Vacation Paid</span> <span style="margin-left: 5%;" class="font"> {{$vacation_pay}}</span>
           <span
            style="margin-left: 28%;" class="font">{{$vacation_pay_total}}</span><br>
          <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
            class="font"></span><br>
            <span class="font">Vacation Owed</span> <span style="margin-left: 5%;" class="font"> </span>
            <span
             style="margin-left: 28%;" class="font">0</span><br>
           <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
             class="font"></span><br>


          <br><br>
      </td>
      <td class="td">
        <span style="margin-left: 30%;" class="font"> <b>Period</b> </span> <span style="margin-left: 33%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">CPP</span> <span style="margin-left: 20%;" class="font"> {{$CPPTax}}</span> <span
          style="margin-left: 34%;" class="font">{{$CPPTax_total}}</span><br>
        <span class="font">EI</span> <span style="margin-left: 25%;" class="font"> {{$ELTax}}</span> <span
          style="margin-left: 36%;" class="font">{{$ELTax_total}}</span><br>
        <span class="font">Tax</span> <span style="margin-left: 23%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$Tax}}</span> <span
          style="margin-left: 35%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$Tax_total}}</span><br><br>
        <span class="font">Withheld</span> <span style="margin-left: 9%;" class="font"> {{$withheld}}</span> <span
          style="margin-left: 33%;" class="font">{{$withheld_total}}</span><br><br><br>
      </td>
      <td class="td"><br><br>
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 33%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 30%;" class="font">{{$month_pay_total}}</span><br>
        <span class="font">Withheld</span> <span style="margin-left: 10%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> -{{$withheld}}</span> <span
          style="margin-left: 30%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">-{{$withheld_total}}</span><br><br>

        <span class="font">Net Pay</span> <span style="margin-left: 15%;" class="font"> {{$net_pay}}</span> <span
          style="margin-left: 33%;" class="font">{{$net_pay_total}}</span><br>
        <span class="font" style="margin-top:1%;">EI Insurable <br> Hours
        </span> <span style="margin-left: 25%;" class="font"> {{$total_month_hr}}</span> <br> <br>
        
        @php
        $data = $job->month_approx_pay['hr_breakout'];
        $straight_hr_array = array_filter($data, function ($item) {
         return isset($item['straight_hr']);
       });
       $straight_hr_array = collect(array_filter($straight_hr_array, function ($item) {
       return isset($item['straight_hr']);
       }))->map(function ($item) {
           return floatval($item['straight_hr']);
       });
       $result1 = [
           'straight_hr' => number_format($straight_hr_array->sum(), 2)
       ];
       $straight_hr_array=$result1;
       
       $overtime_hours1_array = array_filter($data, function ($item) {
         return isset($item['overtime_hours1']);
       });
       $overtime_hours1_array = collect(array_filter($overtime_hours1_array, function ($item) {
       return isset($item['overtime_hours1']);
       }))->map(function ($item) {
           return floatval($item['overtime_hours1']);
       });
       $result2 = [
           'overtime_hours1' => number_format($overtime_hours1_array->sum(), 2)
       ];
       $overtime_hours1_array=$result2;
       $overtime_hours2_array = array_filter($data, function ($item) {
         return isset($item['overtime_hours2']);
       });
       $overtime_hours2_array = collect(array_filter($overtime_hours2_array, function ($item) {
       return isset($item['overtime_hours2']);
       }))->map(function ($item) {
           return floatval($item['overtime_hours2']);
       });
       $result3 = [
           'overtime_hours2' => number_format($overtime_hours2_array->sum(), 2)
       ];
       $overtime_hours2_array=$result3;
      
      @endphp  
       
       @if(!empty($straight_hr_array) && floatval($straight_hr_array['straight_hr'])>0)
       <span class="font"> Regular: {{number_format($straight_hr_array['straight_hr'],2)}} @ {{number_format($get_employee_payout->straight_pay_hours,2)}}/Hr</span><br>
       @endif


       @if(!empty($overtime_hours1_array) && floatval($overtime_hours1_array['overtime_hours1'])>0)
       <span class="font"> Overtime 1: {{number_format($overtime_hours1_array['overtime_hours1'],2)}} @ {{number_format($get_employee_payout->overtime_hours1,2)}}/Hr</span><br>
       @endif

       @if(!empty($overtime_hours2_array) && floatval($overtime_hours2_array['overtime_hours2'])>0)
       <span class="font"> Overtime 2: {{number_format($overtime_hours2_array['overtime_hours2'],2)}} @ {{number_format($get_employee_payout->overtime_hours2,2)}}/Hr</span><br>
       @endif

        {{-- @if(isset($job->month_approx_pay['hr_breakout'][3]) && isset($job->month_approx_pay['hr_breakout'][3]['night_hours_pay']) && $job->month_approx_pay['hr_breakout'][3]['night_hours_pay']>0)
        <span class="font"> Overtime 3: {{number_format($job->month_approx_pay['hr_breakout'][3]['night_hours_pay'],2)}} @ {{number_format($get_employee_payout->night_hours_pay,2)}}/Hr</span><br><br><br>
        @endif --}}


      </td>
    </tr>
  </table>

  <p> <b> {{config('app.company_name')}}</b></p>

  <table style="width:100%; border:1px solid black;">
    <tr>
      <td class="font1">{{$job->employee_info->employee_name}}</td>
      <td style="padding-right: 130px;" class="font1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td class="font1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->format('My')}}
      </td>
    </tr>
   
    <tr>
      <td class="font1">Pay Period:

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$get_employee_job_months_first->date)->startOfMonth()->format('d/m/Y')}} to

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$get_employee_job_months_last->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td></td>
      <td></td>
    </tr>
  </table>

  <table style="width:100%;" class="table">
    <tr>
      <td class="td">
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 30%;"
          class="font"> <b>YTD</b> </span><br>
          

          @if(isset($job->month_approx_pay['payout']['straight_pay']) && $job->month_approx_pay['payout']['straight_pay']>0)
          <span class="font">Regular</span> <span style="margin-left: 13%;" class="font"> {{$job->month_approx_pay['payout']['straight_pay']}}</span>
          <span
           style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['straight_pay']}}</span><br>
         <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
           class="font"></span><br>
           @endif

          @if(isset($job->month_approx_pay['payout']['overtime_hours1_pay']) && $job->month_approx_pay['payout']['overtime_hours1_pay']>0)
           <span class="font">Overtime 1</span> <span style="margin-left: 10%;" class="font"> {{$job->month_approx_pay['payout']['overtime_hours1_pay']}}</span>
           <span
            style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['overtime_hours1_pay']}}</span><br>
          <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
            class="font"></span><br>
            @endif

            @if(isset($job->month_approx_pay['payout']['overtime_hours2_pay']) && $job->month_approx_pay['payout']['overtime_hours2_pay']>0)
            <span class="font">Overtime 2</span> <span style="margin-left: 10%;" class="font"> {{$job->month_approx_pay['payout']['overtime_hours2_pay']}}</span>
            <span
             style="margin-left: 28%;" class="font">{{$job->previous_month_approx_pay['overtime_hours2_pay']}}</span><br>
           <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
             class="font"></span><br>
             @endif

             {{-- @if(isset($job->month_approx_pay['payout']['night_hours_pay']) && $job->month_approx_pay['payout']['night_hours_pay']>0)
             <span class="font">Night Hours Pay</span> <span style="margin-left: 5%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$job->month_approx_pay['payout']['night_hours_pay']}}</span>
             <span
              style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$job->previous_month_approx_pay['night_hours_pay']}}</span><br>
            <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
              class="font"></span><br>
              @endif --}}

              <span class="font">Vacation Paid</span> <span style="margin-left: 5%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$vacation_pay}}</span>
              <span
               style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$vacation_pay_total}}</span><br>
             <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
               class="font"></span><br>

        <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$gross_pay}}</span> <span
          style="margin-left: 27%;" class="font">{{$gross_pay_total}}</span><br>
          
          <span class="font">Vacation Earned</span> <span style="margin-left: 5%;" class="font"> {{$vacation_pay}}</span>
          <span
           style="margin-left: 28%;" class="font">{{$vacation_pay_total}}</span><br>
         <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
           class="font"></span><br>
           <span class="font">Vacation Paid</span> <span style="margin-left: 5%;" class="font"> {{$vacation_pay}}</span>
           <span
            style="margin-left: 28%;" class="font">{{$vacation_pay_total}}</span><br>
          <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
            class="font"></span><br>
            <span class="font">Vacation Owed</span> <span style="margin-left: 5%;" class="font"> </span>
            <span
             style="margin-left: 28%;" class="font">0</span><br>
           <span class="font"></span> <span style="margin-left: 10%;" class="font"> </span> <span style="margin-left: 28%;"
             class="font"></span><br>


          <br><br>
      </td>
      <td class="td">
        <span style="margin-left: 30%;" class="font"> <b>Period</b> </span> <span style="margin-left: 33%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">CPP</span> <span style="margin-left: 20%;" class="font"> {{$CPPTax}}</span> <span
          style="margin-left: 34%;" class="font">{{$CPPTax_total}}</span><br>
        <span class="font">EI</span> <span style="margin-left: 25%;" class="font"> {{$ELTax}}</span> <span
          style="margin-left: 36%;" class="font">{{$ELTax_total}}</span><br>
        <span class="font">Tax</span> <span style="margin-left: 23%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$Tax}}</span> <span
          style="margin-left: 35%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$Tax_total}}</span><br><br>
        <span class="font">Withheld</span> <span style="margin-left: 9%;" class="font"> {{$withheld}}</span> <span
          style="margin-left: 33%;" class="font">{{$withheld_total}}</span><br><br><br>
      </td>
      <td class="td"><br><br>
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 33%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 30%;" class="font">{{$month_pay_total}}</span><br>
        <span class="font">Withheld</span> <span style="margin-left: 10%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> -{{$withheld}}</span> <span
          style="margin-left: 30%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">-{{$withheld_total}}</span><br><br>

        <span class="font">Net Pay</span> <span style="margin-left: 15%;" class="font"> {{$net_pay}}</span> <span
          style="margin-left: 33%;" class="font">{{$net_pay_total}}</span><br>
        <span class="font" style="margin-top:1%;">EI Insurable <br> Hours
        </span> <span style="margin-left: 25%;" class="font"> {{$total_month_hr}}</span> <br> <br>
        
       @php
         $data = $job->month_approx_pay['hr_breakout'];
		     $straight_hr_array = array_filter($data, function ($item) {
          return isset($item['straight_hr']);
        });
        $straight_hr_array = collect(array_filter($straight_hr_array, function ($item) {
        return isset($item['straight_hr']);
        }))->map(function ($item) {
            return floatval($item['straight_hr']);
        });
        $result1 = [
            'straight_hr' => number_format($straight_hr_array->sum(), 2)
        ];
		    $straight_hr_array=$result1;
        
        $overtime_hours1_array = array_filter($data, function ($item) {
          return isset($item['overtime_hours1']);
        });
        $overtime_hours1_array = collect(array_filter($overtime_hours1_array, function ($item) {
        return isset($item['overtime_hours1']);
        }))->map(function ($item) {
            return floatval($item['overtime_hours1']);
        });
        $result2 = [
            'overtime_hours1' => number_format($overtime_hours1_array->sum(), 2)
        ];
		    $overtime_hours1_array=$result2;
        $overtime_hours2_array = array_filter($data, function ($item) {
          return isset($item['overtime_hours2']);
        });
        $overtime_hours2_array = collect(array_filter($overtime_hours2_array, function ($item) {
        return isset($item['overtime_hours2']);
        }))->map(function ($item) {
            return floatval($item['overtime_hours2']);
        });
        $result3 = [
            'overtime_hours2' => number_format($overtime_hours2_array->sum(), 2)
        ];
		    $overtime_hours2_array=$result3;
       
       @endphp  
        
        @if(!empty($straight_hr_array) && floatval($straight_hr_array['straight_hr'])>0)
        <span class="font"> Regular: {{number_format($straight_hr_array['straight_hr'],2)}} @ {{number_format($get_employee_payout->straight_pay_hours,2)}}/Hr</span><br>
        @endif


        @if(!empty($overtime_hours1_array) && floatval($overtime_hours1_array['overtime_hours1'])>0)
        <span class="font"> Overtime 1: {{number_format($overtime_hours1_array['overtime_hours1'],2)}} @ {{number_format($get_employee_payout->overtime_hours1,2)}}/Hr</span><br>
        @endif

        @if(!empty($overtime_hours2_array) && floatval($overtime_hours2_array['overtime_hours2'])>0)
        <span class="font"> Overtime 2: {{number_format($overtime_hours2_array['overtime_hours2'],2)}} @ {{number_format($get_employee_payout->overtime_hours2,2)}}/Hr</span><br>
        @endif

        {{-- @if(isset($job->month_approx_pay['hr_breakout'][3]) && isset($job->month_approx_pay['hr_breakout'][3]['night_hours_pay']) && $job->month_approx_pay['hr_breakout'][3]['night_hours_pay']>0)
        <span class="font"> Overtime 3: {{number_format($job->month_approx_pay['hr_breakout'][3]['night_hours_pay'],2)}} @ {{number_format($get_employee_payout->night_hours_pay,2)}}/Hr</span><br><br><br>
        @endif --}}


      </td>
    </tr>
  </table>
</body>

</html>