<!DOCTYPE html>
<html>
<head>
<style>


table {
 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  margin-bottom: 50px;
  margin-top: 50px;

}

caption {
  text-align: left;
  color: silver;
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
  border: 2px solid #000000;
  padding: 2px;
}
.tables1{
  width: 100%;
}
.thyellow{
  background-color: #f4df0b;
}
.thblue{
  background-color: #2495db;
}

</style>
</head>
    <body>

      <table class="tables1">
        <tr>
          <th class="thyellow">No.</th>
          <th class="thyellow">Salutation</th> 
          <th class="thyellow">FIRST NAME, M.I, Surname, Extension</th>
          <th class="thyellow">POSITION TITLE</th>
          <th class="thyellow">SG</th>
          <th class="thyellow">TYPE OF APPOINTMENT</th>
          <th class="thyellow">RATE IN WORDS</th>
          <th class="thyellow">IN FIGURES</th>
          <th class="thyellow">Nature of appointment</th>
          <th>IF ORIGINAL</th>

          <th class="thyellow">Vice</th>
          <th class="thyellow">Nature of separation</th> 
          <th class="thyellow">Plantilla number</th>
          <th class="thyellow">Page</th>
          <th class="thyellow">From month</th>
          <th class="thyellow">To month</th>
          <th class="thyellow">Year</th>
          <th class="thyellow">From month</th>
          <th class="thyellow">To month</th>
          <th class="thyellow">Year</th>
          <th class="thyellow">Assessment date/ Ranking date (Mo, day, year)</th>
          
          <th class="thyellow">Approval of ROV: deliberation date (Mo,day,year)</th>
          <th class="thblue">EFFECTIVITY DATE</th> 
          <th class="thyellow">SCHOOL</th>
          <th class="thyellow">CLUSTER</th>
          <th class="thyellow">SEX</th>
          <th class="thyellow">ROV APPROVED</th>
          <th class="thyellow">DATE PRINTED</th>
        </tr>
            @foreach($data as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->gender == 'Female' ? $female : $male }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->teaching_position == null ? $item->non_teaching_category : $item->teaching_position}}</td>
          <td>{{ $item->salary_grade }}</td>
          <td>{{ $item->appointment }}</td>
          <td>{{ $item->salary_words }}</td>
          <td>{{ $item->starting_salary }}</td>
          <td>ORIGINAL*</td>
          <td>The appointee shall undergo probationary</td>

          <td>JEREMY S. SEMIC</td>
          <td>PROMOTED</td>
          <td>{{ $item->plantilla_item_no }}</td>
          <td>5</td>
          <td>FEB. 13</td>
          <td>FEB. 28</td>
          <td>2019</td>
          <td>FEB. 13</td>
          <td>FEB. 28</td>
          <td>2019</td>
          <td>March 01,2019</td>

          <td>March 04,2019</td>
          <td>{{ $item->effectivity_date }}</td>
          <td>{{ $item->school_name }}</td>
          <td>{{ $item->cluster }}</td>
          <td>{{ $item->gender }}</td>
          <td>2/1/2019</td>
          <td>{{Carbon\Carbon::now()->format('m/d/Y')}}</td>
        </tr>
      @endforeach
    </table>
  </body>
</html>