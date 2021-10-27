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
  border: 1px solid black;
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
table.tables>tbody>tr>td, table.tables>tbody>tr>th {
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

  <div class="header2">
  <p align="left">{{ $school->school_name }} <br> {{Carbon\Carbon::createFromFormat('m',$month)->format('F')}} {{Carbon\Carbon::parse($year)->format('Y')}} </p>
  </div>
<center>

<table class="tables">
  <col>
  <colgroup span="2"></colgroup>
  <colgroup span="2"></colgroup>
  <tr>
    <th colspan="5" scope="colgroup">FORM 7</th>
    <th colspan="4" scope="colgroup">WITHOUT PAY</th>
    <th colspan="11" scope="colgroup">WITH PAY</th>
    <th colspan="1" scope="colgroup"></th>
    <th colspan="2" scope="colgroup">WITHOUT PAY</th>
    <th colspan="2" scope="colgroup">WITH PAY</th>
    <th colspan="1" scope="colgroup"></th>
    <th colspan="2" scope="colgroup"></th>
  </tr>
  <tr>
    <th scope="col">NO.</th>
    <th scope="col">EMPNO</th>
    <th scope="row">LNAME</th>
    <th scope="row">FNAME</th>
    <th scope="row">POSITION</th>

    <th scope="col">SL</th>
    <th scope="col">PL</th>
    <th scope="col">ML</th>
    <th scope="col">TOTAL</th>

    <th scope="col">SL</th>
    <th scope="col">VL</th>
    <th scope="col">FL</th>
    <th scope="col">ML</th>
    <th scope="col">COC</th>
    <th scope="col">SpIL</th>
    <th scope="col">SCr.</th>
    <th scope="col">Solo</th>
    <th scope="col">PatL</th>
    <th scope="col">StuL</th>
    <th scope="col">TOTAL</th>

    <th scope="col">DATES OF ABSENT</th>

    <th scope="col">TARDY</th>
    <th scope="col"># TIMES</th>
    <th scope="col">TARDY</th>
    <th scope="col"># TIMES</th>

    <th scope="col">TOTAL MINUTES</th>
    <th scope="col">INCLUSIVE DATES TARDY/ UNDERTIME</th>
    <th scope="col">REMARKS</th>
  </tr>
@foreach($data as $key => $item)
<tr>
  <th scope="col">{{ $key +1 }}</th>
  <th scope="col">{{ $item->employee_no }}</th>
  <th scope="row">{!! htmlentities($item->employee->last_name, null, 'utf-8') !!}</th>
  <th scope="row">{!! htmlentities($item->employee->first_name, null, 'utf-8') !!}</th>
  <th scope="row">{{ $item->position }}</th>

  <th scope="row">{{ $item->sl_without_pay }}</th>
  <th scope="row">{{ $item->pl_without_pay }}</th>
  <th scope="col">{{ $item->ml_without_pay }}</th>
  <th scope="col">{{ $item->total_without_pay }}</th>

  <th scope="col">{{ $item->sl_with_pay }}</th>
  <th scope="col">{{ $item->vl_with_pay }}</th>
  <th scope="col">{{ $item->fl_with_pay }}</th>
  <th scope="row">{{ $item->ml_with_pay }}</th>
  <th scope="row">{{ $item->coc_with_pay }}</th>
  <th scope="row">{{ $item->spil_with_pay }}</th>
  <th scope="row">{{ $item->scr_with_pay }}</th>
  <th scope="row">{{ $item->solo_with_pay }}</th>
  <th scope="row">{{ $item->patl_with_pay }}</th>
  <th scope="row">{{ $item->stul_with_pay }}</th>
  <th scope="row">{{ $item->total_with_pay }}</th>

  <th scope="row">{{ $item->dates_of_absent }}</th>

  <th scope="row">{{ $item->tardy_without_pay }}</th>
  <th scope="row">{{ $item->times_without_pay }}</th>
  <th scope="row">{{ $item->tardy_with_pay }}</th>
  <th scope="row">{{ $item->times_with_pay }}</th>
  <th scope="row">{{ $item->total_minutes }}</th>

  <th scope="row">{{ $item->inclusive_dates_tardy }}</th>
  <th scope="row">{{ $item->remarks }}</th>
</tr>
@endforeach
</table>
</center>
<!-- <table class="tables3">

<div class="footer">
  <table class="tables4">
    <tr>
      <td align="left" valign="top">  Prepared by:<br><br> 
        <b>MA. LORELEI M. DE GUZMAN &NBSP; 7/17/2019</b><br>
        Des. Sch. Administrative Officer <br><br>
      </td>
      <td align="left" valign="top">  Certified Correct by:<br><br>
        <b>TITO L. TUQUIB</b><br>
        Principal II
      </td>
      <td align="left" valign="top"> Approved by:<br><br>
        <b>MARIA INES C. ASUNCION, CESO V</b><br>
        Schools Divisions Superintendent
      </td>
    </tr>
  </table>
</div> -->

</body>
</html>