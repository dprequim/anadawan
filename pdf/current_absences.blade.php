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
  width: 20%;
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

<center>
<table class="tables">
  <tr>
    <td class="td5" colspan="5"></td>
  </tr>
  <tr>
    <td class="td8">06/04/2020</td>
    <td class="td2" colspan="2" align="center">DEPARTMENT OF EDUCATION</td>
    <td class="td6">Page: 77</td>
  </tr>
</table>
</center>
  <div class="header2">
  
  REGION XI - Southeastern Mindanao<br>
  LIST OF REMITANCE - REGULAR PAYROLL<br>
  For the Month of {{$date}}<br><br><br>

  </div>
<center>
<table class="tables">
    <tr>
      <td align="left" valign="top"><b>DIVISION : 087 DAVAO CITY</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>DEDUCTION : 0068 CURRENT ABSENCES</b></td>
    </tr>
    
  </table>
  <table class="tables">
     <tr>
      <td valign="top"><b><br>EMPLOYEE NUMBER</b></td>
      <td valign="top"><b><br>EMPLOYEE NAME</b></td>
      <td valign="top"><b><br>POLICY NUMBER</b></td>
      <td valign="top"><b><br>EFFECT DATE</b></td>
      <td valign="top"><b><br>TERMIN DATE</b></td>
      <td valign="top"><b><br>AMOUNT</b></td>
    </tr>
    <tr>
      <td valign="top"><b>-----------------------------</b></td>
      <td valign="top"><b>-----------------------------</b></td>
      <td valign="top"><b>------------------------</b></td>
      <td valign="top"><b>---------------------</b></td>
      <td valign="top"><b>---------------------</b></td>
      <td valign="top"><b>--------------</b></td>
    </tr>

    @foreach($data as $item)
  <tr>
      <td valign="top"><b><br> 
        {{ isset($item->employee_number)?$item->employee_number->employee_no:'' }} </b></td>
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
      <td valign="top"><b><br> {{ $item->deduction->policy_number != null ? $item->deduction->policy_number:'' }} </b></td>

      <td valign="top"><b><br> {{ $item->current_absences_ret['effectivity_date'] != null ? $item->current_absences_ret['effectivity_date'] : $item->current_absences_ret['termination_date'] }} </b></td>

      <td valign="top"><b><br> {{ $item->current_absences_ret['termination_date'] }} </b></td>

      <td valign="top"><b><br>{{ $item->deduction_amount != null ? number_format($item->deduction_amount,2) :''}} </b></td>
    </tr>
    @endforeach
</table>
</center>





</body>
</html>