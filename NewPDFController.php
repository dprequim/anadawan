<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Form7;
use App\CurrentAbsences;
use App\CurrentTardiness;
use App\User;
use App\School;
use App\Position;
use App\Deduction;
use App\PayrollDeduction;
use App\Payroll;
use App\Promotion;
use App\Form7Dates;
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
use App\OverallNonTeachingPoints;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use NumberToWords\NumberToWords;
use Illuminate\Support\Str;
use Storage;

class NewPDFController extends Controller
{
	public function index($application_number,$id)
	{	
		$user = User::find($id);
		$user_applicant_option = UserApplicantOption::where('application_number',$application_number)->where('user_id',$id)->first();
		$user_personal_information = UserPersonalInfomation::where('application_number',$application_number)->where('user_id',$id)->first();
		if ($user_personal_information) {
			$user_personal_residential_address = UserPersonalResidentialAddress::where('personal_info_id',$user_personal_information->id)->where('user_id',$id)->first();
			$user_personal_permanent_address = UserPersonalPermanentAddress::where('personal_info_id',$user_personal_information->id)->where('user_id',$id)->first();
		}
		$user_family_background = UserFamilyBackground::where('application_number',$application_number)->where('user_id',$id)->first();
		$user_educational_background = UserEducationalBackground::where('application_number',$application_number)->where('user_id',$id)->first();
		if($user_educational_background) {
			$user_educational_background_second = UserEducationalBackgroundSecond::where('educbackground_id',$user_educational_background->id)->first();
		}
		$user_civil_service_eligibility = UserCivilServiceEligibility::where('application_number',$application_number)->where('user_id',$id)->first();
		$user_work_experience = UserWorkExperience::where('application_number',$application_number)->where('user_id',$id)->first();
		if($user_work_experience) {
			$user_work_experience_sheet = UserWorkExperienceSheet::where('work_experience_id',$user_work_experience->id)->first();
		}

		$user_voluntary_work = UserVoluntaryWork::where('application_number',$application_number)->where('user_id',$id)->first();
		$user_learning_development = UserLearningDevelopment::where('application_number',$application_number)->where('user_id',$id)->first();
		$user_other_information = UserOtherInformation::where('application_number',$application_number)->where('user_id',$id)->first();
		if($user_other_information) {
			$user_first_background_info = UserOtherInformationFirst::where('other_info_id',$user_other_information->id)->where('user_id',$id)->first();
			$user_second_background_info = UserOtherInformationSecond::where('user_id',$id)->where('user_id',$id)->first();
		}
		$bg1 = public_path("images/bg1.png");
		$bg2 = public_path("images/bg2.png");
		$bg3 = public_path("images/bg3.png");
		$bg4 = public_path("images/bg4.png");
		$data = [
			'bg1'									=> $bg1,
			'bg2'									=> $bg2,
			'bg3'									=> $bg3,
			'bg4'									=> $bg4,
			'user'                                  => $user,
			'user_applicant_option'                 => isset($user_applicant_option)?$user_applicant_option:'',
			'user_personal_information'             => isset($user_personal_information)?$user_personal_information:'',
			'user_personal_residential_address'     => isset($user_personal_residential_address)?$user_personal_residential_address:'',
			'user_personal_permanent_address'       => isset($user_personal_permanent_address)?$user_personal_permanent_address:'',
			'user_family_background'                => isset($user_family_background)?$user_family_background:'',
			'user_educational_background'           => isset($user_educational_background)?$user_educational_background:'',
			'user_educational_background_second'    => isset($user_educational_background_second)?$user_educational_background_second:'',
			'user_civil_service_eligibility'        => isset($user_civil_service_eligibility)?$user_civil_service_eligibility:'',
			'user_work_experience'                  => isset($user_work_experience)?$user_work_experience:'',
			'user_work_experience_sheet'            => isset($user_work_experience_sheet)?$user_work_experience_sheet:'',
			'user_voluntary_work'                   => isset($user_voluntary_work)?$user_voluntary_work:'',
			'user_learning_development'             => isset($user_learning_development)?$user_learning_development:'',
			'user_other_information'                => isset($user_other_information)?$user_other_information:'',
			'user_first_background_info'            => isset($user_first_background_info)?$user_first_background_info:'',
			'user_second_background_info'           => isset($user_second_background_info)?$user_second_background_info:'',
		];
		$pdf = PDF::loadView('pdf.invoice', $data)->setPaper('legal')->setOption('margin-top', 0)->setOption('margin-left', 0)->setOption('margin-bottom', 0)->setOption('margin-right',0);
		return $pdf->stream('Personal Data Sheet.pdf');  
	}

	public function comparative_assessment($date_from,$date_to,$keyword)
	{
		

		if($keyword == 'pdf')
		{
			$data = DB::table("overall_non_teaching_points as overall")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('user_civil_service_eligibilities as civil_service','civil_service.application_number','=','applicant.application_number')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('user_work_experiences as work_exp','work_exp.application_number','=','applicant.application_number')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'educ_background.college_basic_educ as college_basic_educ',
				'educ_background.college_name as college_name',
				'personal_permanent.mobile_no as mobile_no',
				'work_exp.position_titles as position_titles',
				'civil_service.ratings as ratings',
				DB::raw('round(DATEDIFF(work_exp.inclusive_date_to, work_exp.inclusive_date_from) / 365) as years'),
				'civil_service.career_service as career_service',
				'overall.performance as performance',
				'overall.experience as experience',
				'overall.outstanding_performance as outstanding_performance',
				'overall.education as education',
				'overall.training as training',
				'overall.potential_interview as potential_interview',
				'overall.psychological_attributes as psychological_attributes',
				'overall.skills_test as skills_test',
				'overall.total as total',
				DB::raw('dense_rank() over (order by overall.total desc) as rank')
			])->whereBetween('overall.created_at',array($date_from,$date_to))->orderBy('overall.total', 'DESC')->get();
			// return $data;
			$retval = [];
			foreach ($data as $item) {
				$position_titles = explode('1%a#^$1',$item->position_titles);
				$ratings = explode('1%a#^$1',$item->ratings);										
				$career_service = explode('1%a#^$1',$item->career_service);		
				
				$item->position_titles = $position_titles;
				$item->ratings = $ratings;
				$item->career_service = $career_service;

				array_push($retval, $item);
			}	

			$pdf = PDF::loadView('pdf.comparative_assessment',compact('data'))->setPaper('folio','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('Comparative assessment Report.pdf');
		}
		if($keyword == 'word-excel')
		{
			$data = DB::table("overall_non_teaching_points as overall")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('user_civil_service_eligibilities as civil_service','civil_service.application_number','=','applicant.application_number')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('user_work_experiences as work_exp','work_exp.application_number','=','applicant.application_number')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'educ_background.college_basic_educ as college_basic_educ',
				'educ_background.college_name as college_name',
				'personal_permanent.mobile_no as mobile_no',
				'work_exp.position_titles as position_titles',
				'civil_service.ratings as ratings',
				DB::raw('round(DATEDIFF(work_exp.inclusive_date_to, work_exp.inclusive_date_from) / 365) as years'),
				'civil_service.career_service as career_service',
				'overall.performance as performance',
				'overall.experience as experience',
				'overall.outstanding_performance as outstanding_performance',
				'overall.education as education',
				'overall.training as training',
				'overall.potential_interview as potential_interview',
				'overall.psychological_attributes as psychological_attributes',
				'overall.skills_test as skills_test',
				'overall.total as total',
				DB::raw('dense_rank() over (order by overall.total desc) as rank')
			])->whereBetween('overall.created_at',array($date_from,$date_to))->get();

			$retval = [];
			foreach ($data as $item) {
				$position_titles = explode('1%a#^$1',$item->position_titles);
				$ratings = explode('1%a#^$1',$item->ratings);										
				$career_service = explode('1%a#^$1',$item->career_service);		
				
				$item->position_titles = $position_titles;
				$item->ratings = $ratings;
				$item->career_service = $career_service;

				array_push($retval, $item);
			}	
			return response()->json(compact('data'));
		}
		
	}
	
	public function elementary_teacher_applicants($date_from,$date_to,$keyword)
	{
		if($keyword == 'pdf')
		{
			$data = DB::table("overall_teaching_points as overall")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->leftJoin('teaching_points_by_panels as teaching_points', 'teaching_points.applicant_id', '=', 'applicant.application_number')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.district as district',
				'educ_background.major as major',
				'teaching_points.gwa as gwa',
				'teaching_points.ma_ms_phd as ma_ms_phd',
				'teaching_points.no_of_months as no_of_months',
				'teaching_points.let as let',
				'teaching_points.pbet as pbet',
				'teaching_points.percent_score as percent_score',
				'overall.teaching_experience_points as teaching_experience_points',
				'overall.training_and_skill_points as training_and_skill_points',
				'overall.interview_points as interview_points',
				'overall.education_points as education_points',
				'overall.let_pbet_rating_points as let_pbet_rating_points',
				'overall.sub_total as sub_total',
				'overall.demo_teaching_points as demo_teaching_points',
				'overall.communication_skill_points as communication_skill_points',
				'overall.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall.grand_total desc) as rank')
			])->whereBetween('overall.created_at',array($date_from,$date_to))->where('applicant.status', '=', 'Under assessment')->orderBy('overall.grand_total', 'DESC')->groupBy('teaching_points.applicant_id')->get();

			$pdf = PDF::loadView('pdf.elem_teacher_applicants',compact('data'))->setPaper('folio','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('Elementary Teacher Applicants Report.pdf');
		}

		if($keyword == 'word-excel')
		{
			$data = DB::table("overall_teaching_points as overall")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->leftJoin('teaching_points_by_panels as teaching_points', 'teaching_points.applicant_id', '=', 'applicant.application_number')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.district as district',
				'educ_background.major as major',
				'teaching_points.gwa as gwa',
				'teaching_points.ma_ms_phd as ma_ms_phd',
				'teaching_points.no_of_months as no_of_months',
				'teaching_points.let as let',
				'teaching_points.pbet as pbet',
				'teaching_points.percent_score as percent_score',
				'overall.teaching_experience_points as teaching_experience_points',
				'overall.training_and_skill_points as training_and_skill_points',
				'overall.interview_points as interview_points',
				'overall.education_points as education_points',
				'overall.let_pbet_rating_points as let_pbet_rating_points',
				'overall.sub_total as sub_total',
				'overall.demo_teaching_points as demo_teaching_points',
				'overall.communication_skill_points as communication_skill_points',
				'overall.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall.grand_total desc) as rank')	
			])->whereBetween('overall.created_at',array($date_from,$date_to))->where('applicant.status', '=', 'Under assessment')->orderBy('overall.grand_total', 'DESC')->groupBy('teaching_points.applicant_id')->get();

			return $data;
		}
	}

	public function service_record($user_id)
	{
		$service_records = ServiceRecord::where('user_id', $user_id)->get();
		$birth_place = UserPersonalInfomation::select('place_of_birth')->where('user_id', $user_id)->first();
		$employee_details = User::where('id', $user_id)->select('first_name', 'last_name', 'middle_name', 'birthdate')->first();
		$employee_details->place_of_birth = $birth_place->place_of_birth;
		$employee_details->middle_initial = $employee_details->middle_name[0].'.';


		$pdf = PDF::loadView('pdf.service_record',compact('employee_details','service_records'))->setPaper('folio')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
		return $pdf->stream('Service Record.pdf');
	}

	public function rqa_elementary($date_from,$date_to,$keyword)
	{
		if($keyword == 'pdf')
		{
			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.district as district',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Elementary School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get();

			$pdf = PDF::loadView('pdf.rqa_elementary',compact('data'))->setPaper('folio')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('RQA Elementary.pdf');
		}

		if($keyword == 'word-excel')
		{
			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.district as district',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Elementary School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get();

			return $data;
		}
	}
	
	public function rqa_secondary($date_from,$date_to,$keyword)
	{
		if($keyword == 'pdf')
		{
			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.cluster as cluster',
				'applicant.subject as subject',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Junior High School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get()->groupBy(function($item) {
				return $item->subject;
			});
			
			$pdf = PDF::loadView('pdf.rqa_secondary',compact('data'))->setPaper('folio')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('RQA Secondary.pdf');
		}

		if($keyword == 'word-excel')
		{
			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
				DB::raw("CONCAT(personal_permanent.permanent_house_no,' ',personal_permanent.permanent_street,' ',personal_permanent.permanent_village,' ',personal_permanent.permanent_barangay,' ',personal_permanent.permanent_city,' ',personal_permanent.permanent_province) as address"),
				'personal_permanent.mobile_no as mobile_no',
				'school.cluster as cluster',
				'applicant.subject as subject',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Junior High School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get()->groupBy(function($item) {
				return $item->subject;
			});

			return $data;
		}
	}

	public function rqa_senior_high($date_from,$date_to,$keyword)
	{
		if($keyword == 'pdf')
		{

			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
			// DB::raw("CONCAT(personal_permanent.permanent_street,',',' ',personal_permanent.permanent_city) as address"),
			// 'personal_permanent.mobile_no as mobile_no',
				'applicant.strand as strand',
				'educ_background.major as major',
				'overall_teaching.teaching_experience_points as teaching_experience_points',
				'overall_teaching.training_and_skill_points as training_and_skill_points',
				'overall_teaching.interview_points as interview_points',
				'overall_teaching.education_points as education_points',
				'overall_teaching.let_pbet_rating_points as let_pbet_rating_points',
				'overall_teaching.demo_teaching_points as demo_teaching_points',
				'overall_teaching.communication_skill_points as communication_skill_points',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Senior High School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get()->groupBy(function($item) {
				return $item->strand;
			});

			$pdf = PDF::loadView('pdf.rqa_senior_high',compact('data'))->setPaper('folio')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('RQA Senior High School.pdf');
		}

		if($keyword == 'word-excel')
		{
			$data = DB::table("overall_teaching_points as overall_teaching")		
			->leftJoin('user_applicant_options as applicant','applicant.application_number','=','overall_teaching.applicant_id')
			->leftJoin('users as user','user.id','=','applicant.user_id')
			->leftJoin('user_educational_backgrounds as educ_background','educ_background.application_number','=','applicant.application_number')
			->leftJoin('user_personal_permanent_addresses as personal_permanent','personal_permanent.user_id','=','user.id')
			->leftJoin('schools as school', 'school.id', '=', 'applicant.school_id')
			->select([
				DB::raw("CONCAT(user.last_name,',',' ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
			// DB::raw("CONCAT(personal_permanent.permanent_street,',',' ',personal_permanent.permanent_city) as address"),
			// 'personal_permanent.mobile_no as mobile_no',
				'applicant.strand as strand',
				'educ_background.major as major',
				'overall_teaching.teaching_experience_points as teaching_experience_points',
				'overall_teaching.training_and_skill_points as training_and_skill_points',
				'overall_teaching.interview_points as interview_points',
				'overall_teaching.education_points as education_points',
				'overall_teaching.let_pbet_rating_points as let_pbet_rating_points',
				'overall_teaching.demo_teaching_points as demo_teaching_points',
				'overall_teaching.communication_skill_points as communication_skill_points',
				'overall_teaching.grand_total as grand_total',
				DB::raw('dense_rank() over (order by overall_teaching.grand_total desc) as rank')
			])->where('applicant.teaching_category', '=', 'Senior High School')->where('applicant.status', '=', 'Under assessment')->where('overall_teaching.grand_total', '>=', '70')->whereBetween('applicant.created_at',array($date_from,$date_to))->orderBy('overall_teaching.grand_total', 'DESC')->get()->groupBy(function($item) {
				return $item->strand;
			});

			return $data;
		}
	}
	
	public function form7($school_id,$date,$keyword)
	{
		$school = School::where('id',$school_id)->select('school_name')->first();

		$form_dates = Form7Dates::where('form7_date','=',$date)->first();
		$id = $form_dates->id;
		$date = $form_dates->form7_date;

		$dateMonthYear = explode('-', $date);
		$year = $dateMonthYear[0];
		$month = $dateMonthYear[1];

		if($keyword == 'pdf')
		{

			$data = Form7::with('employee:id,first_name,last_name,middle_name')->where('form_id',$id)->where('school_id',$school_id)->get();

			$pdf = PDF::loadView('pdf.form7',compact('data','month','year','school'))->setPaper('folio','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('Form 7 Report.pdf');
		}

		if($keyword == 'word-excel')
		{

			$data = Form7::with('employee:id,first_name,last_name,middle_name')->where('form_id',$id)->where('school_id',$school_id)->get();

			return $data;
		}
	}

	public function form7_dates($form_id,$school_id)
	{
		$school = School::where('id',$school_id)->select('school_name')->first();

		$form7_dates = Form7Dates::where('id',$form_id)->first();
		$date = $form7_dates->form7_date;

		$dateMonthYear = explode('-', $date);
		$year = $dateMonthYear[0];
		$month = $dateMonthYear[1];

		$data = Form7::with('employee:id,first_name,last_name,middle_name')->where('form_id',$form_id)->where('school_id',$school_id)->get();

		$pdf = PDF::loadView('pdf.form7_dates',compact('data','school','month','year'))->setPaper('folio','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
		return $pdf->stream('Form 7.pdf');
	}

	public function payroll_slip($form_id,$school_id,$user_id,$payroll_id,$form7_id)
	{
		$form7_dates = Form7Dates::where('id',$form_id)->first();
		$date = $form7_dates->form7_date;

		$dateMonthYear = explode('-', $date);
		$year = $dateMonthYear[0];
		$month = $dateMonthYear[1];
		
 		// $dateNow = Carbon::now();
		$promotion = Promotion::whereDate('effectivity_date','<=',Carbon::parse($date)->subMonth()->endOfMonth()->toDateString())->where('user_id',$user_id)->orderBy('effectivity_date','DESC')->first();


		if(!$promotion)
		{
			$promotion = Promotion::whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString())->where('user_id',$user_id)->orderBy('effectivity_date','DESC')->first();
		}
		
		$school = School::where('id',$promotion->school_id)->select('district', 'congressional_district','region',
			'school_name', 'school_type','school_code')->first();

		$position = Position::where('position_name',$promotion->position)->select('position_code')->first();

		$payroll_deduction = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

			$query->where('user_id','=',$user_id)
			->where('status','=','Active')
			->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
			->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

		})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();
		
		$payroll_deduction_with_null_termination = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

			$query->where('user_id','=',$user_id)
			->where('status','=','Active')
			->whereNotNull('effectivity_date')
			->whereNull('termination_date')
			->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

		})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

		$payroll_deduction_with_null = PayrollDeduction::whereHas('deduction', function($query) use($user_id){ 

			$query->where('user_id', '=',$user_id)
			->where('status', '=', "Active")
			->whereNull('effectivity_date')
			->whereNull('termination_date')
			->where('code','!=','0068');
			
		})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

		$payroll_deduction_undeducted = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

			$query->where('user_id',$user_id)
			->where('status', '=', "InActive")
			->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
			->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

		})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

		$undeducted_with_null_termination = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

			$query->where('user_id',$user_id)
			->where('status', '=', "InActive")
			->whereNotNull('effectivity_date')
			->whereNull('termination_date')
			->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

		})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

		$absences = CurrentAbsences::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_absent')
		->get(['form_id','user_id','date_of_absent','salary','pera']);

		$tardiness = CurrentTardiness::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_tardy')
		->get(['form_id','user_id','date_of_tardy','salary','minutes','pera']);

        //get effectivity dates 
		$t_date = Form7Dates::where('id',$form_id)->first();
		if($t_date) {
			$t_month_year = explode('-', $t_date->form7_date);
			$termination_date = $t_month_year[1].' '.$t_month_year[0];
		}
		$absent_date_first = $absences->first();
		$tardy_date_first = $tardiness->first();
		$absent_date = '';
		$tardy_date = '';
		if($absent_date_first){
			$e_month_year = explode('-', $absent_date_first->date_of_absent);
			$absent_date = $e_month_year[1].' '.$e_month_year[0];
		}
		if($tardy_date_first){
			$e_month_year = explode('-', $tardy_date_first->date_of_tardy);
			$tardy_date = $e_month_year[1].' '.$e_month_year[0];
		}

		if($absent_date && $tardy_date){
			if($absent_date <= $tardy_date)
			{
				$effectivity_date = $absent_date;
			} else {
				$effectivity_date = $tardy_date;
			}
		} else {
			if($absent_date) {
				$effectivity_date = $absent_date;
			} else {
				$effectivity_date = $tardy_date;
			}
		}
        //end effectivity dates
        //compute current absences
		if($absences) {
			$sum_absences = 0;
			foreach ($absences as $absence) {
				if($absence->date_of_absent) {
					$start = Carbon::parse($absence->date_of_absent)->startOfMonth();
					$end = Carbon::parse($absence->date_of_absent)->endOfMonth();

					$from = Carbon::parse($start);
					$to = Carbon::parse($end);
					$weekDays = $from->diffInWeekdays($to);
					$gross_pay = $absence->salary + $absence->pera;

					$absences_deduction[] = ($gross_pay/$weekDays/8/60) * (480 * 1);
					$total = ($gross_pay/$weekDays/8/60) * (480 * 1);
					$sum_absences += $total;
				}
			}
		}
		if($tardiness) {
			$sum_tardiness = 0;
			foreach ($tardiness as $tardy) {
				if($tardy->date_of_tardy) {
					$start = Carbon::parse($tardy->date_of_tardy)->startOfMonth();
					$end = Carbon::parse($tardy->date_of_tardy)->endOfMonth();

					$from = Carbon::parse($start);
					$to = Carbon::parse($end);
					$weekDays = $from->diffInWeekdays($to);
					$gross_pay = $tardy->salary + $tardy->pera;

					$current_tardiness[] = ($gross_pay/$weekDays/8/60) * ($tardy->minutes);
					$total = ($gross_pay/$weekDays/8/60) * ($tardy->minutes * 1);
					$sum_tardiness += $total;
				}
			}
		}
        // return ['total'=>$total,'weekDays'=>$weekDays,'from'=>$from];
		$description = 'CURRENT ABSENCES';
		$code = '0068';
		$deduction_amount = (isset($sum_absences)?$sum_absences:0) + (isset($sum_tardiness)?$sum_tardiness:0);
        // return $deduction_amount;
		$update_ca = Deduction::where('user_id',$user_id)->where('code','=','0068')->first();
		if($update_ca)
		{
			PayrollDeduction::where(
				'deduction_id',$update_ca->id)->update([
					'deduction_amount' => isset($deduction_amount) ? round($deduction_amount,2) : '0.00',
				]);

			}

        // $update_ca->id = $deduction_amount;
			$current_absences = [
				'description'=>$description,
				'code'=>$code,
				'effectivity_date'=>$effectivity_date,
				'termination_date'=>$termination_date,
				'deduction_amount'=> round($deduction_amount,2)
			]; 

			$data = DB::table("form7s as form7")
			->leftJoin('users as user','user.id','=','form7.user_id')
			->select([
				'user.account_number as account_number',
				'user.pera as pera',
				'user.division_code as division_code',
				'user.division_description as division_description',
				'user.hiring_date as hiring_date',
				'user.retirement_date as retirement_date',
				'form7.name as name',
				'form7.employee_no as employee_no',
				DB::raw("CONCAT(user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',user.last_name,' ',IFNULL(user.extension_name, '')) as user_name")
			])->where('form7.form_id',$form_id)->where('form7.school_id',$school_id)->where('form7.user_id',$user_id)->first();


		$netPay = Form7::where('user_id', $user_id)
        ->with('form:id,form7_date')
        ->with('payroll:form7_id,net_pay')->get(['id','form_id']);

        $chart = $this->graphIndividual($user_id);
        // return $chart;

			$pdf = PDF::loadView('pdf.payroll_slip',
				compact('current_absences',
					'data',
					'month',
					'year',
					'school',
					'position',
					'promotion',
					'payroll_deduction',
					'payroll_deduction_undeducted',
					'payroll_deduction_with_null',
					'payroll_deduction_with_null_termination',
					'undeducted_with_null_termination',
					'chart'
				))
			->setPaper('letter')
			->setOption('margin-top', 12)
			->setOption('margin-left', 5)
			->setOption('margin-bottom', 12)
			->setOption('margin-right', 5);
			return $pdf->stream('Payroll Slip.pdf');
		}

		public function payroll_register($date,$school_id,$type,$keyword)
		{
			if($type == 'without_signature' && $keyword == 'pdf')
			{
				$dateMonthYear = explode('-', $date);
				$year = $dateMonthYear[0];
				$month = $dateMonthYear[1];

				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';

				$payroll = DB::table("form7s as form7")
				->leftjoin('payroll as payroll','payroll.form7_id','=','form7.id')
				->leftjoin('user_personal_infomations as personal','personal.user_id','=','payroll.user_id')
				->leftjoin('schools as school','school.id','=','payroll.school_id')
				->leftjoin('users as user','user.id','=','payroll.user_id')
				->select([
					'payroll.user_id',
					'payroll.form7_id',
					'payroll.id',
					'payroll.net_pay',
					'payroll.tranche_id',
					'payroll.gross_pay',
					'payroll.salary',
					'payroll.step',
					'payroll.salary_grade',
					'payroll.pera',
					'payroll.position',
					'payroll.position_code',
					'payroll.net_pay',
					'payroll.total_deductions',
					'personal.employee_no',
					'user.account_number',
					'user.first_name',
					'user.middle_name',
					'user.last_name',
					'user.extension_name',
					'user.hiring_date',
					'user.retirement_date',
					'school.district', 
					'school.school_name', 
					'school.school_type',
				])
				->where('form7.form_id', $form_id)
				->where('payroll.school_id', $school_id)->orderBy('personal.employee_no','ASC')
				->get();

				$retval = [];
				foreach ($payroll as $item) {
					$user_id = $item->user_id;
					$form7_id = $item->form7_id;
					$payroll_id = $item->id;

        			 $image_path = public_path().'\\temp_image\\'.$user_id.'.png';

					$payroll_deduction = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

						$query->where('user_id','=',$user_id)
						->where('status','=','Active')
						->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_with_null_termination = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

						$query->where('user_id','=',$user_id)
						->where('status','=','Active')
						->whereNotNull('effectivity_date')
						->whereNull('termination_date')
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_with_null = PayrollDeduction::whereHas('deduction', function($query) use($user_id){ 

						$query->where('user_id', '=',$user_id)
						->where('status', '=', "Active")
						->whereNull('effectivity_date')
						->whereNull('termination_date')
						->where('code','!=','0068');

					})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_undeducted = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

						$query->where('user_id',$user_id)
						->where('status', '=', "InActive")
						->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$undeducted_with_null_termination = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

						$query->where('user_id',$user_id)
						->where('status', '=', "InActive")
						->whereNotNull('effectivity_date')
						->whereNull('termination_date')
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$absences = CurrentAbsences::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_absent')
					->get(['form_id','user_id','date_of_absent','salary','pera']);

					$tardiness = CurrentTardiness::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_tardy')
					->get(['form_id','user_id','date_of_tardy','salary','minutes','pera']);

        //get effectivity dates 
					$t_date = Form7Dates::where('id',$form_id)->first();
					if($t_date) {
						$t_month_year = explode('-', $t_date->form7_date);
						$termination_date = $t_month_year[1].' '.$t_month_year[0];
					}
					$absent_date_first = $absences->first();
					$tardy_date_first = $tardiness->first();
					$absent_date = '';
					$tardy_date = '';
					if($absent_date_first){
						$e_month_year = explode('-', $absent_date_first->date_of_absent);
						$absent_date = $e_month_year[1].' '.$e_month_year[0];
					}
					if($tardy_date_first){
						$e_month_year = explode('-', $tardy_date_first->date_of_tardy);
						$tardy_date = $e_month_year[1].' '.$e_month_year[0];
					}

					if($absent_date && $tardy_date){
						if($absent_date <= $tardy_date)
						{
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					} else {
						if($absent_date) {
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					}
        //end effectivity dates
        //compute current absences
					if($absences) {
						$sum_absences = 0;
						foreach ($absences as $absence) {
							if($absence->date_of_absent) {
								$start = Carbon::parse($absence->date_of_absent)->startOfMonth();
								$end = Carbon::parse($absence->date_of_absent)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $absence->salary + $absence->pera;

								$absences_deduction[] = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$total = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$sum_absences += $total;
							}
						}
					}
					if($tardiness) {
						$sum_tardiness = 0;
						foreach ($tardiness as $tardy) {
							if($tardy->date_of_tardy) {
								$start = Carbon::parse($tardy->date_of_tardy)->startOfMonth();
								$end = Carbon::parse($tardy->date_of_tardy)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $tardy->salary + $tardy->pera;

								$current_tardiness[] = ($gross_pay/$weekDays/8/60) * ($tardy->minutes);
								$total = ($gross_pay/$weekDays/8/60) * ($tardy->minutes * 1);
								$sum_tardiness += $total;
							}
						}
					}
        // return ['total'=>$total,'weekDays'=>$weekDays,'from'=>$from];
					$description = 'CURRENT ABSENCES';
					$code = '0068';
					$deduction_amount = (isset($sum_absences)?$sum_absences:0) + (isset($sum_tardiness)?$sum_tardiness:0);
        // return $deduction_amount;
        // $update_ca = Deduction::where('user_id',$user_id)->where('code','=','0068')->first();
        // if($update_ca)
        // {
        //     PayrollDeduction::where(
        //         'deduction_id',$update_ca->id)->update([
        //         'deduction_amount' => isset($deduction_amount) ? round($deduction_amount,2) : '0.00',
        //     ]);

        // }

        // $update_ca->id = $deduction_amount;
					$current_absences = [
						'description'=>$description,
						'code'=>$code,
						'effectivity_date'=>$effectivity_date,
						'termination_date'=>$termination_date,
						'deduction_amount'=> round($deduction_amount,2)
					];

					$item->deductions = $payroll_deduction;
					$item->termination = $payroll_deduction_with_null_termination;
					$item->deductwithnull = $payroll_deduction_with_null;
					$item->undeducted = $payroll_deduction_undeducted;
					$item->undeducted_null_termination = $undeducted_with_null_termination;
					$item->current_absences = $current_absences;
					$item->charts = $image_path;

					array_push($retval, $item);
				}
				// return $retval;
				$pdf = PDF::loadView('pdf.payroll_slip_byschool',compact('retval','month','year'))
				->setPaper('letter')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('Payroll Slip by School.pdf');
			}

			if($type == 'without_signature' && $keyword == 'word-excel')
			{
				$dateMonthYear = explode('-', $date);
				$year = $dateMonthYear[0];
				$month = $dateMonthYear[1];

				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';

				$payroll = DB::table("form7s as form7")
				->leftjoin('payroll as payroll','payroll.form7_id','=','form7.id')
				->leftjoin('user_personal_infomations as personal','personal.user_id','=','payroll.user_id')
				->leftjoin('schools as school','school.id','=','payroll.school_id')
				->leftjoin('users as user','user.id','=','payroll.user_id')
				->select([
					'payroll.user_id',
					'payroll.form7_id',
					'payroll.id',
					'payroll.net_pay',
					'payroll.tranche_id',
					'payroll.gross_pay',
					'payroll.salary',
					'payroll.step',
					'payroll.salary_grade',
					'payroll.pera',
					'payroll.position',
					'payroll.position_code',
					'payroll.net_pay',
					'payroll.total_deductions',
					'personal.employee_no',
					'user.account_number',
					DB::raw("CONCAT(user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',user.last_name,' ',IFNULL(user.extension_name, '')) as name"),
					'user.hiring_date',
					'user.retirement_date',
					'school.district', 
					'school.school_name', 
					'school.school_type',
				])
				->where('form7.form_id', $form_id)
				->where('payroll.school_id', $school_id)->orderBy('personal.employee_no','ASC')
				->get();

				$retval = [];
				foreach ($payroll as $item) {
					$user_id = $item->user_id;
					$form7_id = $item->form7_id;
					$payroll_id = $item->id;

					$payroll_deduction = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

						$query->where('user_id','=',$user_id)
						->where('status','=','Active')
						->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('form_id',$form_id)->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_with_null_termination = PayrollDeduction::whereHas('deduction',function($query) use($user_id,$date){ 

						$query->where('user_id','=',$user_id)
						->where('status','=','Active')
						->whereNotNull('effectivity_date')
						->whereNull('termination_date')
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('form_id',$form_id)->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_with_null = PayrollDeduction::whereHas('deduction', function($query) use($user_id){ 

						$query->where('user_id', '=',$user_id)
						->where('status', '=', "Active")
						->whereNull('effectivity_date')
						->whereNull('termination_date')
						->where('code','!=','0068');

					})->with('deduction')->where('form_id',$form_id)->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$payroll_deduction_undeducted = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

						$query->where('user_id',$user_id)
						->where('status', '=', "InActive")
						->whereDate('termination_date','>=',Carbon::parse($date)->startOfMonth()->toDateString())
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('form_id',$form_id)->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$undeducted_with_null_termination = PayrollDeduction::whereHas('deduction', function($query) use($user_id,$date){ 

						$query->where('user_id',$user_id)
						->where('status', '=', "InActive")
						->whereNotNull('effectivity_date')
						->whereNull('termination_date')
						->whereDate('effectivity_date','<=',Carbon::parse($date)->endOfMonth()->toDateString());

					})->with('deduction')->where('form_id',$form_id)->where('user_id',$user_id)->where('form7_id',$form7_id)->where('payroll_id',$payroll_id)->where('school_id',$school_id)->get();

					$absences = CurrentAbsences::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_absent')
					->get(['form_id','user_id','date_of_absent','salary','pera']);

					$tardiness = CurrentTardiness::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_tardy')
					->get(['form_id','user_id','date_of_tardy','salary','minutes','pera']);

				//get effectivity dates 
					$t_date = Form7Dates::where('id',$form_id)->first();
					if($t_date) {
						$t_month_year = explode('-', $t_date->form7_date);
						$termination_date = $t_month_year[1].' '.$t_month_year[0];
					}
					$absent_date_first = $absences->first();
					$tardy_date_first = $tardiness->first();
					$absent_date = '';
					$tardy_date = '';
					if($absent_date_first){
						$e_month_year = explode('-', $absent_date_first->date_of_absent);
						$absent_date = $e_month_year[1].' '.$e_month_year[0];
					}
					if($tardy_date_first){
						$e_month_year = explode('-', $tardy_date_first->date_of_tardy);
						$tardy_date = $e_month_year[1].' '.$e_month_year[0];
					}

					if($absent_date && $tardy_date){
						if($absent_date <= $tardy_date)
						{
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					} else {
						if($absent_date) {
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					}
				//end effectivity dates
				//compute current absences
					if($absences) {
						$sum_absences = 0;
						foreach ($absences as $absence) {
							if($absence->date_of_absent) {
								$start = Carbon::parse($absence->date_of_absent)->startOfMonth();
								$end = Carbon::parse($absence->date_of_absent)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $absence->salary + $absence->pera;

								$absences_deduction[] = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$total = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$sum_absences += $total;
							}
						}
					}
					if($tardiness) {
						$sum_tardiness = 0;
						foreach ($tardiness as $tardy) {
							if($tardy->date_of_tardy) {
								$start = Carbon::parse($tardy->date_of_tardy)->startOfMonth();
								$end = Carbon::parse($tardy->date_of_tardy)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $tardy->salary + $tardy->pera;

								$current_tardiness[] = ($gross_pay/$weekDays/8/60) * ($tardy->minutes);
								$total = ($gross_pay/$weekDays/8/60) * ($tardy->minutes * 1);
								$sum_tardiness += $total;
							}
						}
					}
				// return ['total'=>$total,'weekDays'=>$weekDays,'from'=>$from];
					$description = 'CURRENT ABSENCES';
					$code = '0068';
					$deduction_amount = (isset($sum_absences)?$sum_absences:0) + (isset($sum_tardiness)?$sum_tardiness:0);
				// return $deduction_amount;
				// $update_ca = Deduction::where('user_id',$user_id)->where('code','=','0068')->first();
				// if($update_ca)
				// {
				// 	PayrollDeduction::where(
				// 		'deduction_id',$update_ca->id)->update([
				// 		'deduction_amount' => isset($deduction_amount) ? round($deduction_amount,2) : '0.00',
				// 	]);

				// }

				// $update_ca->id = $deduction_amount;
					$current_absences = [
						'description'=>$description,
						'code'=>$code,
						'effectivity_date'=>$effectivity_date,
						'termination_date'=>$termination_date,
						'deduction_amount'=> round($deduction_amount,2)
					];

					$item->deductions = $payroll_deduction;
					$item->termination = $payroll_deduction_with_null_termination;
					$item->deductwithnull = $payroll_deduction_with_null;
					$item->undeducted = $payroll_deduction_undeducted;
					$item->undeducted_null_termination = $undeducted_with_null_termination;
					$item->current_absences = $current_absences;

					array_push($retval, $item);
				}

				return $retval;
			}
			if($type == "by_personnel" && $keyword == 'pdf')
			{
				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';  

				$data = DB::table("form7s as form7")
				->join('payroll as payroll','payroll.form7_id','=','form7.id')
				->join('users as user','user.id','=','payroll.user_id')
				->select([
					'user.first_name',
					'user.middle_name',
					'user.last_name',
					'user.extension_name',
					'payroll.net_pay as net_pay',
					'user.account_number as account_number',
				])
				->where('form7.form_id', $form_id)
				->orderBy('user.last_name','ASC')
				->get();


				$pdf = PDF::loadView('pdf.salary_payroll',compact('data'))->setPaper('letter')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('Payroll Register Personnel.pdf');
			}
			if($type == "by_personnel" && $keyword == 'word-excel')
			{
				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';  

				$data = DB::table("form7s as form7")
				->join('payroll as payroll','payroll.form7_id','=','form7.id')
				->join('users as user','user.id','=','payroll.user_id')
				->select([
					DB::raw("CONCAT(user.last_name,', ',user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
					'payroll.net_pay as net_pay',
					'user.account_number as account_number',
				])
				->where('form7.form_id', $form_id)
				->orderBy('user.last_name','ASC')
				->get();

				return $data;
			}

			if($type == "with_signature" && $keyword == 'pdf')
			{
				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';  
				$date = isset($form7_dates) ? $form7_dates->form7_date : '';

				$dateMonthYear = explode('-', $date);
				$year = $dateMonthYear[0];
				$month = $dateMonthYear[1];

				$school = School::where('id',$school_id)->select(['district', 'congressional_district','region',
					'school_name', 'school_type','school_code'])->first();

				$payroll = DB::table("form7s as form7")
				->leftjoin('payroll as payroll','payroll.form7_id','=','form7.id')
				->leftjoin('user_personal_infomations as personal','personal.user_id','=','payroll.user_id')
				->leftjoin('schools as school','school.id','=','payroll.school_id')
				->leftjoin('users as user','user.id','=','payroll.user_id')
				->select([
					'payroll.user_id',
					'payroll.form7_id',
					'payroll.id',
					'payroll.net_pay',
					'payroll.tranche_id',
					'payroll.gross_pay',
					'payroll.salary',
					'payroll.step',
					'payroll.salary_grade',
					'payroll.pera',
					'payroll.position',
					'payroll.position_code',
					'payroll.net_pay',
					'payroll.total_deductions',
					'personal.employee_no',
					'user.account_number',
					'user.first_name',
					'user.middle_name',
					'user.last_name',
					'user.extension_name',
					'user.hiring_date',
					'user.retirement_date',
				])
				->where('form7.form_id', $form_id)
				->where('payroll.school_id', $school_id)->orderBy('personal.employee_no','ASC')
				->get();

				$retval = [];
				foreach ($payroll as $item) {
					$user_id = $item->user_id;
					$form7_id = $item->form7_id;
					$payroll_id = $item->id;						

					$payroll_deduction = PayrollDeduction::whereHas('deduction',function($query) use($user_id){ 
						$query->where('user_id','=',$user_id)->where('status', '=', 'Active');

					})->with('deduction')
					->where('user_id',$user_id)
					->where('form_id',$form_id)
					->where('form7_id',$form7_id)
					->where('payroll_id',$payroll_id)
					->where('school_id',$school_id)
					->get();

					$item->deductions = $payroll_deduction;		
					array_push($retval, $item);
				}	
				$sum_deduction = 0;
				$sum_pera = 0;
				$sum_netpay = 0;
				$sum_salary = 0;
				$sum_compe = 0;
				$sum_pagibig = 0;
				$sum_gsis = 0;
				$sum_medicare = 0;
				$sum_ec = 0;
				foreach ($payroll as $total) {
					foreach($total->deductions as $ded)
					{
						if($ded->deduction['code'] == "0222")
						{
							$sum_pagibig += round($ded->deduction_amount,2);
						}

						if($ded->deduction['code'] == "0003")
						{
							$sum_gsis += round($ded->gs,2);
							$sum_ec += round($ded->ec,2);
						}

						if($ded->deduction['code'] == "0111")
						{
							$sum_medicare += round($ded->deduction_amount,2);
						}						
					}
					$sum_deduction += round($total->total_deductions,2);
					$sum_pera += round($total->pera,2);
					$sum_salary += round($total->salary,2);
					$sum_netpay += round($total->net_pay,2);
					$sum_compe = round($sum_salary,2) + round($sum_pera,2);
				}				
				$total_deduction = $sum_deduction;
				$total_pera = $sum_pera;
				$total_salary = $sum_salary;
				$total_netpay = $sum_netpay;
				$total_compe = $sum_compe;
				$total_gsis = $sum_gsis;
				$total_pagibig = $sum_pagibig;
				$total_medicare = $sum_medicare;
				$total_ec = $sum_ec;

				$deductions = PayrollDeduction::whereHas('deduction',function($query) use($date){ 
					$query->where('status', '=', 'Active');

				})->with('deduction')->where('school_id',$school_id)->get()->groupBy(function($item) {
					return $item->deduction->code." ".$item->deduction->description;
				});

				foreach ($deductions as $key) {
					$total = 0;
					
					foreach ($key as $item) {
						$total += round($item->deduction_amount,2);
						$code = $item->deduction->code;
						$description = $item->deduction->description;
					}
					$key[] = ['total_deduction' => $total,'code' => $code,'description' => $description];
				}	

			//return response()->json(compact('payroll','school','month','year','total_deduction','total_pera','total_salary','total_netpay','total_compe'));	
				$pdf = PDF::loadView('pdf.payroll_slip_byschool_signature_page1',compact('payroll','date','deductions','school','month','year','total_deduction','total_pera',
					'total_salary','total_netpay','total_compe','total_gsis','total_pagibig','total_medicare','total_ec'))->setPaper('letter','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('Payroll Register School Signature.pdf');
			}

			if($type == "with_signature" && $keyword == 'word-excel')
			{
				$form7_dates = Form7Dates::where('form7_date',$date)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';
				$date = isset($form7_dates) ? $form7_dates->form7_date : '';   

				$dateMonthYear = explode('-', $date);
				$year = $dateMonthYear[0];
				$month = $dateMonthYear[1];

				$school = School::where('id',$school_id)->select(['district', 'congressional_district','region',
					'school_name', 'school_type','school_code'])->first();

				$payroll = DB::table("form7s as form7")
				->leftjoin('payroll as payroll','payroll.form7_id','=','form7.id')
				->leftjoin('user_personal_infomations as personal','personal.user_id','=','payroll.user_id')
				->leftjoin('schools as school','school.id','=','payroll.school_id')
				->leftjoin('users as user','user.id','=','payroll.user_id')
				->select([
					'payroll.user_id',
					'payroll.form7_id',
					'payroll.id',
					'payroll.net_pay',
					'payroll.tranche_id',
					'payroll.gross_pay',
					'payroll.salary',
					'payroll.step',
					'payroll.salary_grade',
					'payroll.pera',
					'payroll.position',
					'payroll.position_code',
					'payroll.net_pay',
					'payroll.total_deductions',
					'personal.employee_no',
					'user.account_number',
					DB::raw("CONCAT(user.first_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',user.last_name,' ',IFNULL(user.extension_name, '')) as name"),
					'user.hiring_date',
					'user.retirement_date',
				])
				->where('form7.form_id', $form_id)
				->where('payroll.school_id', $school_id)->orderBy('personal.employee_no','ASC')
				->get();

				$retval = [];
				foreach ($payroll as $item) {
					$user_id = $item->user_id;
					$form7_id = $item->form7_id;
					$payroll_id = $item->id;					

					$payroll_deduction = PayrollDeduction::whereHas('deduction',function($query) use($user_id){ 
						$query->where('user_id','=',$user_id)->where('status', '=', 'Active');

					})->with('deduction')->where('user_id',$user_id)
					->where('form7_id',$form7_id)
					->where('form_id',$form_id)
					->where('payroll_id',$payroll_id)
					->where('school_id',$school_id)
					->get();

					$item->deductions = $payroll_deduction;

					array_push($retval, $item);
				}	
				$sum_deduction = 0;
				$sum_pera = 0;
				$sum_netpay = 0;
				$sum_salary = 0;
				$sum_compe = 0;
				$sum_pagibig = 0;
				$sum_gsis = 0;
				$sum_ec = 0;
				$sum_medicare = 0;
				foreach ($payroll as $total) {					
					foreach($total->deductions as $ded)
					{
						if($ded->deduction['code'] == "0222")
						{
							$sum_pagibig += round($ded->deduction_amount,2);
						}

						if($ded->deduction['code'] == "0003")
						{
							$sum_gsis += round($ded->gs,2);
							$sum_ec += round($ded->ec,2);
						}

						if($ded->deduction['code'] == "0111")
						{
							$sum_medicare += round($ded->deduction_amount,2);
						}			
					}				
					$sum_deduction += round($total->total_deductions,2);
					$sum_pera += round($total->pera,2);
					$sum_salary += round($total->salary,2);
					$sum_netpay += round($total->net_pay,2);
					$sum_compe = round($sum_salary,2) + round($sum_pera,2);
				}			
				$total_deduction = $sum_deduction;
				$total_pera = $sum_pera;
				$total_salary = $sum_salary;
				$total_netpay = $sum_netpay;
				$total_compe = $sum_compe;
				$total_gsis = $sum_gsis;
				$total_pagibig = $sum_pagibig;
				$total_medicare = $sum_medicare;
				$total_ec = $sum_ec;

				$deductions = PayrollDeduction::whereHas('deduction',function($query){ 
					$query->where('status', '=', 'Active');

				})->with('deduction')->where('school_id',$school_id)->get()->groupBy(function($item) {
					return $item->deduction->code." ".$item->deduction->description;
				});

				foreach ($deductions as $key) {
					$total = 0;
					foreach ($key as $item) {
						$total += round($item->deduction_amount,2);
					}
					$key[] = ['total_deduction' => $total];
				}

				return response()->json(compact('payroll','deductions','date','school','month','year','total_deduction',
					'total_pera','total_salary','total_netpay','total_compe','total_gsis','total_pagibig','total_medicare','total_ec'));	
			}
		}

		public function entry_appointment($date_from,$date_to,$keyword)
		{
			if($keyword == 'pdf')
			{
				$dateNow = Carbon::now();
				$dateNow->toDateTimeString();
				$female = 'Mrs/Ms';
				$male = 'Mr';

				$data = DB::table("users as user")
				->leftJoin('user_applicant_options as employee','employee.user_id','=','user.id')
				->leftJoin('schools as school','school.id','=','employee.school_id')
				->leftJoin('school_vacants as vacants','vacants.school_id','=','school.id')
				->select([
					DB::raw("CONCAT(user.first_name,',',' ',user.last_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
					'employee.non_teaching_category as non_teaching_category',
					'employee.teaching_position as teaching_position',
					'vacants.salary_grade as salary_grade',
					'user.appointment as appointment',
					'vacants.starting_salary as starting_salary',
					'vacants.plantilla_item_no as plantilla_item_no',
					'vacants.effectivity_date as effectivity_date',
					'school.school_name as school_name',
					'school.cluster as cluster',
					'user.gender as gender',
				])->where('user.position', 'Super Admin')->get();


				foreach ($data as $salary_data) {

					$contains_dot = Str::contains($salary_data->starting_salary, '.');
					if($contains_dot) {
						$numberToWords = new NumberToWords();
						$numberTransformer = $numberToWords->getCurrencyTransformer('en');

						$cast_number = str_replace(',', '', $salary_data->starting_salary);
						$cast_number2 = str_replace('.', '', $cast_number);
						$product = (float)$cast_number * 100;

						$salary_data->salary_words = $numberTransformer->toWords($product, 'Php');
					} 
					else {
						$numberToWords = new NumberToWords();
						$numberTransformer = $numberToWords->getNumberTransformer('en');

						$cast_number = str_replace(',', '', $salary_data->starting_salary);
						$salary_data->salary_words = $numberTransformer->toWords((int)$cast_number);
					}
				}

				$pdf = PDF::loadView('pdf.entry_appointment_letter',compact('data','female','male'))->setPaper('folio','landscape')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('Entry Appointment Letter.pdf');
			}

			if($keyword == 'word-excel')
			{


				$dateNow = Carbon::now();
				$dateNow->toDateTimeString();
				$female = 'Mrs/Ms';
				$male = 'Mr';

				$data = DB::table("users as user")
				->leftJoin('user_applicant_options as employee','employee.user_id','=','user.id')
				->leftJoin('schools as school','school.id','=','employee.school_id')
				->leftJoin('school_vacants as vacants','vacants.school_id','=','school.id')
				->select([
					DB::raw("CONCAT(user.first_name,',',' ',user.last_name,' ',SUBSTRING(user.middle_name,1,1),'.',' ',IFNULL(user.extension_name, '')) as name"),
					'employee.non_teaching_category as non_teaching_category',
					'employee.teaching_position as teaching_position',
					'vacants.salary_grade as salary_grade',
					'user.appointment as appointment',
					'vacants.starting_salary as starting_salary',
					'vacants.plantilla_item_no as plantilla_item_no',
					'vacants.effectivity_date as effectivity_date',
					'school.school_name as school_name',
					'school.cluster as cluster',
					'user.gender as gender',
				])->where('user.position', 'Super Admin')->get();


				foreach ($data as $salary_data) {

					$contains_dot = Str::contains($salary_data->starting_salary, '.');
					if($contains_dot) {
						$numberToWords = new NumberToWords();
						$numberTransformer = $numberToWords->getCurrencyTransformer('en');

						$cast_number = str_replace(',', '', $salary_data->starting_salary);
						$cast_number2 = str_replace('.', '', $cast_number);
						$product = (float)$cast_number * 100;

						$salary_data->salary_words = $numberTransformer->toWords($product, 'Php');
					} 
					else {
						$numberToWords = new NumberToWords();
						$numberTransformer = $numberToWords->getNumberTransformer('en');

						$cast_number = str_replace(',', '', $salary_data->starting_salary);
						$salary_data->salary_words = $numberTransformer->toWords((int)$cast_number);
					}
				}
				return $data;
			}
		}

		public function lis_of_remitance($code, $month, $keyword)
		{	
			if($code == '0003' && $keyword == 'pdf')
			{
			// GSIS
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));

				$data = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0003')
					->where('status', '=', 'Active');
				})
				->with('payroll')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$sum_ps = 0;
				$sum_gs = 0;
				$sum_ec = 0;
				$sum_ehp = 0;
				foreach ($data as $total) {
					$sum_ps += $total->deduction_amount;
					$sum_ehp += $total->ehp;
					$sum_gs += $total->gs;
					$sum_ec += $total->ec;
				}

				$total_ps = number_format($sum_ps,2);
				$total_gs = number_format($sum_gs,2);
				$total_ec = number_format($sum_ec,2);
				$total_ehp = number_format($sum_ehp,2);

				$pdf = PDF::loadView('pdf.gsis',compact('data','date', 'total_ps','total_gs','total_ec','total_ehp'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('List of Remitance.pdf');
			}

			if($code == '0003' && $keyword == 'word-excel')
			{
			// GSIS
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));

				$gsis = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0003')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$sum_ps = 0;
				$sum_gs = 0;
				$sum_ec = 0;
				$sum_ehp = 0;
				foreach ($gsis as $total) {
					$sum_ps += $total->deduction_amount;
					$sum_ehp += $total->ehp;
					$sum_gs += $total->gs;
					$sum_ec += $total->ec;
				}

				$total_ps = number_format($sum_ps,2);
				$total_gs = number_format($sum_gs,2);
				$total_ec = number_format($sum_ec,2);
				$total_ehp = number_format($sum_ehp,2);

				return response()->json(compact('gsis', 'date', 'total_ps','total_gs','total_ec','total_ehp'));
			}

			if($code == '0111' && $keyword == 'pdf')
			{
			// MEDICARE
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));
				$monthyear = Carbon::parse($month)->format("m/Y");

				$data = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0111')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();


				$sum = 0;
				foreach ($data as $total) {
					$sum += $total->deduction_amount;
				}

				$total_deduction = number_format($sum,2);

				$pdf = PDF::loadView('pdf.medicare',compact('data','date','total_deduction','monthyear'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('List of Remitance.pdf');
			}
			if($code == '0111' && $keyword == 'word-excel')
			{
			// MEDICARE
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));
				$monthyear = Carbon::parse($month)->format("m/Y");

				$medicare = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0111')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();


				$sum = 0;
				foreach ($medicare as $total) {
					$sum += $total->deduction_amount;
				}

				$total_deduction = number_format($sum,2);
				return response()->json(compact('medicare', 'date', 'total_deduction','monthyear'));
			}
			if($code == '0222' && $keyword == 'pdf')
			{
			// PAG-IBIG PREMIUM
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));
				$monthyear = Carbon::parse($month)->format("m/Y");

				$data = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0222')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$sum = 0;
				foreach ($data as $total) {
					$sum += $total->deduction_amount;
				}
				$data->total_deduction = number_format($sum,2);
				$pdf = PDF::loadView('pdf.pagibig',compact('data','date','monthyear'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('List of Remittance.pdf');
			}

			if($code == '0222' && $keyword == 'word-excel')
			{
			// PAG-IBIG PREMIUM
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));
				$monthyear = Carbon::parse($month)->format("m/Y");

				$pagibig = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0222')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$sum = 0;
				foreach ($pagibig as $total) {
					$sum += $total->deduction_amount;
				}

				$total_deduction = number_format($sum,2);
				return response()->json(compact('pagibig', 'date', 'total_deduction','monthyear'));
			}
			if($code == '0068' && $keyword == 'pdf')
			{
			// Current Absences
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));

				$form7_dates = Form7Dates::where('form7_date',$month)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';  

				$data = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0068')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$sum = 0;
				$retval = [];
				foreach ($data as $item) {
					$sum += $item->deduction_amount;
					$user_id = $item->user_id;

					$absences = CurrentAbsences::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_absent')
					->get(['form_id','user_id','date_of_absent','salary','pera']);

					$tardiness = CurrentTardiness::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_tardy')
					->get(['form_id','user_id','date_of_tardy','salary','minutes','pera']);

				//get effectivity dates 
					$t_date = Form7Dates::where('id',$form_id)->first();
					if($t_date) {
						$t_month_year = explode('-', $t_date->form7_date);
						$termination_date = $t_month_year[1].' '.$t_month_year[0];
					}
					$absent_date_first = $absences->first();
					$tardy_date_first = $tardiness->first();
					$absent_date = '';
					$tardy_date = '';
					if($absent_date_first){
						$e_month_year = explode('-', $absent_date_first->date_of_absent);
						$absent_date = $e_month_year[1].' '.$e_month_year[0];
					}
					if($tardy_date_first){
						$e_month_year = explode('-', $tardy_date_first->date_of_tardy);
						$tardy_date = $e_month_year[1].' '.$e_month_year[0];
					}

					if($absent_date && $tardy_date){
						if($absent_date <= $tardy_date)
						{
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					} else {
						if($absent_date) {
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					}
				//end effectivity dates
				//compute current absences
					if($absences) {
						$sum_absences = 0;
						foreach ($absences as $absence) {
							if($absence->date_of_absent) {
								$start = Carbon::parse($absence->date_of_absent)->startOfMonth();
								$end = Carbon::parse($absence->date_of_absent)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $absence->salary + $absence->pera;

								$absences_deduction[] = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$total = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$sum_absences += $total;
							}
						}
					}
					if($tardiness) {
						$sum_tardiness = 0;
						foreach ($tardiness as $tardy) {
							if($tardy->date_of_tardy) {
								$start = Carbon::parse($tardy->date_of_tardy)->startOfMonth();
								$end = Carbon::parse($tardy->date_of_tardy)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $tardy->salary + $tardy->pera;

								$current_tardiness[] = ($gross_pay/$weekDays/8/60) * ($tardy->minutes);
								$total = ($gross_pay/$weekDays/8/60) * ($tardy->minutes * 1);
								$sum_tardiness += $total;
							}
						}
					}
				// return ['total'=>$total,'weekDays'=>$weekDays,'from'=>$from];
					$description = 'CURRENT ABSENCES';
					$code = '0068';
					$deduction_amount = (isset($sum_absences)?$sum_absences:0) + (isset($sum_tardiness)?$sum_tardiness:0);
				// return $deduction_amount;
				// $update_ca = Deduction::where('user_id',$user_id)->where('code','=','0068')->first();
				// if($update_ca)
				// {
				//     PayrollDeduction::where(
				//         'deduction_id',$update_ca->id)->update([
				//         'deduction_amount' => isset($deduction_amount) ? round($deduction_amount,2) : '0.00',
				//     ]);

				// }

				// $update_ca->id = $deduction_amount;
					$current_absences_ret = [
						'description'=>$description,
						'code'=>$code,
						'effectivity_date'=>$effectivity_date,
						'termination_date'=>$termination_date,
						'deduction_amount'=> round($deduction_amount,2)
					];	

					$item->current_absences_ret = $current_absences_ret;
					array_push($retval,$item);
				} 

				$total_deduction = number_format($sum);
			//return response()->json(compact('retval','date','total_deduction'));

				$pdf = PDF::loadView('pdf.current_absences',compact('data','date','total_deduction'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('List of Remitance.pdf');
			}

			if($code == '0068' && $keyword == 'word-excel')
			{
			// Current Absences
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/01');
				$date = date("F Y", strtotime($month_word));

				$form7_dates = Form7Dates::where('form7_date',$month)->first();
				$form_id = isset($form7_dates) ? $form7_dates->id : '';

				$current_absences = PayrollDeduction::whereHas('form', function ($query) use($month_only){
					return $query->where('form7_date', 'LIKE', '%'.$month_only.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query->where('code', '=', '0068')
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')->get();

				$retval = [];
				$sum = 0;
				foreach ($current_absences as $item) {
					$sum += $item->deduction_amount;
					$user_id = $item->user_id;

					$absences = CurrentAbsences::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_absent')
					->get(['form_id','user_id','date_of_absent','salary','pera']);

					$tardiness = CurrentTardiness::where('form_id',$form_id)->where('user_id',$user_id)->orderBy('date_of_tardy')
					->get(['form_id','user_id','date_of_tardy','salary','minutes','pera']);

				//get effectivity dates 
					$t_date = Form7Dates::where('id',$form_id)->first();
					if($t_date) {
						$t_month_year = explode('-', $t_date->form7_date);
						$termination_date = $t_month_year[1].' '.$t_month_year[0];
					}
					$absent_date_first = $absences->first();
					$tardy_date_first = $tardiness->first();
					$absent_date = '';
					$tardy_date = '';
					if($absent_date_first){
						$e_month_year = explode('-', $absent_date_first->date_of_absent);
						$absent_date = $e_month_year[1].' '.$e_month_year[0];
					}
					if($tardy_date_first){
						$e_month_year = explode('-', $tardy_date_first->date_of_tardy);
						$tardy_date = $e_month_year[1].' '.$e_month_year[0];
					}

					if($absent_date && $tardy_date){
						if($absent_date <= $tardy_date)
						{
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					} else {
						if($absent_date) {
							$effectivity_date = $absent_date;
						} else {
							$effectivity_date = $tardy_date;
						}
					}
				//end effectivity dates
				//compute current absences
					if($absences) {
						$sum_absences = 0;
						foreach ($absences as $absence) {
							if($absence->date_of_absent) {
								$start = Carbon::parse($absence->date_of_absent)->startOfMonth();
								$end = Carbon::parse($absence->date_of_absent)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $absence->salary + $absence->pera;

								$absences_deduction[] = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$total = ($gross_pay/$weekDays/8/60) * (480 * 1);
								$sum_absences += $total;
							}
						}
					}
					if($tardiness) {
						$sum_tardiness = 0;
						foreach ($tardiness as $tardy) {
							if($tardy->date_of_tardy) {
								$start = Carbon::parse($tardy->date_of_tardy)->startOfMonth();
								$end = Carbon::parse($tardy->date_of_tardy)->endOfMonth();

								$from = Carbon::parse($start);
								$to = Carbon::parse($end);
								$weekDays = $from->diffInWeekdays($to);
								$gross_pay = $tardy->salary + $tardy->pera;

								$current_tardiness[] = ($gross_pay/$weekDays/8/60) * ($tardy->minutes);
								$total = ($gross_pay/$weekDays/8/60) * ($tardy->minutes * 1);
								$sum_tardiness += $total;
							}
						}
					}
				// return ['total'=>$total,'weekDays'=>$weekDays,'from'=>$from];
					$description = 'CURRENT ABSENCES';
					$code = '0068';
					$deduction_amount = (isset($sum_absences)?$sum_absences:0) + (isset($sum_tardiness)?$sum_tardiness:0);
				// return $deduction_amount;
				// $update_ca = Deduction::where('user_id',$user_id)->where('code','=','0068')->first();
				// if($update_ca)
				// {
				//     PayrollDeduction::where(
				//         'deduction_id',$update_ca->id)->update([
				//         'deduction_amount' => isset($deduction_amount) ? round($deduction_amount,2) : '0.00',
				//     ]);

				// }

				// $update_ca->id = $deduction_amount;
					$current_absences_ret = [
						'description'=>$description,
						'code'=>$code,
						'effectivity_date'=>$effectivity_date,
						'termination_date'=>$termination_date,
						'deduction_amount'=> round($deduction_amount,2)
					];	

					$item->current_absences_ret = $current_absences_ret;
					array_push($retval,$item);
				}

				$total_deduction = number_format($sum);
				return response()->json(compact('current_absences','date','total_deduction'));
			}

			if($code != '0222' && $code != '0111' && $code != '0003' && $keyword == 'pdf')
			{
			// other deductions
				$month_formdate = str_replace('-', '-', $month);
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/28');
				$date = date("F Y", strtotime($month_word));
			//sayang kaya comment alngh aha
			// $data = DB::table("payroll_deduction as pd")
			// 		->leftJoin('deductions as d','d.id','=','pd.deduction_id')
			// 		->leftJoin('form7_dates as fd','fd.id','=','pd.form_id')
			// 		->leftJoin('users as u','u.id','=','pd.user_id')
			// 		->leftJoin('user_personal_infomations as upi','upi.id','=','pd.user_id')
			// 		->where('fd.form7_date', 'LIKE', '%'.$month_formdate.'%')
			// 		->whereNotIn('d.code', ['0068', '0111','0222', '0003'])
			// 		->where('d.termination_date','>=', $month_only)
			// 		->orWhere('d.termination_date','=', null)
			// 		->where('d.status', '=', 'Active')
			// 	    ->select(['upi.employee_no','d.description',
			// 	    	DB::raw("CONCAT(u.last_name,',',' ',u.first_name,' ',
			// 	    		SUBSTRING(u.middle_name,1,1),'.',' ',IFNULL(u.extension_name, '')) as name"),
			// 			'd.policy_number','d.effectivity_date','d.termination_date','pd.deduction_amount'
			// 	    	])
			// 		->get()
			// 		->groupBy(function($item) {
			// 			return $item->description;
			// 		});

			// 	foreach ($data as $key) {
			// 		$total = 0;
			// 		foreach ($key as $item) {
			// 			$total += $item->deduction_amount;
			// 		}
			// 		$key[] = ['total_deduction' => $total];
			// 	}
				$data = PayrollDeduction::whereHas('form', function ($query) use($month_formdate){
					return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query
					->whereNotIn('code', ['0111','0222', '0003'])
					->where('termination_date','>=', $month_only)
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')
				->get()->groupBy(function($item) {
					return $item->deduction->description;
				});

				foreach ($data as $key) {
					$total = 0;
					foreach ($key as $item) {
						$total += $item->deduction_amount;
					}
					$key[] = ['total_deduction' => number_format($total,2)];
				}

				$pdf = PDF::loadView('pdf.other_deductions',compact('data','date'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
				return $pdf->stream('List of Remitance.pdf');

			}

			if($code != '0222' && $code != '0111' && $code != '0003' && $keyword == 'word-excel')
			{
			// other deductions
				$month_formdate = str_replace('-', '-', $month);
				$month_only = str_replace('-', '-', $month);
				$month_word = str_replace('-', '/', $month.'/28');
				$date = date("F Y", strtotime($month_word));

				$other_deduction = PayrollDeduction::whereHas('form', function ($query) use($month_formdate){
					return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
				})
				->whereHas('deduction', function ($query) use($month_only){
					return $query
					->whereNotIn('code', ['0111','0222', '0003'])
					->where('termination_date','>=', $month_only)
					->where('status', '=', 'Active');
				})
				->with('deduction:id,description,policy_number,effectivity_date,termination_date')
				->with('payroll:id,salary')
				->with('employee_number:user_id,employee_no')
				->with('employee_id:id,first_name,last_name,middle_name')
				->get()->groupBy(function($item) {
					return $item->deduction->description;
				});

				foreach ($other_deduction as $key) {
					$total = 0;
					foreach ($key as $item) {
						$total += $item->deduction_amount;
					}
					$key[] = ['total_deduction' => number_format($total,2)];
				}
				return response()->json(compact('other_deduction', 'date'));

			}

		}
		public function summary_of_remittance($month, $keyword)
		{

			$month_formdate = str_replace('-', '-', $month);
			$month_only = str_replace('-', '-', $month);
			$month_word = str_replace('-', '/', $month.'/28');
			$date = date("F Y", strtotime($month_word));

			$summary = PayrollDeduction::
			whereHas('form', function ($query) use($month_formdate){
				return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
			})
			->whereHas('deduction', function ($query) use($month_only){
				return $query
				->where('status', '=', 'Active');
			})
			->with('deduction:id,description,policy_number,effectivity_date,termination_date,deduction_amount,code')
			->with('payroll:id,salary,net_pay,pera')
			->with('employee_number:user_id,employee_no')
			->with('employee_id:id,first_name,last_name,middle_name')
			->get(); 

			$payee = Form7::
			whereHas('form', function ($query) use($month_formdate){
				return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
			})
			->with('payroll:form7_id,salary,net_pay,pera')
			->get(['id','name','user_id']);

			$deduction_summary = PayrollDeduction::
			whereHas('form', function ($query) use($month_formdate){
				return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
			})
			->whereHas('deduction', function ($query) use($month_only){
				return $query
				->where('termination_date','>=', $month_only)
				->Orwhere('termination_date', '=', null)
				->whereNotIn('code',['0111','0222','0003'])
				->where('status', '=', 'Active');
			})
			->with('deduction:id,description,deduction_amount,code')
			->get(['deduction_id','deduction_amount']); 

			$sum_salary = 0;
			$sum_net_pay = 0;
			$sum_pera = 0;

			$sum_ps = 0;
			$sum_gsis_gs = 0;
			$sum_ec = 0;
			$sum_pagibig = 0;
			$sum_medicare = 0;

			//payee
			foreach ($payee as $salary) {
				$sum_salary += isset($salary->payroll) ? $salary->payroll->salary : 0;
				$sum_net_pay += isset($salary->payroll) ? $salary->payroll->net_pay : 0;
				$sum_pera += isset($salary->payroll) ? $salary->payroll->pera : 0;
			}
			//deduction
			foreach ($summary as $data) {
				//$sum_ec += $data->ec;

				if($data->deduction->code == '0003')
				{
					$sum_ps += $data->deduction_amount;
					$sum_gsis_gs += $data->gs;
					$sum_ec += $data->ec;
				}
				if($data->deduction->code == '0222')
				{
					$sum_pagibig += bcdiv(number_format($data->deduction_amount,2),1,2);
				}
				if($data->deduction->code == '0111')
				{
					$sum_medicare += bcdiv(number_format($data->deduction_amount,2),1,2);
				}


			}

			// return $sum_medicare;
			$sum_gs = $sum_medicare + $sum_pagibig + $sum_ps;
			$sum_total_gs = $sum_medicare + $sum_pagibig + $sum_gsis_gs + $sum_ec;
			$collect_deductions = collect($deduction_summary)->groupBy('deduction.code');

			$sum_deduction = 0;
			foreach ($collect_deductions as $deduction) {
				$sum_code = 0;
				$code_code = 0;
				$code_description = '';
				foreach ($deduction as $code) {
					if($code->deduction->code != '0003' && $code->deduction->code != '0111' 
						&& $code->deduction->code != '0222') {
						$sum_code +=  $code->deduction_amount;
					$sum_deduction += $code->deduction_amount;
					$code_code = $code->deduction->code;
					$code_description = $code->deduction->description;
				}
			}
			if($code->deduction->code != '0003' && $code->deduction->code != '0111' 
				&& $code->deduction->code != '0222') {
				$deductions[] = [ 
					'code' => $code_code,
					'code_description' => $code_description,
					'total' => number_format($sum_code,2)
				];
			}
		}

		$total_ps = number_format(isset($sum_ps)?$sum_ps:0,2);
		$total_gsis_gs = number_format(isset($sum_gsis_gs)?$sum_gsis_gs:0,2);
		$total_gs = number_format(isset($sum_total_gs)?$sum_total_gs:0,2);
		$total_ec = number_format(isset($sum_ec)?$sum_ec:0,2);

		$total_pagibig = number_format(isset($sum_pagibig)? $sum_pagibig : 0,2);
		$total_medicare = number_format(isset($sum_medicare)? $sum_medicare : 0,2);


			// return $gsis;
		$total_salary = number_format(isset($sum_salary)? $sum_salary : 0,2);
		$total_pera = number_format(isset($sum_pera)? $sum_pera : 0,2);
		$total_emp_compe = number_format(($sum_salary + $sum_pera),2);
		$total_net_pay = number_format(isset($sum_net_pay)? $sum_net_pay : 0,2);
		$total_deductions = $sum_deduction;
		$total_deduction = number_format(($sum_gs + $total_deductions),2);
		$total_payees = count($payee);

		$by_school_code_payee = Form7::
		whereHas('form', function ($query) use($month_formdate){
			return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
		})
		->whereHas('school', function ($query){
			return $query->where('school_code', '!=',null)->where('school_code', '!=','');
		})
		->with('school:id,school_name,school_code')
		->with('payroll:form7_id,salary,net_pay,pera')
		->get(['id','user_id','name','form_id','school_id'])->groupBy('school.school_code');

			// return $by_school_code_payee;
		$by_school_name_payee = Form7::
		whereHas('form', function ($query) use($month_formdate){
			return $query->where('form7_date', 'LIKE', '%'.$month_formdate.'%');
		})
		->whereHas('school', function ($query){
			return $query->where('school_code', '!=',null)->where('school_code', '!=','');
		})
		->with('school:id,school_name,school_code')
		->with('payroll:form7_id,salary,net_pay,pera')
		->get(['id','user_id','name','form_id','school_id'])->groupBy('school.school_name');
			// return $by_school_code_payee;

		foreach ($by_school_code_payee as $payee_info) {
			$sum_salary = 0;
			foreach ($payee_info as $salary) {
				$sum_salary += isset($salary->payroll)?$salary->payroll->salary:0;
			}
			$payee_info [] = ['total_basic_salary' => number_format($sum_salary,2)];
		}

		if($keyword == 'pdf') {
			$pdf = PDF::loadView('pdf.remittance_summary',compact(
				'total_salary', 
				'total_pera',
				'total_emp_compe', 
				'total_payees', 
				'total_net_pay',
				'total_gs', 
				'total_ec', 
				'total_pagibig', 
				'total_medicare',
				'total_gsis_gs',
				'total_ps',
				'total_deduction',
				'deductions',
				'by_school_code_payee',
				'by_school_name_payee'))->setPaper('A3')->setOption('margin-top', 12)->setOption('margin-left', 5)->setOption('margin-bottom', 12)->setOption('margin-right', 5);
			return $pdf->stream('Summary of Remittance.pdf');
		} 
		if ($keyword == 'word-excel')
		{
			return compact(
				'total_salary', 
				'total_pera', 
				'total_emp_compe',
				'total_payees', 
				'total_net_pay',
				'total_gs', 
				'total_ec', 
				'total_pagibig', 
				'total_medicare',
				'total_gsis_gs',
				'total_ps',
				'total_deduction',
				'deductions','by_school_code_payee','by_school_name_payee'
			);	
		}
	}
	public function graphIndividual($user_id)
	{
		$netPay = Form7::where('user_id', $user_id)
        ->with('form:id,form7_date')
        ->with('payroll:form7_id,net_pay')->get(['id','form_id']);

        if(!empty($netPay)) {
            foreach ($netPay as $pay) {
                $month[] = date("M", strtotime(isset($pay->form)?$pay->form->form7_date:''));
                $net_pay[] =  isset($pay->payroll)?(int)$pay->payroll->net_pay:'';
            }
            
        }
		$type = 'line';
		$data = [
			'labels' => $month,
			'datasets' =>  [
				'fill' => 'false',
				'borderWidth' => '1',
				'backgroundColor' => 'rgba(0,0,0,0)',
				'pointBackgroundColor' => 'black',
	            'borderColor' => 'black',
	            'label'=> ' ', 
	            'data'=> $net_pay
	        ]
		];

		$merge [] = ['type'=>$type];
		$merge [] = ['data'=>$data];
		$naku = json_encode($merge);
		$form1 = str_replace('"', "'", $naku);
		$form2 = str_replace("{'", "", $form1);
		$form3 = str_replace("[type", "{type", $form2);
		$form4 = str_replace("':", ":", $form3);
		$form5 = str_replace("data:labels", "data:{labels", $form4);
		$form6 = str_replace("},", ",", $form5);
		$form7 = str_replace("'datasets:", "datasets:[{", $form6);
		$form8 = str_replace("'label", "label", $form7);
		$form9 = str_replace("'data", "data", $form8);
		$form10 = str_replace("'borderWidth", "borderWidth", $form9);
		$form11 = str_replace("'backgroundColor", "backgroundColor", $form10);
		$form12 = str_replace("'pointBackgroundColor", "pointBackgroundColor", $form11);
		$form13 = str_replace("'borderColor", "borderColor", $form12);

		$chart = str_replace("]}}}]", "]}]}}", $form13);


		$image_encodeurl = 'https://quickchart.io/chart?c='.urlencode($chart);
		$image_url = 'https://quickchart.io/chart?c='.$chart;
		// return [$image_url,$image_encodeurl];
		$image = file_get_contents($image_encodeurl);
		$path = public_path().'\\temp_image\\'.$user_id.'.png';
		file_put_contents($path, $image);
		$url = $path;
		return $url;

		// $naku = PDF::loadView('nakuuu_chart', ['chart' => $url]);
		// return $naku->stream('sample.pdf');
	}
}
