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
  width: 15%;
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

<body>
<table id="testTable" summary="Code page support in different versions of MS Windows."
  rules="groups" frame="hsides" border="0" class="tables">

<table class="tables1">
    <tr>
      <td valign="top"><b>COMPULSORY PREMIUMS - CURRENT</b></td>
    </tr>
    <tr>
      <td valign="top"><b>Office: DEPED REGIONAL OFFICE 11 TORRES ST DAVAO CTY</b></td>
    </tr>
    <tr>
      <td valign="top"><b>DIVISION: 087 DAVAO CITY</b></td>
    </tr>
    <tr>
      <td valign="top"><b>Remittance Month: {{$date}}</b></td>
    </tr>
  </table>
<center>
  <table class="tables">
     <tr>
      <td valign="top"><b><br>Employee Name</b></td>
      <td valign="top"><b><br>Policy No.</b></td>
      <td valign="top"><b><br>Salary / Month</b></td>
      <td valign="top"><b><br>PS</b></td>
      <td valign="top"><b><br>GS</b></td>
      <td valign="top"><b><br>EC</b></td>
      <td valign="top"><b><br>EHP</b></td>
    </tr>
  <tr>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
  </tr>
    @foreach($data as $item)
  <tr>
      <td valign="top"><b><br>
                            {!! $item->employee_id->last_name != null ?
                              htmlentities($item->employee_id->last_name, null, 'utf-8') : ''
                            !!},
                            {!! $item->employee_id->first_name != null ?
                              htmlentities($item->employee_id->first_name, null, 'utf-8') : ''
                            !!} 
                            {{ $item->employee_id->middle_name != null ?
                              substr($item->employee_id->middle_name,0,1).'.' : ''
                            }}</b></td>

      <td valign="top"><b><br>
                            {{ $item->deduction->policy_number != null ?
                                $item->deduction->policy_number : '' }}</b></td>
      <td valign="top"><b><br>
                            {{ isset($item->payroll) ?
                                number_format($item->payroll->salary,2) : '' }}</b></td>
      <td valign="top"><b><br>
                            {{ number_format($item->deduction_amount,2) != null ?
                                number_format($item->deduction_amount,2) : '' }}</b></td>
      <td valign="top"><b><br>
                            {{ number_format($item->gs,2) != null ?
                                number_format($item->gs,2) : ''}}</b></td>
      <td valign="top"><b><br>
                            {{ number_format($item->ec,2) != null ?
                                number_format($item->ec,2) : ''}}</b></td>
      <td valign="top"><b><br>
                            {{ number_format($item->ehp,2) != null ?
                                number_format($item->ehp,2) : ''}}</b></td>
  </tr>
    @endforeach
   <tr>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
  </tr>
     <tr>
      <td valign="top"><b><br>PAGE TOTALS</b></td>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br>{{ $total_ps }}</b></td>
      <td valign="top"><b><br>{{ $total_gs }}</b></td>
      <td valign="top"><b><br>{{ $total_ec }}</b></td>
      <td valign="top"><b><br>{{ $total_ehp }}</b></td>
    </tr>
  <tr>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
  </tr>
</table>
</center>





</body>
</html>