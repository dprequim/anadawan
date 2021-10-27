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
.td1{
  width: 25%;
  text-align: center;
  border-bottom: 1px solid;
}
.td2{
  text-align: center;
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
.tables4{
  width: 70%;
  border: 0px;
  margin-top: 0px;
}
.tables1{
  width: 100%;
  border: 0px;
  margin-top: 3px;
}
.tables2{
  width: 100%;
  border: 0px;
  margin-top: 0px;
}
.footer1{
  margin-top: 50px;
}

</style>
</head>

<body>

<center>
<table>
  <tr>
    <td class="td5" colspan="5"></td>
  </tr>
</table>
</center>

<center>
  <div class="header2">
  
  <br><br><b>***** SCHOOL TOTAL *****</b><br>
  </div>
  <table class="tables4">
     <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br>NUMBER OF PAYEES</b></td>
      <td align="center" valign="top"><b><br>{{ count($payroll) }}</b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>BASIC SALARY</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_salary,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>P.E.R.A.</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_pera,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br>TOTAL COMPENSATION</b></td>
      <td align="center" valign="top"><b><br>{{ number_format($total_compe,2) }}</b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>TOTAL DEDUCTIONS</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_deduction,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>NET SALARY</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_netpay,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br>GOVERNMENT SHARE</b></td>
      <td align="center" valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>GSIS LIFE & RET</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_gsis,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>PHILHEALTH (MEDICARE)</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_medicare,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>PAG - IBIG</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_pagibig,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>EMPLOYEES COMPENSATION</b></td>
      <td align="center" valign="top"><b>{{ number_format($total_ec,2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>TOTAL GOVERNMENT SHARE</b></td>
      <td align="center" valign="top"><b>{{ number_format(($total_gsis + $total_medicare + $total_pagibig + $total_ec),2) }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
  @foreach($deductions as $key => $item)
    @foreach($item as $res)
    @php
            $total = isset($res['total_deduction']) ? $res['total_deduction'] : 0;
    @endphp
    @endforeach
    <tr>
        <td align="center" valign="top"><b>{{ $res['code'] }}</b></td>
        <td valign="top"><b>{{ $res['description'] }}</b></td>
        <td align="center" valign="top"><b>{{ number_format($total,2) }}</b></td>
        <td align="center" valign="top"><b></b></td>
    </tr>
     @endforeach
  </table>
    <footer class="footer1">
      <table class="tables1">
    <tr>
      <td align="left" valign="top"><b>ACCOUNTING CONTROL ON:</b></td>
      <td align="center" valign="top"><b> CERTIFIED:</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b><br>DEDUCTIONS FOR REMITTANCE TO THE</b></td>
      <td align="center" valign="top" ><b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      1. SUPPORTIVE DOCUMENTS COMPLETE AND PROPER</b></td>
    </tr>
    <tr>
      <td align="left" valign="top" ><b>GSIS, BIR, PAG-IBIG, PHILHEALTH, PPSTA</b></td>
      <td align="center" valign="top" ><b>2. CASH AVAILABLE</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>OTHER PRIVATE INSURANCE COMPANIES</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>AND SAVINGS & LOAN ASSOCIATIONS</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PER CIRCULAR LETTER NO. 90-22</b></td>
      
    </tr>
    <tr>
      <td align="left" valign="top"><b></b></td>
    </tr>
      </table>
    </footer>
</center>
</body>
</html>