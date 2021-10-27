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
  margin-top: 100px;
}
</style>
</head>

<body>
<!-- <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel" /> -->
<table id="testTable" summary="Code page support in different versions of MS Windows."
  rules="groups" frame="hsides" border="0" class="tables">

  <div class="header2">
  Republic of the Philippines<br>
  DEPARTMENT OF EDUCATION<br>
  OFFICIAL PAYROLL SLIP<br><br>
  </div>
<center>
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
    <td class="td6" style="visibility:hidden;">Page 1 of 1</td>
  </tr>
  <tr>
    <td class="td4"><small></small></td>
    <td class="td4"><small></small></td>
    <td class="td4" colspan="2"><small></small></td>
  </tr>
</table>

<table class="tables1">
    <tr>
      <td align="left" valign="top"><b>Name: {!! htmlentities($data->user_name, null, 'utf-8') !!}</b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b>Reg: 11 REGION XI - DAVAO REGION</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Employee No: {{ $data->employee_no }}</b>
      </td>
      <td align="left" valign="top"><b>Account No: {{ $data->account_number }}</b>
      </td>
      <td align="" valign="top"><b>Div: 087 DAVAO {{ $school->shcool_type == 'Elementary School' ? 'ELEM.' : 'SECONDARY' }} </b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Date of Hiring: {{ $data->hiring_date }} </b>
      </td>
      <td align="left" valign="top"><b>Date of Retirement: {{ $data->retirement_date }}</b>
      </td>
      <td align="" valign="top"><b>Sta: {{ isset($school) ? ($school->school_type == 'Elementary School' ?  $school->district : $school->school_name) : '' }}</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Position: {{ $position->position_code }} {{ $promotion->position }}</b>
      </td>
      <td align="left" valign="top"><b></b>
      </td>
      <td align="" valign="top"><b>Basic Salary: {{ number_format($promotion->salary,2) }}</b>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>Grade: {{ $promotion->salary_grade }}</b>
      </td>
      <td align="left" valign="top"><b>Step: {{ $promotion->step }}</b>
      </td>
      <td align="" valign="top"><b>P.E.R.A. : {{ number_format($data->pera,2) }}</b>
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
      <td align="" valign="top"><b>Gross Compensation: {{ number_format($promotion->salary + $data->pera,2) }}</b>
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

    @foreach($payroll_deduction_with_null as $key => $item)
    <tr>
      <td align="left" valign="top"><b>{{ $item->deduction->code }} &nbsp;&nbsp;{{$item->deduction->description }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->effectivity_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->effectivity_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->termination_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->termination_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ number_format($item->deduction_amount,2) }}</b></td>
    </tr>
    @endforeach

  
    <tr>
      <td align="left" valign="top"><b>{{ $current_absences['code'] }} &nbsp;&nbsp;{{$current_absences['description'] }}</b></td>
      <td align="left" valign="top"><b>{{ $current_absences['effectivity_date'] != null ? $current_absences['effectivity_date'] : $current_absences['termination_date'] }}</b></td>
      <td align="left" valign="top"><b>{{ $current_absences['termination_date'] }}</b></td>
      <td align="left" valign="top"><b>{{ number_format($current_absences['deduction_amount'],2) }}</b></td>
    </tr>


    @foreach($payroll_deduction_with_null_termination as $key => $item)
    <tr>
      <td align="left" valign="top"><b>{{ $item->deduction->code }} &nbsp;&nbsp;{{$item->deduction->description }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->effectivity_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->effectivity_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->termination_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->termination_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ number_format($item->deduction_amount,2) }}</b></td>
    </tr>
    @endforeach

    @foreach($payroll_deduction as $key => $item)
    <tr>
      <td align="left" valign="top"><b>{{ $item->deduction->code }} &nbsp;&nbsp;{{$item->deduction->description }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->effectivity_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->effectivity_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ is_null($item->deduction->termination_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->termination_date)->format('m Y') }}</b></td>
      <td align="left" valign="top"><b>{{ number_format($item->deduction_amount,2) }}</b></td>
    </tr>
    @endforeach
    
   
    <tr>
      <td align="left" valign="top"><b><br>Total Deduction:</b></td>
      <td align="left" valign="top"><b></b></td>
      <td align="left" valign="top"><b></b></td>
      <td align="left" valign="top"><b><br>{{ number_format(round($current_absences['deduction_amount'],2) + round($payroll_deduction_with_null_termination->sum('deduction_amount'),2) + round($payroll_deduction->sum('deduction_amount'),2) + round($payroll_deduction_with_null->sum('deduction_amount'),2),2) }}</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b><br>Net Pay:</b></td>
      <td align="left" valign="top"><b></b></td>
      <td align="left" valign="top"><b></b></td>
      <td align="left" valign="top"><b><br>{{ number_format(round($promotion->salary,2) + round($data->pera,2) - (round($current_absences['deduction_amount'],2) + round($payroll_deduction_with_null_termination->sum('deduction_amount'),2) + round($payroll_deduction->sum('deduction_amount'),2) + round($payroll_deduction_with_null->sum('deduction_amount'),2)),2) }}</b></td>
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
    @foreach($payroll_deduction_undeducted as $key => $item)
    <tr>
      <td align="" valign="top"><b>{{ $item->deduction->code }} &nbsp;&nbsp;{{$item->deduction->description }}</b></td>
      <td align="" valign="top"><b>{{ is_null($item->deduction->effectivity_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->effectivity_date)->format('m Y') }}</b></td>
      <td align="" valign="top"><b>{{ is_null($item->deduction->termination_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->termination_date)->format('m Y') }}</b></td>
      <td align="" valign="top"><b>{{ number_format($item->deduction_amount,2) }}</b></td>
    </tr>
    @endforeach
    @foreach($undeducted_with_null_termination as $key => $item)
    <tr>
      <td align="" valign="top"><b>{{ $item->deduction->code }} &nbsp;&nbsp;{{$item->deduction->description }}</b></td>
      <td align="" valign="top"><b>{{ is_null($item->deduction->effectivity_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->effectivity_date)->format('m Y') }}</b></td>
      <td align="" valign="top"><b>{{ is_null($item->deduction->termination_date) ? '----  ------' : Carbon\Carbon::parse($item->deduction->termination_date)->format('m Y') }}</b></td>
      <td align="" valign="top"><b>{{ number_format($item->deduction_amount,2) }}</b></td>
    </tr>
    @endforeach
		</table>
 </div>  
<div style="display: flex; justify-content: center; 
  align-items: center; margin-top:10%;" > 
 <div  style="display: inline-block ; float:right;  margin-right:50px; ">
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
 <div  style="display: inline-block ; float:right;  margin-right:180px;">
 <div class= "container container--fluid">
 <div style="border: 1px dotted rgb(181,179,179); width:450px; ">
<p style="text-align:center;">Monthly Home Income</p>
</div>
<div style="border: 1px dotted rgb(181,179,179); width:450px; ">
  <img height="200px" width="455px" src="{{ $chart }}">
 </div>
 </div>
 </div>
 </div>

<footer class="footer" style="width:100%; text-align: left; margin-left:25%; margin-top:100px;"  >
<p><b> 1. Report and Request in writing the delition of any invalid deductions to your Payroll Service Unit.<br>
  2. Settle any undeducted Oligation(s) directly with the concerned entity(ies) to avoid penalties, etc. <br></b></p>
</footer>
</body>

</html>