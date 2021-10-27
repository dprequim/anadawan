<!DOCTYPE html>
<html lang="en">
  <head>
    @include('pdf.pdfcss')
  </head>
  <body>
    @php
        $str1 = explode('1%a#^$1', isset($user_family_background->name_of_child)
            ? $user_family_background->name_of_child : '');
        $str2 = explode('1%a#^$1', isset($user_family_background->date_of_birth)
            ? $user_family_background->date_of_birth : '');
        $child = [
            $str1count = count($str1),
            $str2count = count($str2),
        ];
        $child_length = max($child);
        $addRow = 11 - $child_length;

        $civil1 = explode('1%a#^$1', isset($user_civil_service_eligibility->career_service)
            ? $user_civil_service_eligibility->career_service: '');
        $civil2 = explode('1%a#^$1', isset($user_civil_service_eligibility->ratings)
            ? $user_civil_service_eligibility->ratings: '');
        $civil3 = explode('1%a#^$1', isset($user_civil_service_eligibility->date_of_exam)
            ? $user_civil_service_eligibility->date_of_exam: '');
        $civil4 = explode('1%a#^$1', isset($user_civil_service_eligibility->place_of_exam)
            ? $user_civil_service_eligibility->place_of_exam: '');
        $civil5 = explode(',', isset($user_civil_service_eligibility->license_number)
            ? $user_civil_service_eligibility->license_number: '');
        $civil6 = explode('1%a#^$1', isset($user_civil_service_eligibility->license_validity)
            ? $user_civil_service_eligibility->license_validity: '');
        $newcivils = [
            $civil1count = count($civil1),
            $civil2count = count($civil2),
            $civil3count = count($civil3),
            $civil4count = count($civil4),
            $civil5count = count($civil5),
            $civil6count = count($civil6),
        ];
        $civil_length = max($newcivils);
        $civilAddRow = 7 - $civil_length;
        

        $work1 = explode('1%a#^$1', isset($user_work_experience->inclusive_date_from)
            ? $user_work_experience->inclusive_date_from  : '');

        $work2 = explode('1%a#^$1', isset($user_work_experience->inclusive_date_to)
            ? $user_work_experience->inclusive_date_to  : '');

        $work3 = explode('1%a#^$1', isset($user_work_experience->position_titles)
            ?$user_work_experience->position_titles  : '');

        $work4 = explode('1%a#^$1', isset($user_work_experience->companies)
            ?$user_work_experience->companies : '');
        $work5 = explode('1%a#^$1', isset($user_work_experience->monthly_salaries) 
            ? $user_work_experience->monthly_salaries  : '');

        $work6 = explode('1%a#^$1', isset($user_work_experience->salary_pay_grade)
            ? $user_work_experience->salary_pay_grade  : '');

        $work7 = explode('1%a#^$1', isset($user_work_experience->appointment_status)
            ? $user_work_experience->appointment_status : '');

        $work8 = explode(',', isset($user_work_experience->govt_service)
            ? $user_work_experience->govt_service : '');
        $newworks = [
            $work1count = count($work1),
            $work2count = count($work2),
            $work3count = count($work3),
            $work4count = count($work4),
            $work5count = count($work5),
            $work6count = count($work6),
            $work7count = count($work7),
            $work8count = count($work8),
        ];
        $work_length = max($newworks);
        $workAddRow = 35 - $work_length;

        $voluntary1 = explode('1%a#^$1', isset($user_voluntary_work->name_and_address_org)
            ? $user_voluntary_work->name_and_address_org : '');
        $voluntary2 = explode('1%a#^$1', isset($user_voluntary_work->org_inclusive_from)
            ? $user_voluntary_work->org_inclusive_from : '');
        $voluntary3 = explode('1%a#^$1', isset($user_voluntary_work->org_inclusive_to)
            ? $user_voluntary_work->org_inclusive_to : '');
        $voluntary4 = explode(',', isset($user_voluntary_work->no_of_hours)
            ? $user_voluntary_work->no_of_hours : '');
        $voluntary5 = explode('1%a#^$1', isset($user_voluntary_work->position)
            ? $user_voluntary_work->position : '');
        $newvoluntaries = [
            $voluntary1count = count($voluntary1),
            $voluntary2count = count($voluntary2),
            $voluntary3count = count($voluntary3),
            $voluntary4count = count($voluntary4),
            $voluntary5count = count($voluntary5),
        ];
        $voluntary_length = max($newvoluntaries);
        $voluntaryAddRow = 6 - $voluntary_length;

        $learning1 = explode('1%a#^$1', isset($user_learning_development->training_programs)
            ? $user_learning_development->training_programs : '');
        $learning2 = explode('1%a#^$1', isset($user_learning_development->program_inclusive_from)
            ? $user_learning_development->program_inclusive_from : '');
        $learning3 = explode('1%a#^$1', isset($user_learning_development->program_inclusive_to)
            ? $user_learning_development->program_inclusive_to : '');
        $learning4 = explode(',', isset($user_learning_development->no_of_hours)
            ? $user_learning_development->no_of_hours : '');
        $learning5 = explode('1%a#^$1', isset($user_learning_development->ld_type)
            ? $user_learning_development->ld_type : '');
        $learning6 = explode('1%a#^$1', isset($user_learning_development->sponsored_by)
            ? $user_learning_development->sponsored_by : '');
        $newlearnings = [
            $learning1count = count($learning1),
            $learning2count = count($learning2),
            $learning3count = count($learning3),
            $learning4count = count($learning4),
            $learning5count = count($learning5),
            $learning6count = count($learning6),
        ];
        $learning_length = max($newlearnings);
        $learningAddRow = 20 - $learning_length;

        $info1 = explode('1%a#^$1', isset($user_other_information->skills_and_hobbies)
            ? $user_other_information->skills_and_hobbies : '');
        $info2 = explode('1%a#^$1', isset($user_other_information->non_acad_recognition)
            ? $user_other_information->non_acad_recognition : '');
        $info3 = explode('1%a#^$1', isset($user_other_information->recognition)
            ? $user_other_information->recognition : '');
        $newinfos = [
            $info1count = count($info1),
            $info2count = count($info2),
            $info3count = count($info3),
        ];
        $info_length = max($newinfos);
        $infoAddRow = 9 - $info_length;

        $reference1 = explode('1%a#^$1', isset($user_second_background_info->name)
            ? $user_second_background_info->name : '');
        $reference2 = explode('1%a#^$1', isset($user_second_background_info->address)
            ? $user_second_background_info->address : '');
        $reference3 = explode('1%a#^$1', isset($user_second_background_info->tel_no)
            ? $user_second_background_info->tel_no : '');
        $newrefs = [
            $reference1count = count($reference1),
            $reference2count = count($reference2),
            $reference3count = count($reference3),
        ];
        $reference_length = max($newrefs);

        $worksheet1 = explode('1%a#^$1', isset($user_work_experience_sheet->duration)
            ? $user_work_experience_sheet->duration : '');
        $worksheet2 = explode('1%a#^$1', isset($user_work_experience_sheet->work_sheet_position)
            ? $user_work_experience_sheet->work_sheet_position : '');
        $worksheet3 = explode('1%a#^$1', isset($user_work_experience_sheet->name_of_office_unit)
            ? $user_work_experience_sheet->name_of_office_unit : '');
        $worksheet4 = explode('1%a#^$1', isset($user_work_experience_sheet->immediate_supervisor)
            ? $user_work_experience_sheet->immediate_supervisor : '');
        $worksheet5 = explode('1%a#^$1', isset($user_work_experience_sheet->name_location_of_agency)
            ? $user_work_experience_sheet->name_location_of_agency : '');
        $worksheet6 = explode('1%a#^$1', isset($user_work_experience_sheet->list_of_contributions)
            ? $user_work_experience_sheet->list_of_contributions : '');
        $worksheet7 = explode('1%a#^$1', isset($user_work_experience_sheet->summaries_of_actual_duties) 
            ? $user_work_experience_sheet->summaries_of_actual_duties : '');
        $newworksheets = [
            $worksheet1count = count($worksheet1),
            $worksheet2count = count($worksheet2),
            $worksheet3count = count($worksheet3),
            $worksheet4count = count($worksheet4),
            $worksheet5count = count($worksheet5),
            $worksheet6count = count($worksheet6),
            $worksheet7count = count($worksheet7)
        ];
        $worksheet_length = max($newworksheets);
    @endphp
    <div style="padding: 20px;">
        <!-- <div class="page" style="page-break-after: always; page-break-inside: avoid;"> -->
        <!-- @include('pdf.page1') -->
        <!-- </div> -->
        <!-- 1st page -->
        @include('pdf.page1')
        <!-- 2nd page -->
        <br>
        <div class="row page">
            @include('pdf.page2')
        </div>
        <!-- 3rd page -->
        <div class="row page">
            @include('pdf.page3')
        </div>
        <!-- 4th page -->
        <div class="row page">
            @include('pdf.page4')
        </div><br><br><br>
        <!-- 5th page -->
        <div class="row page">
            @include('pdf.page5')
        </div>
        <br><br><br>
        <div class="row" style="width:100%; text-align:right" >
            <p>____________________________<br>
            (Signature over Printed Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            of Employee/Applicant)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>

            Date: __________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </div>
    </div>
  </body>
</html>