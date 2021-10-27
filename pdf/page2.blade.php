
<style> 
    td {
      padding-top:5px;
      padding-bottom:6px;
    }
</style>

<table width="100%" style="table-layout: fixed;">
    <!-- 2nd page -->
    <tr>
        <td style="background-color: #979797; border: 1px solid black;" colspan="10"><b style="color:#fff;">IV. CIVIL SERVICE ELIGIBILITY</b></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="3" style="border: 1px solid black; background-color: #eee;">
        <center>27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER <br> SPECIAL LAWS/ CES/ CSEE <br> BARANGAY ELIGIBILITY / DRIVER'S LICENSE </center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>RATING <br> (If Applicable)</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>DATE <br> EXAMINATION / <br> CONFERMENT</center></td>
        <td rowspan="2" colspan="3" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>PLACE OF EXAMINATION / CONFERMENT</center></td>
        <td colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>LICENSE (If applicable)</center></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">NUMBER</td>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">Date of Validity</td>
    </tr>
    @for($x=0;$x<$civil_length;$x++)
        <tr>
            <td colspan="3" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $civil1) ? $civil1[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $civil2) ? $civil2[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;">&nbsp;<b>{{array_key_exists($x, $civil3) ? $civil3[$x] : ''}}</b></td>
            <td colspan="3" style="border-bottom: 1px solid; border: 1px solid black;"><b>{{array_key_exists($x, $civil4) ? $civil4[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{array_key_exists($x, $civil5) ? $civil5[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{array_key_exists($x, $civil6) ? $civil6[$x] : ''}}</b></td>
        </tr>
    @endfor
    @for($x=0;$x<=$civilAddRow;$x++)
        <tr>
            <td colspan="3" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="3" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
        </tr>
    @endfor
    <tr>
        <td colspan="10" style="background-color: #eee; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
    </tr>
    <tr>
        <td style="background-color: #979797; border: 1px solid black;" colspan="10"><b style="color:#fff;">V. WORK EXPERIENCE <br> (Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.</b></td>
    </tr>
    <tr>
        <td colspan="2" style="border: 1px solid; border: 1px solid black; background-color: #eee;"><center>28. INCLUSIVE DATES <br> (mm/dd/yyyy)</center></td>
        <td rowspan="2" colspan="2" style="border: 1px solid black; font-size: 7px;"> <center>POSITION TITLE <br> (Write in full/Do not abbreviate)</center></td>
        <td rowspan="2" colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>DEPARTMENT / AGENCY / OFFICE / COMPANY <br> (Write in full/Do not abbreviate)</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>MONTHLY <br> SALARY</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>SALARY / JOB/ PAY <br> (If applicable) & STEP <br> (Format *00-0*)/ <br> INCREMENT</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>STATUS OF <br> APPOINTMENT</center></td>
        <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 7px;"><center>GOV'T <br> SERVICE <br> (Y/ N)</center></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">From</td>
        <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">To</td>
    </tr>
    @for($x=0;$x<$work_length;$x++)
        <tr>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $work1) ? $work1[$x] : ''}}</b></td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{array_key_exists($x, $work2) ? $work2[$x] : ''}}</b></td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;"><b>{{array_key_exists($x, $work3) ? $work3[$x] : ''}}</b></td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;"><b>{{array_key_exists($x, $work4) ? $work4[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{array_key_exists($x, $work5) ? $work5[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{array_key_exists($x, $work6) ? $work6[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{array_key_exists($x, $work7) ? $work7[$x] : ''}}</b></td>
            <td style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>
            @dd($work8[$x])
        {{array_key_exists($x, $work8) ? $work8[$x] : ''}}</b></td>
        </tr>
    @endfor
    @for($x=0;$x<=$workAddRow;$x++)
        <tr>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
            <td style="border-bottom: 1px solid; border: 1px solid black;">&nbsp;</td>
        </tr>
    @endfor
    <tr>
        <td colspan="10" style="background-color: #eee; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
    </tr>
    <tr>
            <td style="border: 1px solid black; "><b><center>SIGNATURE</center></b></td>
            <td colspan="3" style="border: 1px solid black;"></td>
            <td colspan="2" style="border: 1px solid black;"><b><center>DATE</center></b></td>
            <td colspan="1" style="border-bottom: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid black;"></td>
            <td colspan="1" style="border-bottom: 1px solid black;"></td>
            <td colspan="1" style="border-right: 1px solid black; border-bottom: 1px solid black;"></td>
    </tr>
</table>
<div class="page.break" style="page-break-after:always;" ></div>