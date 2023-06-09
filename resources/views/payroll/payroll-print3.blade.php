<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
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
<body style="font-family:Arial;font-size:12px">
  <h2 style="margin-top:5%;">{{config('app.company_name')}}
  </h2>
  <h5>{!!config('app.company_address')!!}</h5>
  <hr>
  <h5 style="margin-left: 80%;">CHEQUE NO: {{date('My',strtotime($job->date))}}</h5>
  <h5 style="margin-left: 80%;">DATE: {{date('d m Y')}}
    <h5 style="margin-left: 80%;">D D M M Y Y Y Y
    </h5>
    <table>
      <tr>
        <td>
         
          <h4 align="center">** {{amount_to_words($net_pay)}}</h4>
        </td>
        <td>



          <h5 style="margin-left:1320%;">$**{{$net_pay}}</h5>
        </td>
      </tr>
    </table>

    <p style="font-size: 12px; margin-left: 2%;">{{$job->employee_info->employee_name}}</p>
    <p style="font-size: 12px; margin-left: 2%;">{{$job->employee_info->address}}</p>
    <p style="font-size: 12px; margin-left: 2%;">{{$job->employee_info->contact_number}}</p>
    <!-- <hr style="color: #000;"> -->


    <h4 style="margin-left: 1%;">{{config('app.company_name')}}
    </h4>

    <table style="border: none;margin-left:6.35pt;border-collapse:collapse; width: 98%; height:10%;">
      <tbody>
        <tr>
          <td colspan="2"
            style="width: 133.6pt;border-top: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-right: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.25pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;'>
              <span style="font-size:11px;">{{$job->employee_info->employee_name}}</span></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.2pt;'><strong><span
                  style='font-size:10px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:6.45pt;'><span
                style="font-size:11px;">Pay&nbsp;Period:</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span
                style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->startOfMonth()->format('d/m/Y')}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span
                style="font-size:11px;">to</span></p>
          </td>
          <td
            style="width: 46.4pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><strong><span
                  style='font-size:12px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.1pt;'><strong><span
                  style='font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:3.5pt;text-align:  right;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</span></p>
          </td>
          <td
            style="width: 52.95pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.5pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:20.35pt;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</span></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.25pt;margin-right:  5.95pt;margin-bottom:.0001pt;margin-left:0cm;text-align:  right;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->format('My')}}</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:9px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 76.95pt;border: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:9.25pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>Period</span></strong></p>
          </td>
          <td
            style="width: 46.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:1.1pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span
                  style='font-size:11px;font-family:"Arial",sans-serif;'>YTD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong>
            </p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:9px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 86.2pt;border: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:14.8pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>Period&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></strong></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:1.05pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>YTD&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></strong></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:99.6pt;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period</span></strong><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; </span><strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>YTD</span></strong>
            </p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;line-height:8.45pt;'>
              <span style="font-size:11px;">Regular</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:17.85pt;line-height:8.45pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;&nbsp;
                  &nbsp;</span></u><u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp;
                  &nbsp;</span></u><u>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                  style="font-size:11px;">{{$month_pay}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                  &nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></u><u><span
                  style="font-size:11px;">&nbsp;&nbsp;{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;</span></u></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;line-height:8.45pt;'>
              <span style="font-size:11px;">CPP</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:14.45pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">{{$CPPTax}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span></p>
          </td>
          


          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:.9pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">{{$CPPTax_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.15pt;line-height:8.45pt;'>
              <span style="font-size:11px;">Gross&nbsp;Pay</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:.65pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$month_pay}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;</span><span style="font-size:11px;">{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">EI</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:14.45pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$ELTax}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;text-align:right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$ELTax_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Withheld</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.75pt;text-align:  right;line-height:8.35pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; </span></u><u><span
                  style="font-size:11px;">{{$withheld}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span></u><u><span style="font-size:11px;">{{$withheld_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span></u></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Gross&nbsp;Pay</span></p>
          </td>
          <td style="width: 76.95pt;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:8.7pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$month_pay}}&nbsp;  </span></p>
          </td>
          <td
            style="width: 46.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.7pt;text-align:right;line-height:8.35pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Tax</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:21.55pt;line-height:8.35pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                  &nbsp;&nbsp;</span></u><u><span style="font-size:11px;">{{$Tax}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp;</span></u><u><span style="font-size:11px;">&nbsp; &nbsp;&nbsp; {{$Tax_total}}</span></u></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Net&nbsp;Pay</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.65pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$net_pay}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="font-size:11px;">{{$net_pay_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:9.1pt;'>
              <span style="font-size:11px;">Withheld</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:14.35pt;text-align:  right;line-height:9.1pt;'>
              <span style="font-size:11px;">{{$withheld}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.8pt;text-align:right;line-height:9.1pt;'>
              <span style="font-size:11px;">{{$withheld_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:9.1pt;'>
              <span style="font-size:11px;">EI&nbsp;Insurable&nbsp;Hours</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:33.85pt;line-height:9.1pt;'>
              <span style="font-size:11px;">80.00</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: none;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td
            style="width: 52.95pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:4.6pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.15pt;'>
              <span style="font-size:11px;">Regular: 80.00 @ 20.00/Hr</span></p>
          </td>
        </tr>
      </tbody>
    </table>


    <h4 style="margin-left: 1%;page-break-before: always" >FOREVER WORKERS CONTRACTING LTD.
    </h4>

     <table style="border: none;margin-left:6.35pt;border-collapse:collapse; width: 98%; height:10%;">
      <tbody>
        <tr>
          <td colspan="2"
            style="width: 133.6pt;border-top: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-right: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.25pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;'>
              <span style="font-size:11px;">{{$job->employee_info->employee_name}}</span></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.2pt;'><strong><span
                  style='font-size:10px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:6.45pt;'><span
                style="font-size:11px;">Pay&nbsp;Period:</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span
                style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->startOfMonth()->format('d/m/Y')}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span
                style="font-size:11px;">to</span></p>
          </td>
          <td
            style="width: 46.4pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><strong><span
                  style='font-size:12px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.1pt;'><strong><span
                  style='font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:3.5pt;text-align:  right;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</span></p>
          </td>
          <td
            style="width: 52.95pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.5pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:20.35pt;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->endOfMonth()->format('d/m/Y')}}</span></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:6.25pt;margin-right:  5.95pt;margin-bottom:.0001pt;margin-left:0cm;text-align:  right;'>
              <span style="font-size:11px;">{{\Carbon\Carbon::createFromFormat('Y-m-d',$job->date)->format('My')}}</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:9px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 76.95pt;border: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:9.25pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>Period</span></strong></p>
          </td>
          <td
            style="width: 46.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:1.1pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span
                  style='font-size:11px;font-family:"Arial",sans-serif;'>YTD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong>
            </p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:9px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 86.2pt;border: none;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:14.8pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>Period&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></strong></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:1.05pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>YTD&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></strong></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.5pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:99.6pt;line-height:8.9pt;'>
              <strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period</span></strong><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; </span><strong><span style='font-size:11px;font-family:"Arial",sans-serif;'>YTD</span></strong>
            </p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;line-height:8.45pt;'>
              <span style="font-size:11px;">Regular</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:17.85pt;line-height:8.45pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;&nbsp;
                  &nbsp;</span></u><u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp;
                  &nbsp;</span></u><u>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                  style="font-size:11px;">{{$month_pay}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                  &nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></u><u><span
                  style="font-size:11px;">&nbsp;&nbsp;{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;</span></u></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.1pt;line-height:8.45pt;'>
              <span style="font-size:11px;">CPP</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:14.45pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">{{$CPPTax}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span></p>
          </td>
          


          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:.9pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">{{$CPPTax_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.15pt;line-height:8.45pt;'>
              <span style="font-size:11px;">Gross&nbsp;Pay</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.85pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:.4pt;margin-right:.65pt;margin-bottom:.0001pt;margin-left:0cm;text-align:right;line-height:8.45pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$month_pay}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;</span><span style="font-size:11px;">{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">EI</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:14.45pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$ELTax}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;text-align:right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$ELTax_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Withheld</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.75pt;text-align:  right;line-height:8.35pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; </span></u><u><span
                  style="font-size:11px;">{{$withheld}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span></u><u><span style="font-size:11px;">{{$withheld_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span></u></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Gross&nbsp;Pay</span></p>
          </td>
          <td style="width: 76.95pt;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:8.7pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$month_pay}}&nbsp;  </span></p>
          </td>
          <td
            style="width: 46.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.7pt;text-align:right;line-height:8.35pt;'>
              <span style="font-size:11px;">&nbsp;&nbsp;{{$month_pay_total}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Tax</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:21.55pt;line-height:8.35pt;'>
              <u><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                  &nbsp;&nbsp;</span></u><u><span style="font-size:11px;">{{$Tax}}</span></u><u><span
                  style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp;</span></u><u><span style="font-size:11px;">&nbsp; &nbsp;&nbsp; {{$Tax_total}}</span></u></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.35pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:8.35pt;'>
              <span style="font-size:11px;">Net&nbsp;Pay</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 9.3pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.65pt;text-align:  right;line-height:8.35pt;'>
              <span style="font-size:11px;">{{$net_pay}}</span><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="font-size:11px;">{{$net_pay_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td style="width: 52.95pt;border: none;padding: 0cm;height: 14pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.1pt;line-height:9.1pt;'>
              <span style="font-size:11px;">Withheld</span></p>
          </td>
          <td style="width: 86.2pt;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:14.35pt;text-align:  right;line-height:9.1pt;'>
              <span style="font-size:11px;">{{$withheld}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td
            style="width: 40.8pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-right:.8pt;text-align:right;line-height:9.1pt;'>
              <span style="font-size:11px;">{{$withheld_total}}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span></p>
          </td>
          <td style="width: 70.95pt;border: none;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:2.15pt;line-height:9.1pt;'>
              <span style="font-size:11px;">EI&nbsp;Insurable&nbsp;Hours</span></p>
          </td>
          <td
            style="width: 109.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0cm;height: 14pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-left:33.85pt;line-height:9.1pt;'>
              <span style="font-size:11px;">80.00</span></p>
          </td>
        </tr>
        <tr>
          <td
            style="width: 56.65pt;border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: none;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 123.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td
            style="width: 52.95pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 127pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;'><span
                style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          </td>
          <td colspan="2"
            style="width: 180.7pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;height: 126.65pt;vertical-align: top;">
            <p
              style='margin:0cm;font-size:15px;font-family:"Arial MT",sans-serif;margin-top:4.6pt;margin-right:0cm;margin-bottom:.0001pt;margin-left:2.15pt;'>
              <span style="font-size:11px;">Regular: 80.00 @ 20.00/Hr</span></p>
          </td>
        </tr>
      </tbody>
    </table>
   
</body>

</html>