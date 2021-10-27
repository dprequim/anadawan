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
  border-bottom: none;
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
  text-align: right;
}
.td8{
  text-align: left;
}
.td9{
  text-align: left;
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
.footer{
  margin-top: 50px;
  text-align: center;
}

</style>
</head>

<body>
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
    <td class="td8">{{Carbon\Carbon::now()->format('F j, Y')}}</td>
    <td class="td2" colspan="2" align="center" ></td>
    <td class="td6"></td>
  </tr>
  <tr>
    <td class="td4"><small></small></td>
    <td class="td4"><small></small></td>
    <td class="td4" colspan="2"><small></small></td>
  </tr>
</table>

<table class="tables1">
   <div class="header2">
    
  DAVAO CITY DIVISION<br>
  PAYROLL REGISTER<br><br><br>

  </div>
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
    <td class="td7" style="text-align:center;">ACCOUNT NO.</td>
    <td class="td2" colspan="2" >ACCOUNT NAME</td>
    <td class="td9" style="text-align:center;">CREDIT AMOUNT</td>
  </tr>
  <tr>
    <td class="td4"><small></small></td>
    <td class="td4"><small></small></td>
    <td class="td4" colspan="2"><small></small></td>
  </tr>
</table>
</center>

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
  
  @foreach($data as $key => $item)
  <tr >
    <td class="td7" style="text-align:center;">{{ $item->account_number }} </td>
    <td class="td2" colspan="2">{!!  htmlentities($item->last_name, null, 'utf-8') !!}, {!! htmlentities($item->first_name, null, 'utf-8') !!} 
      {!! htmlentities(substr($item->middle_name,0,1).'.', null, 'utf-8') !!}  
      {{ $item->extension_name == 'NONE' || $item->extension_name == 'none' || $item->extension_name == 'N/A' 
      || $item->extension_name == 'n/a' || $item->extension_name == 'N/a' || $item->extension_name == 'None' ? '' : $item->extension_name }}</td>
    <td class="td9" style="text-align:center;">{{ number_format($item->net_pay,2) }}</td>
  </tr>
  @endforeach
</table>

<footer class="footer">
  <!-- <p>********* M O R E *********</p> -->
</footer>


</body>
</html>