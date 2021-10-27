
<style> 
    td {
      padding-top:5px;
      padding-bottom:6px;
    }
</style>


<div class="row" style="font-size: 9px;">
    <p>CS Form No. 212
    <br>Revised 2017</p>
</div>
<center>
    <p><b style="font-size: 28px; ">PERSONAL DATA SHEET</b></p>
</center>
<div class="row">
    <p style="font-size: xx-small;"><b>WARNING:</b> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filling of administrative/criminal case/s against the person concerned.<br>
    <b>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</b><br>
</div>
<div class="row">
    <table width="100%">
        <tr>
            <td colspan="5" style="font-size: 9px; ">Print legibly. Tick appropriate boxes <span><i class="far fa-square"></i></span> and use separate sheet if necessary. Indicate N/A if not applicable. DO NOT ABBREVIATE.</p></td>
            <td style="background-color: #979797; border: 1px solid black; font-size: 8px;">1: CS 1D No.</td>
            <td colspan="3" style="border: 1px solid black;"> <p style="float:right; font-size: 9px;"><br>(Do not fill up. For CSC use only)</p></td>
        </tr>
        <tr>
            <td style="background-color: #979797; border: 1px solid black;" colspan="9"><b style="color:#fff;">I. PERSONAL INFORMATION</b></td>
        </tr>
        <tr>
            <td rowspan="3" style="border: 1px solid black; background-color: #eee;">
            2. SURNAME <br>
            &nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME <br>
            &nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME
            </td>
            <td colspan="8" style="border: 1px solid black;">&nbsp;<b>{!! htmlentities($user->last_name
            , null, 'utf-8') 
        !!}</b></td>
        </tr>
        <tr>
            <td colspan="5">&nbsp;<b>{!! htmlentities($user->first_name
            , null, 'utf-8') 
        !!}</b></td>
            <td colspan="3" style="background-color: #eee; border: 1px solid black; font-size: 8px;">
                NAME EXTENSION (JR.,SR.)&nbsp;&nbsp; <b>{{ $user->extension_name }}</b>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="border: 1px solid black;">&nbsp;<b>{!! htmlentities($user->middle_name
            , null, 'utf-8') 
        !!}</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">3. DATE OF BIRTH <br>
            &nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)
            </td>
            <td>&nbsp;<b>{{ $user->birthdate }}</b></td>
            <td colspan="2" rowspan="3" style="border: 1px solid black;">
            16. CITIZENSHIP<br>
            <br>
            <div style="width:100%">
                <span><center>If holder of dual citizenship,<br>
            please indicate the details.</center></span>
            </div>
            </td>
            <td colspan="5" rowspan="3" valign="top" style="border: 1px solid black;">
            @if(isset($user_personal_information->citizenship)?$user_personal_information->citizenship:'')
                @if($user_personal_information->citizenship == "Filipino" OR $user_personal_information->citizenship == "filipino")
                    <span class="dejavu">&#9745; &nbsp;&nbsp;Filipino</span>
                    <span class="dejavu">&#9744; &nbsp;&nbsp;Dual Citizenship</span><br>
                    <span class="dejavu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &#9744;&nbsp;&nbsp;by birth</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;by naturalization</span>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                    Pls. Indicate country: N/A
                    @elseif($user_personal_information->citizenship == "Dual Citizenship")
                    <span class="dejavu">&#9744; &nbsp;&nbsp;Filipino</span>
                    <span class="dejavu">&#9745; &nbsp;&nbsp;Dual Citizenship</span><br>
                @endif
            @endif

            @if(isset($user_personal_information->dual_citizenship_type)?$user_personal_information->dual_citizenship_type:'')
                    @if($user_personal_information->dual_citizenship_type == "by birth")
                    <span class="dejavu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &#9745;&nbsp;&nbsp;by birth</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;by naturalization</span>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    @endif

                    @if($user_personal_information->dual_citizenship_type == "by naturalization")
                    <span class="dejavu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &#9744;&nbsp;&nbsp;by birth</span>
                    <span class="dejavu">&#9745;&nbsp;&nbsp;by naturalization</span>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                    @endif
                    
                    Pls. Indicate country: {{ isset($user_personal_information->other_citizenship)?$user_personal_information->other_citizenship:'' }}
            @endif
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">4. PLACE OF BIRTH</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->place_of_birth)?$user_personal_information->place_of_birth:'' }}</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">5. SEX</td>
            <td style="border: 1px solid black;">
                @if($user->gender == "Male" OR $user->gender == "male")
                    <span class="dejavu">&#9745;&nbsp;&nbsp;MALE</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="dejavu">&#9744;&nbsp;&nbsp;FEMALE</span>
                @elseif($user->gender == "Female" OR $user->gender == "Female")
                    <span class="dejavu">&#9744;&nbsp;&nbsp;MALE</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="dejavu">&#9745;&nbsp;&nbsp;FEMALE</span>
                @endif
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="border: 1px solid black;">6. CIVIL STATUS</td>
            <td rowspan="2" style="border: 1px solid black;">
                @if(isset($user_personal_information->civil_status)?$user_personal_information->civil_status:'')
                    @if($user_personal_information->civil_status == "Single")
                    <span class="dejavu">&#9745;&nbsp;&nbsp;Single</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Married</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Widowed</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Seperated</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Others</span>
                    @elseif($user_personal_information->civil_status == "Married")
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Single</span>
                    <span class="dejavu">&#9745;&nbsp;&nbsp;Married</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Widowed</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Seperated</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Others</span>
                    @elseif($user_personal_information->civil_status == "Widowed")
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Single</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Married</span>
                    <span class="dejavu">&#9745;&nbsp;&nbsp;Widowed</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Seperated</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Others</span>
                    @elseif($user_personal_information->civil_status == "Separated")
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Single</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Married</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Widowed</span>
                    <span class="dejavu">&#9745;&nbsp;&nbsp;Seperated</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Others</span>
                    @elseif($user_personal_information->civil_status == "Others")
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Single</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Married</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Widowed</span>
                    <span class="dejavu">&#9744;&nbsp;&nbsp;Seperated</span>
                    <span class="dejavu">&#9745;&nbsp;&nbsp;Others</span>      
                    @endif   
                @endif
            </td>
            <td rowspan="3" valign="top" style="border-top: 1px solid black;">
            17: RESIDENTIAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADDRESS
            </td>
            <td colspan="6" valign="bottom" style="border: 1px solid black;">
                House/Block/Lot No. &nbsp;<b>{{ isset($user_personal_residential_address->residential_house_no)?$user_personal_residential_address->residential_house_no:'' }}</b>
                <br>Street &nbsp;<b>{!! htmlentities(isset($user_personal_residential_address->residential_street)?$user_personal_residential_address->residential_street:''
                , null, 'utf-8') 
            !!}</b>
            </td>
        </tr>
        <tr>
            <td colspan="6" valign="bottom" style="border: 1px solid black;">
                Subdivision/Village  &nbsp;<b>{!! htmlentities(isset($user_personal_residential_address->residential_village)?$user_personal_residential_address->residential_village:''
                , null, 'utf-8') 
            !!}</b>&nbsp;
                <br>Barangay &nbsp;<b>{!! htmlentities(isset($user_personal_residential_address->residential_barangay)?$user_personal_residential_address->residential_barangay:''
                , null, 'utf-8') 
            !!}</b>
            </td>   
        </tr>
        <tr>
            <td style="border: 1px solid black;">7. HEIGHT(m)</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->height)?$user_personal_information->height:'' }}</b></td>
            <td colspan="6" style="border: 1px solid black;">
                City/Municipality &nbsp;<b>{!! htmlentities(isset($user_personal_residential_address->residential_city)?$user_personal_residential_address->residential_city:''
                , null, 'utf-8') 
            !!}</b>
                <br>Province &nbsp;<b>{!! htmlentities(isset($user_personal_residential_address->residential_province)?$user_personal_residential_address->residential_province:''
                , null, 'utf-8') 
            !!}</b>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">8. WEIGHT(m)</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->weight)?$user_personal_information->weight:'' }}</b></td>
            <td style="border-bottom: 1px solid; text-align: center">Zip Code</td>
            <td colspan="6" style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_residential_address->residential_zip_code)?$user_personal_residential_address->residential_zip_code:'' }}</b></td>
        </tr>
        <!--  -->
        <tr>
            <td style="border: 1px solid black;">9. BLOOD TYPE</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->blood_type)?$user_personal_information->blood_type:'' }}</b></td>
            <td rowspan="3" valign="top" style="border-top: 1px solid black;">
            18. PERMANENT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADDRESS
            </td>
            <td colspan="6" valign="bottom" style="border: 1px solid black;">
                House/Block/Lot No. &nbsp;<b>{{ isset($user_personal_permanent_address->permanent_house_no)?$user_personal_permanent_address->permanent_house_no:'' }}</b>
                <br>Street &nbsp;<b>{!! htmlentities(isset($user_personal_permanent_address->permanent_street)?$user_personal_permanent_address->permanent_street:''
                , null, 'utf-8') 
            !!}</b>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">10. GSIS ID NO.</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->gsis_no)?$user_personal_information->gsis_no:'' }}</b></td>
            <td colspan="6" valign="bottom" style="border: 1px solid black;">
                Subdivision/Village &nbsp;<b>{!! htmlentities(isset($user_personal_permanent_address->permanent_village)?$user_personal_permanent_address->permanent_village:''
                , null, 'utf-8') 
            !!}</b>&nbsp;
                <br>Barangay &nbsp;<b>{!! htmlentities(isset($user_personal_permanent_address->permanent_barangay)?$user_personal_permanent_address->permanent_barangay:''
                , null, 'utf-8') 
            !!}</b>
            </td>   
        </tr>
        <tr>
            <td style="border: 1px solid black;">11. PAGIBIG NO. ID</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->pag_ibig_no)?$user_personal_information->pag_ibig_no:'' }}</b></td>
            <td colspan="6" style="border: 1px solid black;">
                City/Municipality &nbsp;<b>{!! htmlentities(isset($user_personal_permanent_address->permanent_city)?$user_personal_permanent_address->permanent_city:''
                , null, 'utf-8') 
            !!}</b>
                <br>Province &nbsp;<b>{!! htmlentities(isset($user_personal_permanent_address->permanent_province)?$user_personal_permanent_address->permanent_province:''
                , null, 'utf-8') 
            !!}</b>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">12. PHILHEALTH NO.</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->philhealth_no)?$user_personal_information->philhealth_no:'' }}</b></td>
            <td style="border-bottom: 1px solid; text-align: center">Zip Code</td>
            <td colspan="6" style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_permanent_address->permanent_zip_code)?$user_personal_permanent_address->permanent_zip_code:'' }}</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">13. SSS NO.</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->sss_no)?$user_personal_information->sss_no:'' }}</b></td>
            <td style="border-bottom: 1px solid;">19. TELEPHONE NO.</td>
            <td colspan="6" style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_permanent_address->tel_no)?$user_personal_permanent_address->tel_no:'' }}</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">14. TIN NO.</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->tin_no)?$user_personal_information->tin_no:'' }}</b></td>
            <td style="border-bottom: 1px solid;">20. MOBILE NO.</td>
            <td colspan="6" style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_permanent_address->mobile_no)?$user_personal_permanent_address->mobile_no:'' }}</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">15. AGENCY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYEE NO.</td>
            <td style="border: 1px solid black;">&nbsp;<b>{{ isset($user_personal_information->employee_no)?$user_personal_information->employee_no:'' }}</b></td>
            <td style="border-bottom: 1px solid;">21. E-MAIL ADDRESS (if any)</td>
            <td colspan="6" style="border: 1px solid black;">&nbsp;<b>{!! htmlentities($user->email
            , null, 'utf-8') 
        !!}</b></td>
        </tr>
        <tr>
            <td style="background-color: #979797; border-left: 1px solid black; border-right: 1px solid black;" border-top: 1px solid black; colspan="9"><b style="color:#fff;">II. FAMILY BACKGROUND</b></td>
        </tr>
        
        <tr>
            <td colspan="3" style="border-left: 1px solid; border-bottom: 1px solid;">
                <table width="100%" style="padding: 0px; margin-bottom: -4px; margin-top: -4px;">
                    <tr>
                        <td rowspan="3" style="border: 1px solid black; background-color: #eee;">
                        22. SPOUSE'S SURNAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME <br>&nbsp;
                        </td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! htmlentities(isset($user_family_background->spouse_surname)?$user_family_background->spouse_surname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td colspan="1">&nbsp;<b>{!! htmlentities(isset($user_family_background->first_name)?$user_family_background->first_name:''
                        , null, 'utf-8') 
                    !!}</b></td>
                        <td colspan="1" style="background-color: #eee; border: 1px solid black; font-size: 8px;">
                            NAME EXTENSION (JR.,SR.)&nbsp;&nbsp;<b>{{ isset($user_family_background->extension_name)?$user_family_background->extension_name:'' }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! htmlentities(isset($user_family_background->middle_name)?$user_family_background->middle_name:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; background-color: #eee;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION</td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->occupation)?$user_family_background->occupation:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; background-color: #eee;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME</td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->business_name)?$user_family_background->business_name:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; background-color: #eee;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS ADDRESS</td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->business_address)?$user_family_background->business_address:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; background-color: #eee;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEPHONE NO.</td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{{ isset($user_family_background->tel_no)?$user_family_background->tel_no:'' }}</b></td>
                    </tr>
                    <tr>
                        <td rowspan="3" style="border: 1px solid black; background-color: #eee;">
                        24. FATHER'S SURNAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME <br>&nbsp;
                        </td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->father_surname)?$user_family_background->father_surname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td colspan="1">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->father_fname)?$user_family_background->father_fname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                        <td colspan="1" style="background-color: #eee; border: 1px solid black; font-size: 8px;">
                            NAME EXTENSION (JR.,SR.)&nbsp;<b>{{ isset($user_family_background->father_xname)?$user_family_background->father_xname:'' }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->father_mname)?$user_family_background->father_mname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td rowspan="4" style="border: 1px solid black; background-color: #eee;">
                        25. MOTHER'S MAIDEN NAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURNAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME
                        </td>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->mother_maiden_name)?$user_family_background->mother_maiden_name:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->mother_surname)?$user_family_background->mother_surname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->mother_fname)?$user_family_background->mother_fname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{!! 
                            htmlentities(isset($user_family_background->mother_mname)?$user_family_background->mother_mname:''
                        , null, 'utf-8') 
                    !!}</b></td>
                    </tr>
                </table>
            </td>
            <td colspan="6" valign="top" style="border-right: 1px solid; border-bottom: 1px solid;">
                <table width="100%" style="padding: 0px; margin-bottom: -5px; margin-top: -4px;">
                    <tr>
                        <td colspan="4" style="background-color: #eee; border: 1px solid black; font-size: 8px; padding:12px;">20. NAME of CHILDREN (Write full name and list all)</td>
                        <td colspan="2" style="background-color: #eee; border: 1px solid black; font-size: 8px; padding:12px;">DATE OF BIRTH(mm/dd/yyyy)</td>
                    </tr>
                    @for($x=0;$x<$child_length;$x++)
                        <tr>
                            <td colspan="4" style="border: 1px solid black;">&nbsp;<b>{{array_key_exists($x, $str1) ? $str1[$x] : ''}}</b></td>
                            <td colspan="2" style="border: 1px solid black;">&nbsp;<b>{{array_key_exists($x, $str2) ? $str2[$x] : ''}}</b></td>
                        </tr>
                    @endfor
                    @for($x=0;$x<=$addRow;$x++)
                        <tr>
                            <td colspan="4" style="border: 1px solid black;">&nbsp;</td>
                            <td colspan="2" style="border: 1px solid black;">&nbsp;</td>
                        </tr>
                    @endfor
                    <tr>
                        <td colspan="6" style="background-color: #eee; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
                    </tr>
                </table>
            </td>
        </tr>
        <table style="table-layout: fixed;">
            <tr>
                <td style="background-color: #979797; border: 1px solid black;" colspan="9"><b style="color:#fff;">III. EDUCATIONAL BACKGROUND</b></td>
            </tr>
            <tr>
                <td rowspan="2" style="border: 1px solid black; background-color: #eee;">
                <center>26. LEVEL </center></td>
                <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>NAME OF SCHOOL <br> (Write in full)</center></td>
                <td rowspan="2" colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>BASIC EDUCATION/DEGREE/COURSE <br> (Write in full)</center></td>
                <td colspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>PERIOD OF ATTENDANCE<br>&nbsp;<br>&nbsp;</center></td>
                <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>HIGHEST LEVEL/ <br> UNITS EARNED <br> (if not graduated)</center></td>
                <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>YEARS <br> GRADUATED</center></td>
                <td rowspan="2" style="border: 1px solid; border: 1px solid black; font-size: 8px;"><center>SCHOLARSHIP <br> ACADEMIC <br> HONORS <br> RECEIVED</center></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">From</td>
                <td style="border-bottom: 1px solid; border: 1px solid black; text-align:center;">To</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; background-color: #eee; text-align:center;">ELEMENTARY</td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{!! htmlentities(isset($user_educational_background->primary_name)?$user_educational_background->primary_name:''
                , null, 'utf-8') 
            !!}</b></td>
                <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{
                 isset($user_educational_background->primary_basic_educ)?$user_educational_background->primary_basic_educ:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->primary_period_from)?$user_educational_background_second->primary_period_from:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->primary_period_to)?$user_educational_background_second->primary_period_to:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->primary_unit)?$user_educational_background_second->primary_unit:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->primary_year_graduated)?$user_educational_background_second->primary_year_graduated:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->primary_scholarship)?$user_educational_background_second->primary_scholarship:'' }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; background-color: #eee; text-align:center;">SECONDARY</td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{!! htmlentities(isset($user_educational_background->secondary_name)?$user_educational_background->secondary_name:''
                , null, 'utf-8') 
            !!}</b></td>
                <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{
                 isset($user_educational_background->secondary_basic_educ)?$user_educational_background->secondary_basic_educ:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->secondary_period_from)?$user_educational_background_second->secondary_period_from:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->secondary_period_to)?$user_educational_background_second->secondary_period_to:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->secondary_unit)?$user_educational_background_second->secondary_unit:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->secondary_year_graduated)?$user_educational_background_second->secondary_year_graduated:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->secondary_scholarship)?$user_educational_background_second->secondary_scholarship:'' }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; background-color: #eee; text-align:center;">VOCATIONAL / TRADE COURSE</td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{!! htmlentities(isset($user_educational_background->vocational_name)?$user_educational_background->vocational_name:''
                , null, 'utf-8') 
            !!}</b></td>
                <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{{
                 isset($user_educational_background->vocational_basic_educ)?$user_educational_background->vocational_basic_educ:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->vocational_period_from)?$user_educational_background_second->vocational_period_from:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->vocational_period_to)?$user_educational_background_second->vocational_period_to:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->vocational_unit)?$user_educational_background_second->vocational_unit:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->vocational_year_graduated)?$user_educational_background_second->vocational_year_graduated:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->vocational_scholarship)?$user_educational_background_second->vocational_scholarship:'' }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; background-color: #eee; text-align:center;">COLLEGE</td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black;  text-align:center;"><b>{!! htmlentities(isset($user_educational_background->college_name)?$user_educational_background->college_name:''
                , null, 'utf-8') 
            !!}</b></td>

                <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{
                 isset($user_educational_background->college_basic_educ)?$user_educational_background->college_basic_educ:'' }} {{
                 isset($user_educational_background->major)?$user_educational_background->major:'' }}</b></td>


                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->college_period_from)?$user_educational_background_second->college_period_from:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->college_period_to)?$user_educational_background_second->college_period_to:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->college_unit)?$user_educational_background_second->college_unit:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->college_year_graduated)?$user_educational_background_second->college_year_graduated:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->college_scholarship)?$user_educational_background_second->college_scholarship:'' }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; background-color: #eee; text-align:center;">GRADUATE STUDIES</td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{!! htmlentities(isset($user_educational_background->graduate_study_name)?$user_educational_background->graduate_study_name:''
                , null, 'utf-8') 
            !!}</b></td>
                <td colspan="2" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{
                 isset($user_educational_background->graduate_basic_educ)?$user_educational_background->graduate_basic_educ:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->graduate_period_from)?$user_educational_background_second->graduate_period_from:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->graduate_period_to)?$user_educational_background_second->graduate_period_to:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->graduate_unit)?$user_educational_background_second->graduate_unit:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->graduate_year_graduated)?$user_educational_background_second->graduate_year_graduated:'' }}</b></td>
                <td colspan="1" style="border-bottom: 1px solid; border: 1px solid black; text-align:center;"><b>{{ 
                    isset($user_educational_background_second->graduate_scholarship)?$user_educational_background_second->graduate_scholarship:'' }}</b></td>
            </tr>
            <tr>
                <td colspan="9" style=" border-bottom: 1px solid; border: 1px solid black;"><center style="color:#ff0000;">(Continue on separate sheet if necessary)</center></td>
            </tr>
            <tr >
                <td style="border: 1px solid black; "><b><center>SIGNATURE</center></b></td>
                <td colspan="3" style="border: 1px solid black;"></td>
                <td colspan="2" style="border: 1px solid black;"><b><center>DATE</center></b></td>
                <td colspan="1" style="border-bottom: 1px solid black;"></td>
                <td colspan="1" style="border-bottom: 1px solid black;"></td>
                <td colspan="1" style="border-right: 1px solid black; border-bottom: 1px solid black;"></td>
            </tr>
        </table>
    </table>
</div>
<div class="page.break" style="page-break-after:always;" ></div>