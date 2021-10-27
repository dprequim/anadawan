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
  margin-top: 0px;
}
.td1{
  width: 25%;
  text-align: center;
  border-bottom: 1px solid;
}
.td2{
  text-align: center;
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
.tables1{
  width: 100%;
  border: 0px;
  margin-top: 10px;

}
.tables2{
  width: 100%;
  border: 1px solid black;
}
.tables3{
  width: 100%;
  border: 0px;
  margin-top: 0px;
  
}
.footer{
  margin-top: 150px;
}

</style>
</head>

<body >


<center>
<div class="row" >
<table class="tables" >
  <tr>
    <td class="td5" colspan="5"></td>
  </tr>
  <tr>
    <td class="td8">{{Carbon\Carbon::now()->format('m/d/Y')}}</td>
    <td class="td2" colspan="2" align="center">DEPARTMENT OF EDUCATION</td>
    <td class="td6" style="visibility:hidden">Page No. 1</td>
  </tr>
</table>
</center>
  <div class="header2">
  
  PAYROLL REGISTER<br>
  REGULAR SALARY<br>
  For the Pay Period Ending  {{  Carbon\Carbon::parse($date)->endOfMonth()->format('F j, Y') }}<br><br><br>
   
  </div>
<center>
<table class="tables">
    <tr>
      <td align="left" valign="top"><b>REGION : 11 REGION XI - DAVAO REGION</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>DIVISION : 087 DAVAO CITY </b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>SCHOOL :  {{ isset($school) ? $school->school_name : '' }}</b></td>
      <td align="left" valign="top"><b>Month Issued {{Carbon\Carbon::createFromFormat('m',$month)->format('F')}}, {{Carbon\Carbon::parse($year)->format('Y')}}</b></td>
    </tr>

  </table>
  <table class="tables">
     <tr>
      <td valign="top"><b><br>EMPLOYEE NUMBER</b></td>
      <td valign="top"><b><br>NAME OF EMPLOYEE</b></td>
      <td align="center" valign="top"><b><br>POS CODE</b></td>
      <td align="center" valign="top"><b><br>SALARY GRD</b></td>
      <td align="center" valign="top"><b><br>STEP</b></td>
      <td align="center" valign="top"><b><br>MONTHLY SALARY</b></td>
      <td align="center" valign="top"><b><br>P.E.R.A.</b></td>
      <td align="center" valign="top"><b><br>TOTAL DEDUCTIONS</b></td>
      <td align="center" valign="top"><b><br>NET AMOUNT</b></td>
      <td align="center" valign="top"><b><br>ACCOUNT NUMBER</b></td>
      <td align="center" valign="top"><b><br>SIGNATURE OF PAYEE</b></td>
    </tr>

    

    
    @foreach($payroll as $key => $item)
    <tr>
      <td valign="top"><b><br>{{ $item->employee_no }}</b></td>
      <td valign="top"><b><br>{!! htmlentities($item->first_name, null, 'utf-8') !!} 
      {!! htmlentities(substr($item->middle_name,0,1).'.', null, 'utf-8') !!} {!!  htmlentities($item->last_name, null, 'utf-8') !!} 
      {{ $item->extension_name == 'NONE' || $item->extension_name == 'none' || $item->extension_name == 'N/A' 
      || $item->extension_name == 'n/a' || $item->extension_name == 'N/a' || $item->extension_name == 'None' ? '' : $item->extension_name }}</b></td>
      <td align="center" valign="top"><b><br>{{ $item->position_code }}</b></td>
      <td align="center" valign="top"><b><br>{{ $item->salary_grade }}</b></td>
      <td align="center" valign="top"><b><br> {{ $item->step }}</b></td>
      <td align="center" valign="top"><b><br>{{ number_format($item->salary,2) }}</b></td>
      <td align="center" valign="top"><b><br>{{ number_format($item->pera,2) }}</b></td>
      <td align="center" valign="top"><b><br>{{ number_format($item->total_deductions,2) }}</b></td>
      <td align="center" valign="top"><b><br>{{ number_format($item->net_pay,2) }}</b></td>
      <td align="center" valign="top"><b><br>{{ $item->account_number }}</b></td>
      <td align="center" valign="top"><b><br>--------------------------</b></td>
    </tr>
      
    <tr>
      <td valign="top"><b></b></td>
      <td valign="top"><b>ITEMIZED DEDUCTIONS</b></td>
      <td align="center" valign="top"><b></b></td>
      <td align="center" valign="top"><b></b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>  
        @foreach($item->deductions as $key => $res)
        <tr>       
        <td valign="top"><b></b></td>
        <td valign="top"><b>{{ $res->deduction['code'] }} &nbsp;&nbsp;{{$res->deduction['description'] }}</b></td>
        <td align="center" valign="top"><b>{{ number_format($res->deduction_amount,2) }}</b></td>
        <td align="center" valign="top"><b></b></td>
        <td align="center" valign="top"><b></b></td>     
        </tr>
        @endforeach
    @endforeach
    
</center>
</div>
<div class="row">
 @include('pdf.payroll_slip_byschool_signature_page2')
 </div>
</body>

</html>