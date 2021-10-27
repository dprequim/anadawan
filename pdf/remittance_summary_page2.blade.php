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

  <div class="header2">
    
  S U M M A R Y<br>
  --------------------<br>
  </div>
<center>
  <table class="tables">
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
  @foreach($by_school_code_payee as $code => $item)
  @foreach($by_school_name_payee as $name => $item_name)

        @php
            $total = 0;
            $school = '';
          @endphp
            <tr>
              <td align="center" valign="top"><b>{{ $code }}</b></td>
              <td align="center" valign="top"><b>{{ $name }}</b></td>

              @foreach($item as $key)
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
</center>





</body>
</html>