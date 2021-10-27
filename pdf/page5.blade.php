<table width="100%" style="table-layout: fixed;">
    <tr>
        <td colspan="3" style=" background-color: #979797; border: 1px solid black;"><center><b style="color:#fff;">WORK EXPERIENCE SHEET</b></center></td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid black;">
            <b>Instructions:</b>&nbsp;&nbsp; 1. Include only the work experiences relevant to the position being applied to.<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            2. The duration should include start and finish dates. If known, month in abbreviated form, if known, and year in full. For the current 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            position, use he word Present, e.g., 1998 Present. Work experience should be listed from most recent first.
        </td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid black;">
            <u><b>Sample: If applying to Supervising Administrative Officer</b></u><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @for($x=0;$x<$worksheet_length;$x++)
                <ul>
                    <li>Duration: &nbsp;<b>{{array_key_exists($x, $worksheet1) ? $worksheet1[$x] : ''}}</b></li>
                    <li>Position: &nbsp;<b>{{array_key_exists($x, $worksheet2) ? $worksheet2[$x] : ''}}</b></li>
                    <li>Name of Office/Unit: &nbsp;<b>{{array_key_exists($x, $worksheet3) ? $worksheet3[$x] : ''}}</b></li>
                    <li>Immediate Supervisor: &nbsp;<b>{{array_key_exists($x, $worksheet4) ? $worksheet4[$x] : ''}}</b></li>
                    <li>Name of Agency/Organization and Location: &nbsp;<b>{{array_key_exists($x, $worksheet5) ? $worksheet5[$x] : ''}}</b></li>
                </ul>
                <ul>
                    <li>
                        List of Accomplishments and Contributions (If any):<br>
                        <ul>
                            <li><b>{!! array_key_exists($x, $worksheet6) ? str_replace([',','-','*','/'],'<li>',$worksheet6[$x]) : '' !!}</b></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        Summary of Actual Duties:<br>
                        <ul>
                            <li><b>{!! array_key_exists($x, $worksheet7) ? str_replace(['','-','*','/'],'<li>',$worksheet7[$x]) : '' !!}</b></li>
                        </ul>
                    </li>
                </ul><b><hr></b>
            @endfor
        </td>
    </tr>
</table>