
<style> 
    td {
      padding-top:5px;
      padding-bottom:6px;
    }
</style>

<table width="100%" style="table-layout: fixed;">
    <tr>
        <td style="background-color: #979797; border: 1px solid black;" colspan="7"><b style="color:#fff;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / PEOPLE / VOLUNTARY / ORGANIZATION/S</b></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2" style="border: 1px solid black; background-color: #eee;"><center>29. NAME & ADDRESS OF ORGANIZATION <br> (Write in full)<br>&nbsp; </center></td>
        <td colspan="2" colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>INCLUSIVE DATES <br> (mm/dd/yyyy)</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>NUMBER OF HOURS</center></td>
        <td rowspan="2" colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>POSITION / NATURE OF WORK</center></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">From</td>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">To</td>
    </tr>
    @for($x=0;$x<$voluntary_length;$x++)
        <tr>
            <td colspan="2" style="border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $voluntary1) ? $voluntary1[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $voluntary2) ? $voluntary2[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $voluntary3) ? $voluntary3[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $voluntary4) ? $voluntary4[$x] : ''}}</b></td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">&nbsp;<b>{{array_key_exists($x, $voluntary5) ? $voluntary5[$x] : ''}}</b></td>
        </tr>
    @endfor
    @for($x=0;$x<=$voluntaryAddRow;$x++)
        <tr>
            <td colspan="2" style="border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
        </tr>
    @endfor
    <tr>
        <td colspan="7" style="border-bottom: 1px solid; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
    </tr>
    <tr>
        <td style="background-color: #979797; border: 1px solid black;" colspan="7"><b style="color:#fff;">
        VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br>
        (Start from the most recent L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</b>
        </td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2" style="border: 1px solid black; background-color: #eee;"><center>30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS <br> (Write in full)<br>&nbsp; </center></td>
        <td colspan="2" colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>INCLUSIVE/DATES OF <br> ATTENDANCE <br> (mm/dd/yyyy)</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>NUMBER OF HOURS</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>Type of LD <br> (Managerial/ <br> Supervisory/ Technical/etc))</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>CONDUCTED/ SPONSORED BY <br> (Write in full)</center></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">From</td>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">To</td>
    </tr><br>
    @for($x=0;$x<$learning_length;$x++)
        <tr>
            <td colspan="2" style="border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $learning1) ? $learning1[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $learning2) ? $learning2[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $learning3) ? $learning3[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $learning4) ? $learning4[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $learning5) ? $learning5[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">&nbsp;<b>{{array_key_exists($x, $learning6) ? $learning6[$x] : ''}}</b></td>
        </tr>
    @endfor
    @for($x=0;$x<=$learningAddRow;$x++)
        <tr>
            <td colspan="2" style="border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;"></td>
        </tr> 
    @endfor               
    <tr>
        <td colspan="7" style="border-bottom: 1px solid; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
    </tr>
    <tr>
        <td style="background-color: #979797; border: 1px solid black;" colspan="7"><b style="color:#fff;">VIII. OTHER INFORMATION</b></td>
    </tr>
    <tr>   
        <td colspan="1" style="border: 1px solid black; background-color: #eee;"><center>31. SPECIAL SKILLS and HOBBIES</center></td>
        <td colspan="5" style="border: 1px solid black;"><center>32. NON-ACADEMIC DISTINCTIONS / RECOGNITION <br> (Write in full)</center></td>
        <td colspan="1" style="border: 1px solid black;"><center>33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION <br> (Write in full)</center></td>
    </tr>
    @for($x=0;$x<=$info_length;$x++)
        <tr>
            <td colspan="1" style="border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $info1) ? $info1[$x] : ''}}</b></td>
            <td colspan="5" style="border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $info2) ? $info2[$x] : ''}}</b></td>
            <td colspan="1" style="border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $info3) ? $info3[$x] : ''}}</b></td>
        </tr>
    @endfor
    @for($x=0;$x<=$infoAddRow;$x++)
        <tr>
            <td colspan="1" style="border: 1px solid black;">&nbsp;</td>
            <td colspan="5" style="border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border: 1px solid black;">&nbsp;</td>
        </tr>
    @endfor
    <tr>
        <td colspan="7" style="border-bottom: 1px solid; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;"><b><center>SIGNATURE</center></b></td>
        <td colspan="3" style="border: 1px solid black;"></td>
        <td colspan="2" style="border: 1px solid black;"><b><center>DATE</center></b></td>
        <td colspan="1" style="border: 1px solid black;"></td>
    </tr>
</table>
<div class="page.break" style="page-break-after:always;" ></div>