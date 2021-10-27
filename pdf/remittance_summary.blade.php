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
  width: 70%;
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
  margin-top: 100px;
}
.tables2{
  width: 100%;
  border: 0px;
  margin-top: 0px;
}
.footer{
  margin-top: 50px;
}
.page-break {
    page-break-before: always;
}
.page2tables{
  width: 100%;
  border: 0px;
  margin-top: 0px;
}

</style>
</head>

<body>
<table id="testTable" summary="Code page support in different versions of MS Windows."
  rules="groups" frame="hsides" border="0" class="tables">

<center>
<table class="tables2">
  <tr>
    <td class="td5" colspan="5"></td>
  </tr>
</table>
</center>
  
<center>
  <div class="header2">
  
  <br><br><b>***** DIVISION TOTAL *****</b><br>
  </div>
  <table class="tables">
     <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br>NUMBER OF PAYEES</b></td>
      <td align="center" valign="top"><b><br>{{ $total_payees }}</b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>BASIC SALARY</b></td>
      <td align="center" valign="top"><b>{{ $total_salary }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>P.E.R.A.</b></td>
      <td align="center" valign="top"><b>{{ $total_pera }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br>TOTAL COMPENSATION</b></td>
      <td align="center" valign="top"><b><br>{{ $total_emp_compe }}</b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>TOTAL DEDUCTIONS</b></td>
      <td align="center" valign="top"><b>{{ $total_deduction }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>NET SALARY</b></td>
      <td align="center" valign="top"><b>{{ $total_net_pay }}</b></td>
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
      <td align="center" valign="top"><b>{{ $total_gsis_gs }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>PHILHEALTH (MEDICARE)</b></td>
      <td align="center" valign="top"><b>{{ $total_medicare }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>PAG - IBIG</b></td>
      <td align="center" valign="top"><b>{{ $total_pagibig }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>EMPLOYEES COMPENSATION</b></td>
      <td align="center" valign="top"><b>{{ $total_ec }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b></b></td>
      <td valign="top"><b>TOTAL GOVERNMENT SHARE</b></td>
      <td align="center" valign="top"><b>{{ $total_gs }}</b></td>
      <td align="center" valign="top"><b></b></td>
    </tr>
    <tr>
      <td align="center" valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>

      @foreach($deductions as $item)

        @php
            $total = 0;
            $code= '';
            $code_description= '';
          @endphp
        @php
            $total = isset($item['total']) ? $item['total'] : 0;
            $code = isset($item['code']) ? $item['code'] : 0;
            $code_description = isset($item['code_description']) ? $item['code_description'] : 0;
          @endphp
            <tr>
              <td align="center" valign="top"><b>{{$code}}</b></td>
              <td valign="top"><b>{{$code_description}}</b></td>
              <td align="center" valign="top"><b>{{$total}}</b></td>
              <td align="center" valign="top"><b></b></td>
            </tr>

    @endforeach


  </table>

  <table id="testTable" summary="Code page support in different versions of MS Windows."
  rules="groups" frame="hsides" border="0" class="page2tables">

<center>

  <div class="page-break">
    <b>
  S U M M A R Y<br>
  --------------------<br></b>
  </div>
  <table class="page2tables">
     <tr>
      <td align="center" valign="top"><b><br>STATION CODE</b></td>
      <td align="center" valign="top"><b><br>SCHOOL NAME</b></td>
      <td align="center" valign="top"><b><br>TOTAL BASIC SALARY</b></td>
    </tr>
  <tr>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
    <td class="td1"></td>
  </tr>
  @foreach($by_school_code_payee as $code => $school_code)
  @foreach($by_school_name_payee as $name => $item_name)

        @php
            $total = 0;
            $school = '';
          @endphp
            <tr>
              <td align="center" valign="top"><b>{{ $code }}</b></td>
              <td align="center" valign="top"><b>{{ $name }}</b></td>

              @foreach($school_code as $key)
                @php
                    $school = isset($key['school']) ? $key['school'] : '';
                    $total = isset($key['total_basic_salary']) ? $key['total_basic_salary'] : 0;
                  @endphp
                @endforeach
                  <td align="center" valign="top"><b>{{$total}}</b></td>
            </tr>
    @endforeach
    @endforeach

</table>
</body>
</html>