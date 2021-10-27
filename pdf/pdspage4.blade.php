<style>
.container {
position: static; 
width: 100%;
padding:0;
}
.image4{
    width: 1000px;
   height: 1710px;
   margin-top:-60px !important;
   margin-left:-12px !important;
}
.degree { 
   position: absolute; 
   top: 5085px; 
   left: 700px;
   font-size:12px;
  
}
 
.charge { 
   position: absolute; 
   top: 5260px; 
   left: 700px;
   font-size:12px;
  
}

.convict { 
   position: absolute; 
   top: 5460px; 
   left: 700px;
   font-size:12px;
  
}

.sector { 
   position: absolute; 
   top: 5542px; 
   left: 700px;
   font-size:12px;
  
}

.candidate { 
   position: absolute; 
   top: 5610px; 
   left: 700px;
   font-size:12px;
  
}

.country { 
   position: absolute; 
   top: 5740px; 
   left: 700px;
   font-size:12px;
  
}

.indegent { 
   position: absolute; 
   top: 5828px; 
   left: 700px;
   font-size:12px;
  
}
.reference_name1 { 
   position: absolute; 
   top: 6093px; 
   left: 18px;
   font-size:12px;
  
}
.reference_name2 { 
   position: absolute; 
   top: 6133px; 
   left: 18px;
   font-size:12px;
  
}
.reference_name3 { 
   position: absolute; 
   top: 6173px; 
   left: 18px;
   font-size:12px;
  
}
.reference_addr1 { 
   position: absolute; 
   top: 6093px; 
   left: 399px;
   font-size:12px;
  
}
.reference_addr2 { 
   position: absolute; 
   top: 6133px; 
   left: 399px;
   font-size:12px;
  
}
.reference_addr3 { 
   position: absolute; 
   top: 6173px; 
   left: 396px;
   font-size:12px;
  
}
.reference_telno1 { 
   position: absolute; 
   top: 6093px; 
   left: 632px;
   font-size:12px;
  
}
.reference_telno2 { 
   position: absolute; 
   top: 6133px; 
   left: 632px;
   font-size:12px;
  
}
.reference_telno3 { 
   position: absolute; 
   top: 6173px; 
   left: 632px;
   font-size:12px;
  
}
.govt_id { 
   position: absolute; 
   top: 6395px; 
   left: 168px;
   font-size:12px;
  
}

.license_id { 
   position: absolute; 
   top: 6431px; 
   left: 168px;
   font-size:12px;
  
}
.issuance { 
   position: absolute; 
   top: 6468px; 
   left: 168px;
   font-size:12px;
  
}
</style>

<div class="container">`
  <img class="image4" src="{{ $bg4 }}" alt="bg4" >

   <div class="degree">
  	@if(isset($user_first_background_info->third_degree)?$user_first_background_info->third_degree:'')
        @if($user_first_background_info->third_degree == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
        @elseif($user_first_background_info->third_degree == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
    @if(isset($user_first_background_info->fourth_degree)?$user_first_background_info->fourth_degree:'')
        @if($user_first_background_info->fourth_degree == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details: &nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->degree_details : '' }}</span></p>
        @elseif($user_first_background_info->fourth_degree == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
  </div>

  <div class="charge">
  	@if(isset($user_first_background_info->admin_offense)?$user_first_background_info->admin_offense:'')
        @if($user_first_background_info->admin_offense == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->admin_offense_datails : '' }}</span></p> <br>
        @elseif($user_first_background_info->admin_offense == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
    @if(isset($user_first_background_info->criminally_charge)?$user_first_background_info->criminally_charge:'')
        @if($user_first_background_info->criminally_charge == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->criminally_details : '' }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status of Case/s:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->status_of_case : '' }}</span></p>
        @elseif($user_first_background_info->admin_offense == "No")
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br> 
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></span><br>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status of Case/s:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></span>
        @endif
    @endif
  </div>

  <div class="convict">
  	@if(isset($user_first_background_info->convicted_by_law)?$user_first_background_info->convicted_by_law:'')
        @if($user_first_background_info->convicted_by_law == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->convicted_details : '' }}</span></p>
        @elseif($user_first_background_info->convicted_by_law == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b><p>
        @endif
    @endif
  </div>

  <div class="sector">
  	@if(isset($user_first_background_info->separated_from_service)?$user_first_background_info->separated_from_service:'')
	    @if($user_first_background_info->separated_from_service == "Yes")
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
	        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp; <br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px; margin-top: 4px;">{{ isset($user_first_background_info) ? $user_first_background_info->separated_details : '' }}</span></p>
	    @elseif($user_first_background_info->separated_from_service == "No")
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span>
	        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
	    @endif
	@endif
  </div>

  <div class="candidate">
  	@if(isset($user_first_background_info->candidate_in_election)?$user_first_background_info->candidate_in_election:'')
        @if($user_first_background_info->candidate_in_election == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9745;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9744; NO</span>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->candidate_details : '' }}</span></p>
        @elseif($user_first_background_info->candidate_in_election == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9744;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9745; NO</span><br>
            <p style=" margin-bottom:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif

    @if(isset($user_first_background_info->resigned_from_govt)?$user_first_background_info->resigned_from_govt:'')
        @if($user_first_background_info->resigned_from_govt == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu"><b>&#9745;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9744; NO</span>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->resigned_details : '' }}</span></p>
        @elseif($user_first_background_info->resigned_from_govt == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="dejavu" ><b>&#9744;</b> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#9745; NO</span>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
  </div>

  <div class="country">
  	@if(isset($user_first_background_info->immigrant_status)?$user_first_background_info->immigrant_status:'')
        @if($user_first_background_info->immigrant_status == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_first_background_info) ? $user_first_background_info->immigrant_details : '' }}</span></p>
        @elseif($user_first_background_info->immigrant_status == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
  </div>

  <div class="indegent">
  	@if(isset($user_second_background_info->indigenous_member)?$user_second_background_info->indigenous_member:'')
        @if($user_second_background_info->indigenous_member == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_second_background_info) ? $user_second_background_info->indigenous_details : '' }}</span></p>
        @elseif($user_second_background_info->indigenous_member == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p style=" margin-bottom:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif

    @if(isset($user_second_background_info->disability_status)?$user_second_background_info->disability_status:'')
        @if($user_second_background_info->disability_status == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>    
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_second_background_info) ? $user_second_background_info->disability_details : '' }}</span></p>
        @elseif($user_second_background_info->disability_status == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p style=" margin-bottom:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
    
    @if(isset($user_second_background_info->solo_parent)?$user_second_background_info->solo_parent:'')
        @if($user_second_background_info->solo_parent == "Yes")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9745;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9744;</b>NO</span><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<br><span style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;">{{ isset($user_second_background_info) ? $user_second_background_info->solo_parent_details : '' }}</span></p>
        @elseif($user_second_background_info->solo_parent == "No")
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b class="dejavu">&#9744;</b> YES </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><b class="dejavu">&#9745;</b>NO</span><br>
            <p style=" margin-bottom:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, please specify ID No.:&nbsp;<br><b style="margin-left: 35px; border-bottom: 2px solid currentColor; line-height: 1; display: inline-block; width:180px;"></b></p>
        @endif
    @endif
  </div>

    @if(isset($reference1[0]) ? $reference1[0] : "")
    @if(strlen($reference1[0]) >= 60)
    <span class="reference_name1" style="width:378px; font-size:11px; top:6086px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference1[0] }}</span>
    @elseif(strlen($reference1[0]) <= 60)
    <span class="reference_name1" style=" width:378px; text-align:center; line-height:1.2; ">{{ $reference1[0] }}</span>
    @endif
    @endif 

    @if(isset($reference1[1]) ? $reference1[1] : "")
    @if(strlen($reference1[1]) >= 60)
    <span class="reference_name2" style="width:378px; font-size:11px; top:6128px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference1[1] }}</span>
    @elseif(strlen($reference1[1]) <= 60)
    <span class="reference_name2" style=" width:378px; text-align:center; line-height:1.2; ">{{ $reference1[1] }}</span>
    @endif
    @endif 

    @if(isset($reference1[2]) ? $reference1[2] : "")
    @if(strlen($reference1[2]) >= 60)
    <span class="reference_name3" style="width:378px; font-size:11px; top:6168px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference1[2] }}</span>
    @elseif(strlen($reference1[2]) <= 60)
    <span class="reference_name3" style=" width:378px; text-align:center; line-height:1.2; ">{{ $reference1[2] }}</span>
    @endif
    @endif 
 
    @if(isset($reference2[0]) ? $reference2[0] : "")
    @if(strlen($reference2[0]) >= 36)
    <span class="reference_addr1" style="width:237px; font-size:11px; top:6086px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference2[0] }}</span>
    @elseif(strlen($reference2[0]) <= 36)
    <span class="reference_addr1" style=" width:237px; text-align:center; line-height:1.2; ">{{ $reference2[0] }}</span>
    @endif
    @endif 

    @if(isset($reference2[1]) ? $reference2[1] : "")
    @if(strlen($reference2[1]) >= 36)
    <span class="reference_addr2" style="width:237px; font-size:11px; top:6128px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference2[1] }}</span>
    @elseif(strlen($reference2[1]) <= 36)
    <span class="reference_addr2" style=" width:237px; text-align:center; line-height:1.2; ">{{ $reference2[1] }}</span>
    @endif
    @endif 

    @if(isset($reference2[2]) ? $reference2[2] : "")
    @if(strlen($reference2[2]) >= 36)
    <span class="reference_addr3" style="width:237px; font-size:11px; top:6168px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference2[2] }}</span>
    @elseif(strlen($reference2[2]) <= 36)
    <span class="reference_addr3" style=" width:237px; text-align:center; line-height:1.2; ">{{ $reference2[2] }}</span>
    @endif
    @endif 

    @if(isset($reference3[0]) ? $reference3[0] : "")
    @if(strlen($reference3[0]) >= 15)
    <span class="reference_telno1" style="width:120px; font-size:11px; top:6086px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference3[0] }}</span>
    @elseif(strlen($reference3[0]) <= 15)
    <span class="reference_telno1" style=" width:120px; text-align:center; line-height:1.2; ">{{ $reference3[0] }}</span>
    @endif
    @endif 

    @if(isset($reference3[1]) ? $reference3[1] : "")
    @if(strlen($reference3[1]) >= 15)
    <span class="reference_telno2" style="width:120px; font-size:11px; top:6128px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference3[1] }}</span>
    @elseif(strlen($reference3[1]) <= 15)
    <span class="reference_telno2" style=" width:120px; text-align:center; line-height:1.2; ">{{ $reference3[1] }}</span>
    @endif
    @endif 

    @if(isset($reference3[2]) ? $reference3[2] : "")
    @if(strlen($reference3[2]) >= 15)
    <span class="reference_telno3" style="width:120px; font-size:11px; top:6168px; word-wrap: break-word; text-align:center; line-height:1.2; ">{{ $reference3[2] }}</span>
    @elseif(strlen($reference3[2]) <= 15)
    <span class="reference_telno3" style=" width:120px; text-align:center; line-height:1.2; ">{{ $reference3[2] }}</span>
    @endif
    @endif 

  <div class="govt_id">
        <p>
        	
        		{{ isset($user_second_background_info->govt_issued_id) ? $user_second_background_info->govt_issued_id : '' }}
        	
        </p>
  </div>
  <div class="license_id">
        <p>
         	
         		{{ isset($user_second_background_info->govt_issued_no) ? $user_second_background_info->govt_issued_no : '' }}
         	
        </p>
  </div>
  <div class="issuance">
        <p>
        	{{ isset($user_second_background_info->govt_id_date_issurance) ? $user_second_background_info->govt_id_date_issurance : '' }}
        	
        </p>
  </div>

</div>
