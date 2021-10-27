<?php

namespace App\Http\Controllers\API;

use App\UserApplicantOption;
use App\UserPersonalInfomation;
use App\UserPersonalResidentialAddress;
use App\UserPersonalPermanentAddress;
use App\UserFamilyBackground;
use App\UserEducationalBackground;
use App\UserEducationalBackgroundSecond;
use App\UserCivilServiceEligibility;
use App\UserWorkExperience;
use App\UserWorkExperienceSheet;
use App\UserVoluntaryWork;
use App\UserLearningDevelopment;
use App\UserOtherInformation;
use App\UserOtherInformationFirst;
use App\UserOtherInformationSecond;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\User;

class PDFController extends Controller
{
    public function print_application_form($application_number, $id)
    {
        $user = User::find($id);
        $user_applicant_option = UserApplicantOption::where('application_number',$application_number)->first();
        $user_personal_information = UserPersonalInfomation::where('application_number',$application_number)->first();
        $user_personal_residential_address = UserPersonalResidentialAddress::where('personal_info_id',$user_personal_information->id)->first();
        $user_personal_permanent_address = UserPersonalPermanentAddress::where('personal_info_id',$user_personal_information->id)->first();
        $user_family_background = UserFamilyBackground::where('application_number',$application_number)->first();
        $user_educational_background = UserEducationalBackground::where('application_number',$application_number)->first();
        $user_educational_background_second = UserEducationalBackgroundSecond::where('educbackground_id',$user_educational_background->id)->first();
        $user_civil_service_eligibility = UserCivilServiceEligibility::where('application_number',$application_number)->first();
        $user_work_experience = UserWorkExperience::where('application_number',$application_number)->first();
        
        $user_work_experience_sheet = UserWorkExperienceSheet::where('work_experience_id',$user_work_experience->id)->first();
        $user_voluntary_work = UserVoluntaryWork::where('application_number',$application_number)->first();
        $user_learning_development = UserLearningDevelopment::where('application_number',$application_number)->first();
        $user_other_information = UserOtherInformation::where('application_number',$application_number)->first();
        $user_first_background_info = UserOtherInformationFirst::where('other_info_id',$user_other_information->id)->first();
        $user_second_background_info = UserOtherInformationSecond::where('other_info_id',$user_other_information->id)->first();
        $data = [
    		'user'                                  => $user,
    		'user_applicant_option'                 => $user_applicant_option,
    		'user_personal_information'             => $user_personal_information,
    		'user_personal_residential_address'     => $user_personal_residential_address,
    		'user_personal_permanent_address'       => $user_personal_permanent_address,
    		'user_family_background'                => $user_family_background,
    		'user_educational_background'           => $user_educational_background,
    		'user_educational_background_second'    => $user_educational_background_second,
    		'user_civil_service_eligibility'        => $user_civil_service_eligibility,
    		'user_work_experience'                  => $user_work_experience,
    		'user_work_experience_sheet'            => $user_work_experience_sheet,
    		'user_voluntary_work'                   => $user_voluntary_work,
    		'user_learning_development'             => $user_learning_development,
    		'user_other_information'                => $user_other_information,
    		'user_first_background_info'            => $user_first_background_info,
    		'user_second_background_info'           => $user_second_background_info,
        ];
        $pdf = PDF::loadView('pdf.application_form', $data)->setPaper('folio')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
    	return $pdf->stream('ApplicationForm.pdf');
    }

    public function RQA()
    {
        return PDF::loadView('excel.comparative_assessment_report', [
            
        ])->stream('RQA.pdf');
    }

    public function service_record()
    {
        return PDF::loadView('excel.service_record', [
            
        ])->stream('Service Record.pdf');
    }
}
