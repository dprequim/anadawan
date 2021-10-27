
<style> 
    td {
      padding-top:5px;
      padding-bottom:6px;
    }
</style>
<table width="100%" style="table-layout: fixed;">
    <tr>
        <td height="10" valign="top" width="60%" colspan="2" style="border: 1px solid black;">
        34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the  chief of bureau or office<br> 
            or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed,
            <br> a. within the third degree?<br> 
            b. within the fourth degree (for Local Government Unit - Career Employees)?
        </td>
        <td height="10" width="20%" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->third_degree)?$user_first_background_info->third_degree:'')
                @if($user_first_background_info->third_degree == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                @elseif($user_first_background_info->third_degree == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                @endif
            @endif
            @if(isset($user_first_background_info->fourth_degree)?$user_first_background_info->fourth_degree:'')
                @if($user_first_background_info->fourth_degree == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details: &nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->degree_details : '' }}</b></p>
                @elseif($user_first_background_info->fourth_degree == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" width="60%" valign="top" colspan="2"style="border: 1px solid black;">
            35. a. Have you ever been found guilty of any adminustrative offense?<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
                b. Have you been criminally charged before any court?
        </td>
        <td height="10" width="20%" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->admin_offense)?$user_first_background_info->admin_offense:'')
                @if($user_first_background_info->admin_offense == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->admin_offense_datails : '' }}</b></p>
                @elseif($user_first_background_info->admin_offense == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif

            @if(isset($user_first_background_info->criminally_charge)?$user_first_background_info->criminally_charge:'')
                @if($user_first_background_info->criminally_charge == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->criminally_details : '' }}</b></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status of Case/s:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->status_of_case : '' }}</b></p>
                @elseif($user_first_background_info->admin_offense == "No")
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>   
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" width="60%" valign="top" colspan="2"style="border: 1px solid black;">
            36. Have you ever been convicted of any crime or violation of any law, degree, ordinance or regulation by any court or tribunal? 
        </td>
        <td height="10" width="20%" valign="top" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->convicted_by_law)?$user_first_background_info->convicted_by_law:'')
                @if($user_first_background_info->convicted_by_law == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->convicted_details : '' }}</b></p>
                @elseif($user_first_background_info->convicted_by_law == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" width="60%" valign="top" colspan="2" style="border: 1px solid black;">
        37. Have you ever been separated from the service in any of the following modes: resignation, retirement,<br>
            dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in <br>
            the public or private sector?
        </td>
        <td height="10" width="20%" valign="top" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->separated_from_service)?$user_first_background_info->separated_from_service:'')
                @if($user_first_background_info->separated_from_service == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->separated_details : '' }}</b></p>
                @elseif($user_first_background_info->separated_from_service == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" width="60%" valign="top" colspan="2"style="border: 1px solid black;">
        38. a. Have you ever been a candidate in a national or local election held within the last year (expect Barangay election)?<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
            b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign
            <br>&nbsp;&nbsp;&nbsp;&nbsp; for a national or local candidate?
        </td>
        <td height="10" width="20%" valign="top" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->candidate_in_election)?$user_first_background_info->candidate_in_election:'')
                @if($user_first_background_info->candidate_in_election == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9745;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9744; NO</span>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->candidate_details : '' }}</b></p>
                @elseif($user_first_background_info->candidate_in_election == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9744;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9745; NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif
            
            @if(isset($user_first_background_info->resigned_from_govt)?$user_first_background_info->resigned_from_govt:'')
                @if($user_first_background_info->resigned_from_govt == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9745;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9744; NO</span>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->resigned_details : '' }}</b></p>
                @elseif($user_first_background_info->resigned_from_govt == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9744;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9745; NO</span>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" width="60%" valign="top" colspan="2"style="border: 1px solid black;">
            39. Have you acquired the status of an immigrant or permanent resident of another country?
        </td>
        <td height="10" width="20%" valign="top" colspan="3" style="border: 1px solid black;">
            @if(isset($user_first_background_info->immigrant_status)?$user_first_background_info->immigrant_status:'')
                @if($user_first_background_info->immigrant_status == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):&nbsp;<b>{{ isset($user_first_background_info) ? $user_first_background_info->immigrant_details : '' }}</b></p>
                @elseif($user_first_background_info->immigrant_status == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td height="10" valign="top" width="60%" colspan="2"style="border: 1px solid black;">
        40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); <br> and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items: <br> 
            a. Are you a member of any indigenous group?<br><br><br>
            b. Are you a person with disability?<br><br><br>
            c. Are you a solo parent?
        </td>
        <td height="10" width="20%" colspan="3" style="border: 1px solid black;">
            @if(isset($user_second_background_info->indigenous_member)?$user_second_background_info->indigenous_member:'')
                @if($user_second_background_info->indigenous_member == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify:&nbsp;<b>{{ isset($user_second_background_info) ? $user_second_background_info->indigenous_details : '' }}</b></p><br><br>
                @elseif($user_second_background_info->indigenous_member == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify:</p>
                @endif
            @endif

            @if(isset($user_second_background_info->disability_status)?$user_second_background_info->disability_status:'')
                @if($user_second_background_info->disability_status == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>    
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<b>{{ isset($user_second_background_info) ? $user_second_background_info->disability_details : '' }}</b></p><br>
                @elseif($user_second_background_info->disability_status == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:</p>
                @endif
            @endif
            
            @if(isset($user_second_background_info->solo_parent)?$user_second_background_info->solo_parent:'')
                @if($user_second_background_info->solo_parent == "Yes")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<b>{{ isset($user_second_background_info) ? $user_second_background_info->solo_parent_details : '' }}</b></p>
                @elseif($user_second_background_info->solo_parent == "No")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:</p>
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="4" style="border: 1px solid black;">41. REFERENCE (Person not related by consanguinity or affinity to applicant/appointee)</td>
        <td colspan="1" rowspan="11" style="border: 1px solid black;" valign="top"><br>
            <center>
                <div class="boxed" style="border: 1px solid black; ">
                    <p style="font-size: 8px;">ID picture taken within the last 6 months 3.5 cm x 4.5 cm (passport size)<br><br>
                    With full and handwritten name tag and signature over printed name<br><br>
                    Computer generated or photocopied picture is not acceptable</p>
                </div><br>
                <div class="thumbmark" style="border: 1px solid black;">
                    <p style="font-size: 10px; vertical-align: text-top;">Right Thumbmark<hr></p>
                </div>
            </center>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;"><center>NAME</center></td>
        <td style="border: 1px solid black;"><center>ADDRESS</center></td>
        <td colspan="2" style="border: 1px solid black;"><center>TEL NO.</center></td>
    </tr>
    @for($x=0;$x<$reference_length;$x++)
        <tr>
            <td style="border: 1px solid black;  text-align:center"><b>{{array_key_exists($x, $reference1) ? $reference1[$x] : ''}}</b></td>
            <td style="border: 1px solid black;  text-align:center"><b>{{array_key_exists($x, $reference2) ? $reference2[$x] : ''}}</b></td>
            <td colspan="2" style="border: 1px solid black; text-align:center"><b>{{array_key_exists($x, $reference3) ? $reference3[$x] : ''}}</b></td>
        </tr>
    @endfor
    <tr>
        <td colspan="4" style="border: 1px solid black;">
            42. I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and 
            complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the 
            Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. 
            I agree that any misrepresentation made in this document and its attachment shall cause the filing of administrative/criminal case/s againt me.
        </td>
    </tr>
    <tr>
        <td colspan="1" style="border-left: 1px solid; border-bottom: 1px solid;">
            <table width="100%" >
                <tr>
                    <td style="border: 1px solid black; background: #eee;">Government Issued ID (i.e Passport, GSIS, SSS, PRC, Driver's License, etc)<br>PLEASE INDICATE ID Number and Date of Issuance</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Government Issued ID: &nbsp;<b>{{ isset($user_second_background_info->govt_issued_id) ? $user_second_background_info->govt_issued_id : '' }}</b></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">ID/License/Passport No.: &nbsp;<b>{{ isset($user_second_background_info->govt_issued_no) ? $user_second_background_info->govt_issued_no : '' }}</b></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Date/Place of Issuance: &nbsp;<b>{{ isset($user_second_background_info->govt_id_date_issurance) ? $user_second_background_info->govt_id_date_issurance : '' }}</b></td>
                </tr>
                <tr>
                    <td rowspan="3" style="border: 1px solid black;">&nbsp;</td>
                </tr>
            </table>
        </td>
        <td colspan="3" style="border-right: 1px solid; border-bottom: 1px solid;">
            <table width="100%" >
                <tr>
                    <td style="border: 1px solid black;">&nbsp;<br>&nbsp;<br>&nbsp;<br></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align:center; background: #eee;">Signature (Sign inside the box)</td>
                </tr>
                <tr>
                    <td style="height: 45px;border: 1px solid black;">&nbsp;<center><b>{{ isset($user_applicant_option) ? date('M j, Y', strtotime($user_applicant_option->updated_at)) : '' }}</b></center></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align:center; background: #eee;">Date Accomplished</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td colspan="4">SUBSCRIBED AND SWORN to before me this ______________ , affiant exhibiting his/her validly issued government ID as indicated above.</td>
    </tr>
    <tr>
        <td width="30%" colspan="1" style="border-left: 1px solid; border-bottom: 1px solid;"></td>
        <td width="70%"colspan="3" style="border-right: 1px solid; border-bottom: 1px solid;">
            <table width="100%" style="padding: 5px 0px 5px 5px;">
                <tr>
                    <td style="border: 1px solid black;">&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align:center; background: #eee;">Person Administering Oath</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="page.break" style="page-break-after:always;" ></div>