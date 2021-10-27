<!DOCTYPE html>
<html>
<head>
  <style>

    table {
     font-family: Arial, Helvetica, sans-serif;
     border-collapse: collapse;
   }

   thead {
    background: SteelBlue;
    color: white;
  }
  th,
  td {
    padding: 2px;
  }
  hr{
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
  }
  header{
    margin-top: 10px;
  }
  .header2{
    text-align: center;
  }
  .tables{
    width: 100%;
    border: 0px;
  }
  .td2{

  }
  .td1{
    width: 25%;
    text-align: center;
    border-bottom: 1px solid;
  }
  .td3{
    text-align: right;
    border-bottom: 1px solid;
  }
  .td4{
    text-align: center;
  }
  .td5{
    padding: 10px;
  }
  .td6{
    text-align: right;
    vertical-align: top;
  }
  .td7{
    text-align: left;
    border-bottom: 1px solid;
  }
  .td9{
    text-align: left;
    border-bottom: 1px solid;
  }
  .td8{
    vertical-align: top;
  }
  .tables3{
    width: 100%;
  }
  .td10{
    width: 43%;
    vertical-align: 100%;
  }
  .tables1{
    width: 100%;
    border: 0px;
    margin-top: 10px;
  }
  .footer{
    margin-top: 70px;
  }
</style>
</head>
@foreach($retval as $key => $item)
<body>

  <div class="header2">
    Republic of the Philippines<br>
    DEPARTMENT OF EDUCATION<br>
    OFFICIAL PAYROLL SLIP<br><br>
  </div>
  <table class="tables">
    <tr>
      <td class="td1"></td>
      <td class="td1"></td>
      <td class="td1"></td>
      <td class="td1"></td>
    </tr>
    <tr>
      <td class="td5" colspan="5"></td>
    </tr>
    <tr>
      <td class="td9">{{Carbon\Carbon::now()->format('m/d/Y')}}</td>
      <td class="td2" colspan="2" align="center" style="border-bottom: 1px solid">For the Month of {{Carbon\Carbon::createFromFormat('m',$month)->format('F')}}, {{Carbon\Carbon::parse($year)->format('Y')}}</td>
      <td class="td6">Page {{ $key + 1  }} of {{ count($retval)  }}</td>
    </tr>
    <tr>
      <td class="td4"><small></small></td>
      <td class="td4"><small></small></td>
      <td class="td4" colspan="2"><small></small></td>
    </tr>
  </table>

  <table class="tables1">
    <tr>
      <td align="left" valign="top"><b>Name: {!! htmlentities($item->first_name, null, 'utf-8') !!} 
        {!! htmlentities(substr($item->middle_name,0,1).'.', null, 'utf-8') !!} {!!  htmlentities($item->last_name, null, 'utf-8') !!} 
        {{ $item->extension_name == 'NONE' || $item->extension_name == 'none' || $item->extension_name == 'N/A' 
        || $item->extension_name == 'n/a' || $item->extension_name == 'N/a' || $item->extension_name == 'None' ? '' : $item->extension_name }}</b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b>Reg: 11 REGION XI - DAVAO REGION</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Employee No: {{ $item->employee_no }}</b>
      </td>
      <td align="left" valign="top"><b>Account No: {{ $item->account_number }}</b>
      </td>
      <td align="" valign="top"><b>Div: 087 DAVAO {{ $item->school_type == 'Elementary School' ? 'ELEM.' : 'SECONDARY' }} </b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Date of Hiring: {{ $item->hiring_date }} </b>
      </td>
      <td align="left" valign="top"><b>Date of Retirement: {{ $item->retirement_date }}</b>
      </td>
      <td align="" valign="top"><b>Sta: {{ $item->school_type == 'Elementary School' ?  $item->district : $item->school_name }}</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Position: {{ $item->position_code }} {{ $item->position }} </b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b>Basic Salary: {{ number_format($item->salary,2) }}</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Grade: {{ $item->salary_grade }}</b>
      </td>
      <td align="left" valign="top"><b>Step: {{ $item->step }}</b>
      </td>
      <td align="" valign="top"><b>P.E.R.A. : {{ number_format($item->pera,2) }}</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b style="visibility:hidden;">Tax Code: </b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b></b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b>Gross Compensation: {{ number_format($item->salary + $item->pera,2) }}</b>
      </td>
    </tr>
  </table>

  <table class="tables">
    <tr>
      <td class="td1"></td>
      <td class="td1"></td>
      <td class="td1"></td>
      <td class="td1"></td>
    </tr>
    <tr>
      <td class="td5" colspan="5"></td>
    </tr>
    <tr>
      <td class="td3">DEDUCTION</td>
      <td class="td3"></td>
      <td class="td3">UNDEDUCTED</td>
      <td class="td7">OBLIGATIONS</td>
    </tr>
    <tr>
      <td class="td4"><small></small></td>
      <td class="td4"><small></small></td>
      <td class="td4" colspan="2"><small></small></td>
    </tr>
  </table>
  <div style="display: inline-block; width:100%;" >
    <table style="display: inline-table ;  float: left; width: 50%;">
      <tr>
        <td align="left" valign="top"><b>&nbsp;&nbsp;&nbsp;&nbsp;Deduction</b></td>
        <td align="left" valign="top"><b>Effectivity Date</b></td>
        <td align="" valign="top"><b>Termination Date</b></td>
        <td align="" valign="top"><b>Amount of Deduction</b></td>
      </tr>
      <tr>
        <td align="left" valign="top"><b>Code &nbsp;Description</b></td>
        <td align="left" valign="top"></td>
        <td align="" valign="top"></td>
        <td align="" valign="top"></td>
      </tr>

      @foreach($item->deductwithnull as  $key => $null)
      <tr>
        <td align="left" valign="top"><b>{{ $null->deduction['code'] }} &nbsp;&nbsp;{{$null->deduction['description'] }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($null->deduction['effectivity_date']) ? '----  ------' : Carbon\Carbon::parse($null->deduction['effectivity_date'])->format('m Y') }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($null->deduction['termination_date']) ? '----  ------' : Carbon\Carbon::parse($null->deduction['termination_date'])->format('m Y') }}</b></td>
        <td align="left" valign="top"><b>{{ number_format($null->deduction_amount,2) }}</b></td>
      </tr>
      @endforeach

      <tr>
        <td align="left" valign="top"><b>{{ $item->current_absences['code'] }} &nbsp;&nbsp;{{$item->current_absences['description'] }}</b></td>
        <td align="left" valign="top"><b>{{ $item->current_absences['effectivity_date'] != null ? $item->current_absences['effectivity_date'] : $item->current_absences['termination_date'] }}</b></td>
        <td align="left" valign="top"><b>{{ $item->current_absences['termination_date'] }}</b></td>
        <td align="left" valign="top"><b>{{ number_format($item->current_absences['deduction_amount'],2) }}</b></td>
      </tr>

      @foreach($item->termination as  $key => $term)
      <tr>
        <td align="left" valign="top"><b>{{ $term->deduction['code'] }} &nbsp;&nbsp;{{$term->deduction['description'] }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($term->deduction['effectivity_date']) ? '----  ------' : Carbon\Carbon::parse($term->deduction['effectivity_date'])->format('m Y') }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($term->deduction['termination_date']) ? '----  ------' : Carbon\Carbon::parse($term->deduction['termination_date']->format('m Y')) }}</b></td>
        <td align="left" valign="top"><b>{{ number_format($term->deduction_amount,2) }}</b></td>
      </tr>
      @endforeach

      @foreach($item->deductions as  $key => $ded)
      <tr>
        <td align="left" valign="top"><b>{{ $ded->deduction['code'] }} &nbsp;&nbsp;{{$ded->deduction['description'] }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($ded->deduction['effectivity_date']) ? '----  ------' : Carbon\Carbon::parse($ded->deduction['effectivity_date'])->format('m Y') }}</b></td>
        <td align="left" valign="top"><b>{{ is_null($ded->deduction['termination_date']) ? '----  ------' : Carbon\Carbon::parse($ded->deduction['termination_date'])->format('m Y') }}</b></td>
        <td align="left" valign="top"><b>{{ number_format($ded->deduction_amount,2) }}</b></td>
      </tr>
      @endforeach  

      <tr>
        <td align="left" valign="top"><b><br>Total Deduction:</b></td>
        <td align="left" valign="top"><b></b></td>
        <td align="left" valign="top"><b></b></td>
        <td align="left" valign="top"><b><br>{{ number_format($item->total_deductions,2) }}</b></td>
      </tr>
      <tr>
        <td align="left" valign="top"><b><br>Net Pay:</b></td>
        <td align="left" valign="top"><b></b></td>
        <td align="left" valign="top"><b></b></td>
        <td align="left" valign="top"><b><br>{{ number_format($item->net_pay,2) }}</b></td>
      </tr>
    </table>

    <table style="display: inline-table ; width: 50%;">
      <tr>
        <td align="" valign="top"><b>&nbsp;&nbsp;&nbsp;&nbsp;Deduction</b></td>
        <td align="" valign="top"><b>Effectivity Date</b></td>
        <td align="" valign="top"><b>Termination Date</b></td>
        <td align="" valign="top"><b>Amount of Deduction</b></td>
      </tr>
      <tr>
        <td align="" valign="top"><b>Code &nbsp;Description</b></td>
        <td align="" valign="top"></td>
        <td align="" valign="top"></td>
        <td align="" valign="top"></td>
      </tr>
      @foreach($item->undeducted as  $key =>  $res)
      <tr>
        <td align="" valign="top"><b>{{ $res->deduction['code'] }} &nbsp;&nbsp;{{$res->deduction['description'] }}</b></td>
        <td align="" valign="top"><b>{{ is_null($res->deduction['effectivity_date']) ? '----  ------' : Carbon\Carbon::parse($res->deduction['effectivity_date'])->format('m Y') }}</b></td>
        <td align="" valign="top"><b>{{ is_null($res->deduction['termination_date']) ? '----  ------' : Carbon\Carbon::parse($res->deduction['termination_date'])->format('m Y') }}</b></td>
        <td align="" valign="top"><b>{{ number_format($res->deduction_amount,2) }}</b></td>
      </tr>
      @endforeach
      @foreach($item->undeducted_null_termination as  $key =>  $res)
      <tr>
        <td align="" valign="top"><b>{{ $res->deduction['code'] }} &nbsp;&nbsp;{{$res->deduction['description'] }}</b></td>
        <td align="" valign="top"><b>{{ is_null($res->deduction['effectivity_date']) ? '----  ------' : Carbon\Carbon::parse($res->deduction['effectivity_date'])->format('m Y') }}</b></td>
        <td align="" valign="top"><b>{{ is_null($res->deduction['termination_date']) ? '----  ------' : Carbon\Carbon::parse($res->deduction['termination_date'])->format('m Y') }}</b></td>
        <td align="" valign="top"><b>{{ number_format($res->deduction_amount,2) }}</b></td>
      </tr>
      @endforeach
    </table>
  </div>  
<div style="display: flex; justify-content: center; 
  align-items: center; margin-top:10%;" >

  <div  style="display: inline-block ; float:right;  margin-right:100px;">
     <div class= "container container--fluid">
       <div style="border: 1px dotted rgb(181,179,179); width:450px; ">
        <p style="text-align:center;">New Obligation</p>
        <p style="text-align:center;">(To be filled by GFI/FLI)</p>
      </div>
      <div style="border: 1px dotted rgb(181,179,179); width:450px; ">
        <p style="margin-left:5px;">ORGANIZATION:</p>
        <p style="margin-left:5px;">TYPE:</p>
        <p style="margin-left:5px;">AMOUNT LOANED:</p>
        <p style="margin-left:5px;">MONTHLY AMORTIZATION:
        </p>
      </div>
    </div>
  </div>
  <div  style="display: inline-block ; float:right;  margin-right:100px;">
   <div class= "container container--fluid">
     <div style="border: 1px dotted rgb(181,179,179); width:450px; ">
      <p style="text-align:center;">Monthly Home Income</p>
      </div>
      <div style="border: 1px dotted rgb(181,179,179); width:450px; ">
        <img height="180px" width="455px" src="{{ $item->charts }}">
      </p>
      </div>
    </div>
    </div>
</div>

<footer class="footer" style="width:100%; text-align: left; margin-left:25%;  page-break-after: always;"  >
  <p><b> 1. Report and Request in writing the delition of any invalid deductions to your Payroll Service Unit.<br>
    2. Settle any undeducted Oligation(s) directly with the concerned entity(ies) to avoid penalties, etc. <br></b></p>
  </footer>
</body>
@endforeach

</html>