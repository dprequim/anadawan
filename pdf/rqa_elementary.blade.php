<!DOCTYPE html>
<html>
  <head>
    <style>
      table {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        margin-bottom: 50px;
      }

      caption {
        text-align: center;
        color: black;
        font-weight: bold;
        text-transform: uppercase;
        padding: 5px;
      }

      thead {
        background: SteelBlue;
        color: white;
      }

      th,
      td {
        border: 1px solid #000000;
        padding: 2px;
      }
      .center{
        text-align:center;
      }
      /* .header{
        background-image: url("/images/banner_top.png");
        background-size: cover;
        height: 300px;
        width: 100%;
      }
      .footer {
        background-image: url("/images/banner_bottom.png");
        background-size: cover;
        height: 250px;
        width: 100%;
      } */
      /*.div_head{
        text-align: center;
      }*/
      .tables1{
        width: 60%;
      }
    </style>
  </head>
  <body>
    <!-- <div class="header">
    <img class="logo1" src="{!! public_path('images/banner_top.png') !!}"> -->
    </div>
    <center>
      <h2>FINAL REGISTRY OF QUALIFIED APPLICATION (RQA)</h2>
      <p><b>ELEMENTARY</b></p>
      <p>DAVAO CITY DIVISION</p>
      <table width="90%" style="margin-left: 40px;">
    
        <tr>
          <th>No.</th> 
          <th>District</th> 
          <th>Name</th>
          <th>Permanent Address</th>
          <th>Contact Number</th>
          <th>Grand Total</th>
        </tr>
        @foreach($data as $key => $item)
        <tr>
          <td class="center">{{ $key +1 }}</td>
          <td class="center">{{ $item->district }}</td>
          <td class="center">{!! htmlentities($item->name, null, 'utf-8') !!}</td>
          <td class="center">{!! htmlentities($item->address, null, 'utf-8') !!}</td>
          <td class="center">{{ $item->mobile_no }}</td>
          <td class="center">{{ round($item->grand_total,2) }}</td>
        </tr>
      @endforeach
      </table>
    </center>
    <!-- <div class="footer"></div> -->
  </body>
</html>