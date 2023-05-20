<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
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
  $month_pay=$job->month_approx_pay;
  $month_pay_total=$job->previous_month_approx_pay;

  $ELTax=get_ELTax($job->id,$month_pay);
  $CPPTax=get_CPPTax($job->id,$month_pay);
  $Tax=get_Tax($job->id,$month_pay);
  
  $ELTax_total=get_ELTax($job->id,$month_pay_total);;//this will be total prevoius month
  $CPPTax_total=get_CPPTax($job->id,$month_pay_total);//this will be total prevoius month
  $Tax_total=get_Tax($job->id,$month_pay_total);//this will be total prevoius month

  $withheld=$ELTax+$CPPTax+$Tax;
  $withheld_total=$ELTax_total+$CPPTax_total+$Tax_total;

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

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->startOfMonth()->format('d/m/Y')}} to

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <table style="width:100%;" class="table">
    <tr>
      <td class="td">
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 30%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">Regular</span> <span style="margin-left: 13%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$month_pay_total}}</span><br>
        <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br>
        <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 27%;" class="font">{{$month_pay_total}}</span><br><br><br>
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

        <span class="font">NetPAy</span> <span style="margin-left: 15%;" class="font"> {{$net_pay}}</span> <span
          style="margin-left: 33%;" class="font">{{$net_pay_total}}</span><br>
        <span class="font">I Insurable <br> Hours
        </span> <span style="margin-left: 25%;" class="font"> 80.00</span> <br><br>
        <span class="font"> Regular: 80.00 @ 20.00/Hr</span><br><br><br>
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

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->startOfMonth()->format('d/m/Y')}} to

        {{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <table style="width:100%;" class="table">
    <tr>
      <td class="td">
        <span style="margin-left: 30%; " class="font"> <b>Period</b> </span> <span style="margin-left: 30%;"
          class="font"> <b>YTD</b> </span><br>
        <span class="font">Regular</span> <span style="margin-left: 13%;border-bottom: 1px solid rgb(0, 0, 0);" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 28%;border-bottom: 1px solid rgb(0, 0, 0);" class="font">{{$month_pay_total}}</span><br>
        <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br>
        <span class="font"></span> <span style="margin-left: 13%;" class="font"> </span> <span style="margin-left: 28%;"
          class="font"></span><br><br>
        <span class="font">Gross Pay</span> <span style="margin-left: 9%;" class="font"> {{$month_pay}}</span> <span
          style="margin-left: 27%;" class="font">{{$month_pay_total}}</span><br><br><br>
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

        <span class="font">NetPAy</span> <span style="margin-left: 15%;" class="font"> {{$net_pay}}</span> <span
          style="margin-left: 33%;" class="font">{{$net_pay_total}}</span><br>
        <span class="font">I Insurable <br> Hours
        </span> <span style="margin-left: 25%;" class="font"> 80.00</span> <br><br>
        <span class="font"> Regular: 80.00 @ 20.00/Hr</span><br><br><br>
      </td>
    </tr>
  </table>
</body>

</html>