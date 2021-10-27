<!DOCTYPE html>
<html>
<head>
<style>

table {
 font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}
/*caption {
  text-align: center;
  color: silver;
  text-transform: uppercase;
  padding: 5px;
}*/

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
  margin-top: 50px;
}
.header2{
  text-align: center;
}
.logo1{
  float: left;
  width: 150px;
  height: 150px;
  margin-left: 50px;
  margin-top: 50px;
}
.logo2{
  float: right;
  width: 150px;
  height: 150px;
  margin-right: 50px;
  margin-top: 50px;
}
.tables{
  width: 100%;
  border: 0px;
  margin-top: 100px;
}
.td1{
  width: 10%;
  text-align: center;
  vertical-align: top;
}
.td2{
  width: 25%;
  text-align: center;
  border-bottom: 1px solid;
}
.td3{
  width: 30%;
  vertical-align: top;
}
.td4{
  text-align: center;
}
.td5{
  padding: 10px;
}
.td6{
  text-align: center;
  vertical-align: top;
}
.td7{
  text-align: center;
  border-bottom: 1px solid;
}
.td8{
  vertical-align: top;
}
.tables2{
  width: 100%;
  border: 1px solid black;
}
table.tables2>tbody>tr>td, table.tables2>tbody>tr>th {
  border: 1px solid black;
  padding: 1px;
}
.tables3{
  width: 100%;
}

.td10{
  width: 43%;
  vertical-align: 100%;
}
.tables4{
  width: 100%;
  border: 0px;
  margin-top: 200px;
}

</style>
</head>

<body>
<table id="testTable" summary="Code page support in different versions of MS Windows."
  rules="groups" frame="hsides" border="0" class="tables">

<div class="header">
  <img class="logo1" src="{!! public_path('images/kagawaran.png') !!}">
  <img class="logo2" src="{!! public_path('images/davaocity.png') !!}">
</div>
  <div class="header2">
  Republika ng Pilipinas<br>
  Kagawaran ng Edukasyon<br>
  Rehiyon XI<br>
  <h4>SANGAY NG LUNGSOD NG DABAW</h4>
  Lungsod ng Dabaw
  <h2><b>SERVICE RECORD</b></h2>
  ( To be accomplished by the employer)
  </div>
<center>
<table class="tables">
  <tr>
    <td class="td1" rowspan="2">Name:</td>
    <td class="td2">{!! htmlentities($employee_details->last_name, null, 'utf-8') !!}</td>
    <td class="td2">{!! htmlentities($employee_details->first_name, null, 'utf-8') !!}</td>
    <td class="td2">{{ $employee_details->middle_initial }}</td>
    <td class="td3" rowspan="2">(If married woman, given also full maiden name)</td>
  </tr>
  <tr>
    <td class="td4"><small>(Surname)</small></td>
    <td class="td4"><small>(Given name)</small></td>
    <td class="td4"><small>(M.I.)</small></td>
  </tr>
  <tr>
    <td class="td5" colspan="5"></td>
  </tr>
  <tr>
    <td class="td6" align="center" valign="top" rowspan="2">Birth:</td>
    <td class="td7">{{ $employee_details->birthdate }}</td>
    <td class="td7" colspan="2" align="center" style="border-bottom: 1px solid">{{ $employee_details->place_of_birth }}</td>
    <td class="td8" rowspan="2">(Date herein should be checked from birth or baptismal certificate or some other reliable documents)</td>
  </tr>
  <tr>
    <td class="td4"><small>(Date)</small></td>
    <td class="td4" colspan="2"><small>(Place)</small></td>
  </tr>
</table>
<!-- <div>
<p> &nbsp; This is to certify the employee named herein above actually rendered services in the office as shown by the service record below, each line which is <br>supported by appointment and  other papers actually issued by this office and approved by the authorites concerned.</p>
</div> -->

<table class="tables2">
  <col>
  <colgroup span="2"></colgroup>
  <colgroup span="2"></colgroup>
  <tr>
    <th colspan="2" scope="colgroup">SERVICE</th>
    <td rowspan="2" colspan="3" scope="colgroup"><b> &nbsp; RECORD OF APPOINTMENT </b></td>
    <th colspan="1" scope="colgroup">OFFICE ENTITY</th>
    <td rowspan="3"> &nbsp; <b>Branch</b></td>
    <td rowspan="2" colspan="2" scope="colgroup"><b> &nbsp;Leave of Absence<br>w/out Pay</b></td>
    <td rowspan="2" colspan="2" scope="colgroup"><b> &nbsp;Separation </b></td>
    <td rowspan="3"> &nbsp; <b>Step <br> Increment</b></td>
    <td rowspan="3"> &nbsp; <b>REMARKS</b></td>
  </tr>
  <tr>
     <th colspan="2" scope="colgroup">Inclusive Dates</th>
     <td rowspan="2"><b> &nbsp; &nbsp;Station/Place of Assignment</b></td>
  </tr>
  <tr>
    <th scope="col">From</th>
    <th scope="col">&nbsp;To &nbsp;</th>
    <th scope="row">Designation</th>
    <th scope="row">Status</th>
    <th scope="row">Salary</th>
    <th scope="col">From</th>
    <th scope="col">&nbsp;To &nbsp;</th>
    <th scope="col">Date</th>
    <th scope="col">Cause</th>
  </tr>

    @foreach($service_records as $record)
<tr>
  <th scope="col">{{ $record->inclusive_date_from }}</th>
  <th scope="col">{{ $record->inclusive_date_to }}</th>
  <th scope="row">{{ $record->designation }}</th>
  <th scope="row">{{ $record->status }}</th>
  <th scope="row">{{ $record->salary }}</th>
  <th scope="row">{{ $record->station_place }}</th>
  <th scope="row">{{ $record->branch }}</th>
  <th scope="col">{{ $record->wout_pay_from }}</th>
  <th scope="col">{{ $record->wout_pay_to }}</th>
  <th scope="col">{{ $record->separation_date }}</th>
  <th scope="col">{{ $record->separation_cause }}</th>
  <th scope="col">{{ $record->step_increment }}</th>
  <th scope="row">ED#1219</th>
</tr>
      @endforeach

</table>
</center>
<table class="tables3">
  <tr>
    <td class="td12">
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued in compliance with Executive Order No.54 dated August 10, 1954 and in accordance with Circular No.58 dated <br>August 10,1954 of the system:</p>
    </td>
  </tr>

<div class="footer">
  <table class="tables4">
    <tr>
      <td align="left" valign="top">  Prepared by:<br><br> 
        <b>ADRIAN M. CARCUEVA</b><br>
        Administrative Assistant II <br><br> 
        Printed: 09/10/2019<br>
        Updated: 09/10/2019
      </td>
      <td align="left" valign="top">  Certified Correct:<br><br>
        <b>ROMEL L. TAMBIS</b><br>
        Administrative Officer IV
      </td>
    </tr>
  </table>
</div>

</body>
</html>