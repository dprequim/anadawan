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
    @foreach($data as $key => $item)
      <h2>FINAL REGISTRY OF QUALIFIED APPLICATION (RQA)</h2>
      <p><b>SENIOR HIGH SCHOOL - {{ $key }}</b></p>
      <p>DAVAO CITY DIVISION</p>
      <table width="90%" style="margin-left: 40px;">
    
        <tr>
          <th rowspan="2">No.</th>
          <th rowspan="2">Name</th>
          <th rowspan="2">Major</th> 
          <th>Education</th>
          <th>Teaching/ Industry Workplace Experience</th>
          <th>Specialized Training</th>
          <th>Interview</th>
          <th>English Communication Skills</th>
          <th>Portfolio and Outstanding Achievements</th>
          <th>Demo Teaching</th>
          <th rowspan="2">Grand Total</th>
        </tr>

        <tr>
          <th>PTS.</th>
          <th>PTS.</th>
          <th>PTS.</th>
          <th>PTS.</th>
          <th>PTS.</th>
          <th>PTS.</th>
          <th>PTS.</th>
        </tr>
        @foreach($item as $res)
        <tr>
          <td class="center">{{ count($item) }}</td>
          <td class="center">{!! htmlentities($res->name, null, 'utf-8') !!}</td>
          <td class="center">{{ $res->major }}</td>
          <td class="center">{{ round($res->education_points,2) }}</td>
          <td class="center">{{ round($res->teaching_experience_points,2) }}</td>
          <td class="center">{{ round($res->let_pbet_rating_points,2) }}</td>
          <td class="center">{{ round($res->training_and_skill_points,2) }}</td>
          <td class="center">{{ round($res->interview_points,2) }}</td>
          <td class="center">{{ round($res->demo_teaching_points,2) }}</td>
          <td class="center">{{ round($res->communication_skill_points,2) }}</td>
          <td class="center">{{ round($res->grand_total,2) }}</td>
        </tr>
      @endforeach
    <tr>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br></b></td>
      <td valign="top"><b><br><br>TOTAL</b></td>
      <td valign="top"><b><br></b></td>
      <td align="center" valign="top"><b><br></b></td>
    </tr>
     
      </table>
      @endforeach
    </center>
    <!-- <div class="footer"></div> -->
  </body>
</html>