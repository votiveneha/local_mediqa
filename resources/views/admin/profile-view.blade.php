@extends('admin.layouts.layout')
@section('content')
<style>
    h6 {
        font-family: "Plus Jakarta Sans", sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 26px;
        color: #000000;
    }

    .dropdown-list {
        background-color: white;
        color: white;
        max-height: 200px;
        /* Adjust the height as needed */
        overflow-y: auto;
        /* Add scrollbar if content overflows */
        padding: 0;
        list-style: none;
        margin: 0;
        border: 1px solid #f1f1f1;
        border-radius: 4px;
        background-color: #ffffff;
        padding: 11px 15px 13px 15px;
        width: 100%;
        color: #A0ABB8;

    }

    .dropdown-item-custom {
        padding: 10px;
        /* Add padding to list items */
        color: black;
        text-decoration: none;
        display: block;
    }

    .dropdown-item-custom:hover {
        background-color: white;
        /* Change the hover background color */
    }

    .vacc_rec_div {
        padding: 20px;
        width: 97%;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 0;
    }

    .vacc_rec_div .record_v {
        border-bottom: solid 1px #80808045;
        margin-bottom: 15px;
    }

    .vacc_rec_div .record_v h6 {
        margin-bottom: 0px;
    }

    .vaccine-section {
        padding: 20px;
        width: 97%;
        margin: auto;
        padding-top: 0px;
        border-bottom: solid 1px #80808045;
        margin-bottom: 15px;
    }

    h6.other-vaccin {
        font-size: 18px;
    }
</style>

<div class="container-fluid">
    <div class="back_arrow" onclick="history.back()" title="Go Back">
        <i class="fa fa-arrow-left"></i>
    </div>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8"> View Profile </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">View Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid" style="height: 125px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-100  overflow-hidden">
        <div class="card-body p-3 px-md-4 pb-0">
            <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Personal Detail @if ($profileData->status == 1)
                <span class="badge bg-success ms-2">Unblock</span>
                @else
                <span class="badge bg-danger ms-2">Blocked</span>
                @endif
            </h3>
        </div>
        <div class="card-body p-3 px-md-4">
            <div class="row align-items-center justify-content-between">
                <div class="col ">
                    <div class="d-flex align-items-md-center gap-4 flex-column flex-md-row">
                        <div class="d-flex  mb-2 ">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center "
                                style="width: 144px; height: 144px;" ;>
                                <div class="border rounded-circle border-3 border-white d-flex align-items-center justify-content-center  overflow-hidden btn-light commingsoon"
                                    data-bs-toggle="modal" data-bs-target="#commingsoonModel"
                                    style="width: 140px; height: 140px;" ;>
                                    <img src="{{ asset($profileData->profile_img) }}" alt=""
                                        class="w-100 h-100">
                                </div>

                            </div>
                        </div>
                        <div class="w-100">
                            <div class="d-flex justify-content-between">
                                <h5 class="fs-5 mb-2 fw-bolder"> {{ ucwords($profileData->name)." ".ucwords($profileData->lastname) }} </h5>
                                <h5 class="fs-5 mb-2 fw-bolder"> </h5>

                            </div>
                            @if ($profileData->phone != '')
                            <p class="d-flex text-dark align-items-center gap-2 mb-1">
                                <i class="ti ti-phone fs-4"></i><strong> +{{ $profileData->country_code }}
                                    {{ $profileData->phone }}
                                </strong>
                            </p>
                            @endif
                            <div class="d-md-flex align-items-center gap-3 mb-2">
                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i>{{ $profileData->email }}
                                </p>

                            </div>
                            <div class="d-md-flex align-items-center gap-3 mb-2">
                                @if ($profileData->post_code != '')
                                <p class="fs-3 mb-0 fw-bolder">Post Code : {{ $profileData->post_code }}</p>
                                @endif
                                <h5 class="fs-5 mb-0 fw-bolder"> </h5>

                            </div>
                            <div class="d-md-flex align-items-center gap-3 mb-2">
                                @if ($profileData->preferred != '')
                                <p class="fs-3 mb-0 fw-bolder">Preferred Name : {{ $profileData->preferred }}</p>
                                @endif
                                <h5 class="fs-5 mb-0 fw-bolder"> </h5>

                            </div>
                            <div class="d-md-flex align-items-center gap-3 mb-">
                                @if ($profileData->store_url != '')
                                <p class="fs-3 mb-0 fw-bolder">Store URL: {{ $profileData->store_url }}</p>
                                @endif
                                <h5 class="fs-5 mb-0 fw-bolder"> </h5>

                            </div>


                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <div class="card list-drpdwns-set">
        <div class="card-body">
            @include("admin.layouts.nurse_view_tabs")
            <!-- Tab panes -->
            <div class="tab-content border mt-2">
                <div class="tab-pane p-3 active show" id="navpill-1" role="tabpanel">
                    <div class="row">
                        <div class=" w-100  overflow-hidden">
                            <div class="card-body p-3 px-md-4 pb-0">
                                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Basic Details</h3>
                            </div>
                            <div class="card-body p-3 px-md-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($profileData->date_of_birth && $profileData->gender && $profileData->state && $profileData->city
                                        && $profileData->personal_website && $profileData->home_address && $profileData->emergency_conact_numeber)
                                        @if($profileData->date_of_birth)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                {{-- <strong>Do you have work rights in Austrailia? : </strong>
                                                    <span>{{ $profileData->work_right == 0 ? 'No' : 'Yes' }}</span> --}}
                                                <strong>Date of Birth : </strong>
                                                <span>{{ \Carbon\Carbon::parse($profileData->date_of_birth)->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if($profileData->gender)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                <!-- specialty_name_by_id -->
                                                <strong>Gender: </strong><span>{{ $profileData->gender }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        {{-- <div class="col-md-6 mt-3">
                                                <div class="d-flex gap-3 flex-wrap">
                                                    <strong>Nationality: </strong>
                                                    <!-- specialty_name_by_id -->
                                                   <span> - - -  </span>
                                                </div>
                                            </div> --}}


                                        {{-- <div class="col-md-6 mt-3">
                                                <div class="d-flex gap-3 flex-wrap">
                                                    <strong> Home Address : </strong> <span> - - -  </span>
                                                </div>
                                            </div> --}}

                                        @if($profileData->state)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                <strong> State : </strong> <span>{{ state_name($profileData->state)}}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if($profileData->city)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                <strong> City : </strong> <span>{{ $profileData->city }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if($profileData->personal_website)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                <strong> Personal website : </strong> <span>{{ $profileData->personal_website }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if($profileData->home_address)
                                        <div class="col-md-6 mt-3">
                                            <div class="d-flex gap-3 flex-wrap">
                                                <strong>Home Address : </strong> <span>{{ $profileData->home_address }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        {{-- @if($profileData->bio)
                                                <div class="col-md-12 mt-3">
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <strong>Bio   : </strong> <span>{{ $profileData->bio }}</span>
                                    </div>
                                </div>
                                @endif --}}
                                <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center  mt-3">Emergency Contact Information : </h4>
                                @if($profileData->emergency_conact_numeber)
                                <div class="col-md-6 mt-3">
                                    <div class="d-flex gap-3 flex-wrap">
                                        <strong>Mobile No :</strong> <span>
                                            +{{ $profileData->emegency_country_code }}{{ " "}}
                                            {{ $profileData->emergency_conact_numeber }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                                @if($profileData->emergergency_contact_email)
                                <div class="col-md-6 mt-3">
                                    <div class="d-flex gap-3 flex-wrap">
                                        <strong>Email :</strong> <span>
                                            {{ $profileData->emergergency_contact_email }}
                                        </span>
                                    </div>
                                </div>
                                @endif


                                @if ($profileData->specialty != 'null')
                                                @php $subspecialty=json_decode($profileData->specialty); @endphp
                                                @if (is_array($subspecialty))
                                                    <div class="col-md-12 mt-3">
                                                        <div class="d-flex gap-3 flex-wrap">
                                                            <strong> Specialty : </strong>
                                                            @forelse($subspecialty as $key => $ubspecialty)
                                                            <span>{{ practitioner_type_by_id($ubspecialty) }} , </span>@empty
                                @endforelse
                            </div>
                        </div>
                        @endif
                        @endif
                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>

                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



{{-- <div class="tab-pane p-3" id="navpill-6" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Vaccinations</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    @if($vaccinationData)
                    <div class="row">
                        @php
                        $vacc = [];
                        @endphp

                        @if(!empty($vaccinationData))
                        @foreach($vaccinationData as $vcdata)
                        @php $vacc[] = $vcdata->vaccination_id; @endphp
                        @endforeach
                        @endif

                        @if(count($vacc)>0)
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Vaccination Records : </strong>

                                <ul class="dropdown-list">
                                    @forelse($vaccinationData as $value)
                                    <li><span class="dropdown-item-custom">{{ vaccination_name_by_id($value->vaccination_id) }} </span></li>
                                    @empty
                                    <li><a href="#" class="dropdown-item-custom"></a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="vacc_rec_div">
                            <?php
                            if (!empty($vccdata)) {
                                foreach ($vccdata as $vcvalue) { ?>

                                    <div class="record_v">
                                        <h6>{{ $vcvalue->vaccination_name }}</h6>
                                        <div class="row vacc_rec_institution">
                                            <div class="form-group col-md-12">
                                                @php
                                                $vcc_level_req = DB::table("vcc_level_req")->where("type", $vcvalue->vaccination_id)->get();
                                                @endphp
                                                <label class="form-label">Level of Requirement : </label>
                                                <div>
                                                    @foreach ($vcc_level_req as $level)
                                                    <label>{{ $level->level_req }}</label><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Immunization Status :</label>
                                                <label class="form-label">{{ $vcvalue->imm_status }}</label>
                                            </div>
                                            @if($vcvalue->covid_dose !=0)
                                            <div class="form-group col-md-12">
                                                <label class="form-label">How many doses of a TGA-recognised COVID-19 vaccine have you received? : </label>
                                                <label class="form-label">{{ $vcvalue->covid_dose }} dose</label>
                                            </div>
                                            @endif

                                            <div class="form-group col-md-12">
                                                <label class="form-label">Evidence Required:</label>
                                                <label class="form-label">{{ $vcvalue->evidence_type_name }}</label>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Evidence : </label>
                                                <div id="fileList" class="file-list">
                                                    <?php
                                                    $getevidancedata = DB::table("evidance_file")->where("vcc_front_id", $vcvalue->id)->get();
                                                    if ($getevidancedata->isNotEmpty()) {
                                                        foreach ($getevidancedata as $vals) { ?>
                                                            <div class="file-item">
                                                                <a href="{{ asset('uploads/evidence/' . $vals->file_name) }}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> {{$vals->original_name}}</a>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php  }
                            } ?>
                        </div>

                        <!--[ADD OTHER VACCINE START]-->
                        <div class="row" id="vaccine-section-container">
                            <h6 class="other-vaccin">Other Vaccination </h6>
                            @php $ci = 1; @endphp
                            @if($other_vaccine)
                            @foreach($other_vaccine as $other)
                            <div class="vaccine-section">
                                <div class="col-md-12">
                                    <input type="hidden" name="other_id[]" value="{{$other->id}}">
                                    <h6>Vaccination {{$ci}}</h6>
                                    <div class="form-group level-drp">
                                        <label class="form-label" for="input-1">Vaccination Name : </label>
                                        <label class="form-label" for="input-1">{{$other->vaccination_name}} </label>
                                    </div>

                                    <div class="form-group level-drp">
                                        <label class="form-label" for="input-1">Immunization Status : </label>
                                        <label class="form-label" for="input-1">
                                            <?php
                                            $get_imm_status = DB::table("imm_status")->get();
                                            foreach ($get_imm_status as $status) {
                                                if ($other->immunization_status == $status->id) {
                                                    echo $status->name;
                                                }
                                            } ?>
                                        </label>
                                    </div>
                                    <div class="form-group level-drp">
                                        <label class="form-label" for="input-1">Evidence Type : </label>
                                        <label class="form-label" for="input-1">{{ $other->evidence_type }}</label>
                                    </div>
                                    <div class="form-group level-drp">
                                        <label class="form-label" for="input-1">Upload Evidence : </label>
                                        <div id="fileListo" class="file-list">
                                            @if($other->evidence_file!='')
                                            <div class="file-item">
                                                <a href="{{ asset('uploads/evidence/' . $other->evidence_file) }}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> {{$other->evidence_file}}</a>
                                            </div>
                                            @endif
                                        </div>
                                        <span class="reqError text-danger valley"></span>
                                    </div>
                                </div>
                            </div>
                            @php $ci++; @endphp
                            @endforeach
                            @endif
                        </div>
                        <!--[ADD OTHER VACCINE END]-->
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="text-center text-danger fs-5">No data found</div>
                    </div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="tab-pane p-3" id="navpill-7" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Checks and Clearances</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    
                    <div class="row">
                        @if($work_eligibility)
                        <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Residency and Work Eligibility : </h4>
                        @if(isset($work_eligibility->residency) && $work_eligibility->residency)

                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Residency : </strong><span>{{ $work_eligibility->residency}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->passport_number) && $work_eligibility->passport_number)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Passport Number : </strong>
                                <span>{{$work_eligibility->passport_number}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->country_name) && $work_eligibility->country_name)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Passport Country Of Issue: </strong>
                                <span>{{$work_eligibility->country_name}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->sublcass_text) && $work_eligibility->sublcass_text)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Visa Subclass Number : </strong>
                                <span>{{$work_eligibility->sublcass_text}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->other_visa_type) && $work_eligibility->other_visa_type)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Other Visa Type: </strong>
                                <span>{{$work_eligibility->other_visa_type}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->visa_grant_number) && $work_eligibility->visa_grant_number)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Visa grant number: </strong>
                                <span>{{$work_eligibility->visa_grant_number}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->evidence_type) && $work_eligibility->evidence_type)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Evience Type: </strong>
                                <span>{{$work_eligibility->evidence_type}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($work_eligibility->support_document) && $work_eligibility->support_document)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Support Document:</strong>
                                <a href="{{ asset('uploads/support_document/'.$work_eligibility->support_document) }}" target="_blank">
                                    <span class="text-success">View Document</span>
                                </a>
                            </div>

                        </div>
                        @endif
                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>

                        @endif
                        
                        @if($ndis)
                        <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center mt-3">NDIS Worker Screening Check : </h4>
                        @if(isset($ndis->state_id) && $ndis->state_id)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>State: </strong><span>{{ state_name($ndis->state_id)}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($ndis->clearance_number) && $ndis->clearance_number)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>NDIS Worker Clearance Number: </strong><span>{{ $ndis->clearance_number}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($ndis->expiry_date) && $ndis->expiry_date)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Expiry date: </strong><span>{{ $ndis->expiry_date}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($ndis->evidence_file) && $ndis->evidence_file)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Support Document:</strong>
                                <a href="{{ asset('uploads/support_document/'.$ndis->evidence_file) }}" target="_blank">
                                    <span class="text-success">View Document</span>
                                </a>
                            </div>
                        </div>
                        @endif

                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>

                        @endif

                        @if($ww_child)
                        <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center mt-3">Working With Children Check : </h4>
                        @foreach($ww_child as $child)
                            
                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>State: </strong><span>{{ state_name($child->state_id)}}</span>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Clearance Number : </strong><span>{{ $child->clearance_number}}</span>
                                </div>
                            </div>   

                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Expiry Date: </strong> <span>{{$child->expiry_date}}</span>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Support Document:</strong>
                                    <a href="{{ asset('uploads/support_document/'.$child->wwcc_evidence) }}" target="_blank">
                                        <span class="text-success">View Document</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>

                        @endif


                        @if($policy_check)
                        <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center mt-3">Police check : </h4>
                        
                        @if(isset($policy_check->issuance_date) && $policy_check->issuance_date)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Date : </strong><span>{{ $policy_check->issuance_date}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($policy_check->evidence_file) && $policy_check->evidence_file)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Police Clearance : </strong>
                                <a href="{{ asset('uploads/support_document/'.$policy_check->evidence_file)}}" target="_blank">
                                    <img src="{{ asset('uploads/support_document/'.$policy_check->evidence_file)}}" alt="" style="height:50px;width:50px">
                                </a>
                            </div>
                        </div>
                        @endif
                                                
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Status : </strong>
                                @if($policy_check->status == 1)
                                <span class="badge bg-success">Approvedee</span>
                                @elseif($policy_check->status == 0)
                                <span class="badge bg-danger">Pending</span>
                                @elseif($policy_check->status == 2)
                                <span class="badge bg-danger">Rejected</span>
                                @endif
                            </div>
                        </div>
                        
                        @if(isset($policy_check->status) && $policy_check->status == 2)
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Reason : </strong>
                                <span>{{$policy_check->reason}}</span>
                            </div>
                        </div>
                        @endif
                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>
                        @endif


                        @if($specialize)
                        <h4 class="fw-bolder fs-6 lh-base d-flex align-items-center mt-3">Specialized Clearances : </h4>
                        @foreach($specialize as $specialized)

                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>State: </strong><span>{{ state_name($specialized->clearance_state)}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Specialized Clearance type: </strong> <span>{{$specialized->clearance_type}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Specialized Clearance Number: </strong> <span>{{$specialized->clearance_number}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Expiry Date: </strong> <span>{{$specialized->clearance_expiry_date}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>Support Document:</strong>
                                    <a href="{{ asset('uploads/support_document/'.$specialized->clearance_evidence) }}" target="_blank">
                                        <span class="text-success">View Document</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <div class="text-center text-danger fs-5">No data found</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="tab-pane p-3" id="navpill-8" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center ">Professional Memberships</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    <?php
                        if(!empty($proMembershipData)){
                          $organization_data = json_decode($proMembershipData->organization_data);
                          
                        }else{
                          $organization_data = array(); 
                        }
                        
                        
                        $o_data = (array)$organization_data;
                        $p_memb_arr = array();

                        foreach ($organization_data as $p_memb) {
                          
                          //print_r($p_memb);
                          $p_memb_arr[] = array_search($p_memb, (array)$organization_data);
                          
                        }

                        
                        
                      ?>
                    @if($proMembershipData)
                    <div class="row">
                        
                        <?php
                            $organization_name_array = array();
                        ?>
                        @foreach($p_memb_arr as $pmem)
                            <?php
                                $organization_data = DB::table("professional_organization")->where("organization_id",$pmem)->first();
                                $organization_name_array[] = $organization_data->organization_country;
                            ?>
                            
                        @endforeach
                        
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Organization Country</strong>
                                <ul class="dropdown-list">
                                    @foreach($p_memb_arr as $pmem)
                                    <?php
                                        $organization_data = DB::table("professional_organization")->where("organization_id",$pmem)->first();
                                        
                                    ?>
                                    <li><span class="dropdown-item-custom">{{ $organization_data->organization_country }} </span></li>
                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="show_country_org">
                            @foreach($p_memb_arr as $p_arr)
                            <?php
                                $country_name = DB::table("professional_organization")->where("organization_id",$p_arr)->first();
                                $os_data = (array)$o_data[$p_arr];
                                $sub_count_arr = array();

                                foreach ($os_data as $p_memb) {
                                    $sub_count_arr[] = array_search($p_memb, $os_data);
                                }

                                //print_r($sub_count_arr);
                            ?>  
                            <div class="col-md-12 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>{{ $country_name->organization_name }}</strong>
                                    <ul class="dropdown-list">
                                        @foreach($sub_count_arr as $s_count)
                                        <?php
                                            $organization_data = DB::table("professional_organization")->where("organization_id",$s_count)->first();
                                            
                                        ?>
                                        <li><span class="dropdown-item-custom">{{ $organization_data->organization_country }} </span></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>  
                            <div class="show_subcountry_org-{{ $p_arr }}">
                                @foreach ($sub_count_arr as $p_arr1)
                                <?php
                                    $country_name = DB::table("professional_organization")->where("organization_id",$p_arr1)->first();
                                    $oss_data = (array)$os_data[$p_arr1];
                                    $subsub_count_arr = array();

                                    foreach ($oss_data as $p_memb) {
                                        $subsub_count_arr[] = array_search($p_memb, $oss_data);
                                    }
                                ?>
                                <div class="col-md-12 mt-3">
                                    <div class="d-flex gap-3 flex-wrap">
                                        <strong>{{ $country_name->organization_country }}</strong>
                                        <ul class="dropdown-list">
                                            @foreach($subsub_count_arr as $ss_count)
                                            <?php
                                                $organization_data = DB::table("professional_organization")->where("organization_id",$ss_count)->first();
                                                
                                            ?>
                                            <li><span class="dropdown-item-custom">{{ $organization_data->organization_country }} </span></li>
                                            
                                            @endforeach
                                        </ul>
                                    </div>
                                </div> 
                                <div class="show_membership_type-{{ $p_arr }}{{ $p_arr1 }}">
                                    @foreach ($subsub_count_arr as $p_arr2)
                                    <?php
                                        $membership_type = DB::table("membership_type")->where("submember_id","0")->orderBy('membership_name', 'ASC')->get();
                                        $osm_data = (array)$oss_data[$p_arr2];
                                        $memb_type_arr = array();

                                        foreach ($osm_data as $m_type_arr) {
                                            $memb_type_arr[] = array_search($m_type_arr, $osm_data);
                                        }
                                    
                                    
                                    ?>
                                    @endforeach
                                    <div class="col-md-12 mt-3">
                                        <div class="d-flex gap-3 flex-wrap">
                                            <strong>Membership Type({{ $country_name->organization_country }})</strong>
                                            <ul class="dropdown-list">
                                                @foreach($memb_type_arr as $mt_arr)
                                                <?php
                                                    $organization_data = DB::table("membership_type")->where("membership_id",$mt_arr)->first();
                                                    
                                                ?>
                                                <li><span class="dropdown-item-custom">{{ $organization_data->membership_name }} </span></li>
                                                
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> 
                                    <div class="show_submembership_type-{{ $p_arr2 }}">
                                        @foreach ($memb_type_arr as $p_arr3)
                                        <?php
                                            $membership_name = DB::table("membership_type")->where("membership_id",$p_arr3)->first();
                                            
                                            $ossm_data = (array)$osm_data[$p_arr3];
                                            $memb_type_arr = array();
                                        
                                            foreach ($ossm_data as $m_type_arr) {
                                            $memb_type_arr[] = $m_type_arr;
                                            
                                            }

                                        ?>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="d-flex gap-3 flex-wrap">
                                            <strong>{{ $membership_name->membership_name }}</strong>
                                            <ul class="dropdown-list">
                                                @foreach($memb_type_arr as $mt_arr)
                                                <?php
                                                    $organization_data = DB::table("membership_type")->where("membership_id",$mt_arr)->first();
                                                    
                                                ?>
                                                <li><span class="dropdown-item-custom">{{ $organization_data->membership_name }} </span></li>
                                                
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Organization Name</strong>
                                <?php
                                    $organization_name_data = json_decode($proMembershipData->des_profession_association);
                                ?>
                                <ul class="dropdown-list">
                                    @foreach($organization_name_data as $org_name)
                                    
                                    <li><span class="dropdown-item-custom">{{ $org_name }} </span></li>
                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div> 
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Date Joined:</strong>
                                <span>{{ $proMembershipData->date_joined }}</span>
                            </div>
                        </div> 
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Status:</strong>
                                <span>{{ $proMembershipData->membership_status }}</span>
                            </div>
                        </div> 
                        <?php
                            if(!empty($proMembershipData)){
                            $award_data = json_decode($proMembershipData->award_recognitions);
                            
                            }else{
                            $award_data = array(); 
                            }
                            
                            
                            $a_data = (array)$award_data;
                            $awards_recognition_arr = array();

                            foreach ($a_data as $a_reg) {
                            $awards_recognition_arr[] = array_search($a_reg, $a_data);
                            }  

                        ?>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Awards & Recognitions</strong>
                                <ul class="dropdown-list">
                                    @foreach($awards_recognition_arr as $award_name)
                                    <?php
                                        $award_data_name = DB::table("awards_recognitions")->where("award_id",$award_name)->first();
                                        
                                    ?>
                                    <li><span class="dropdown-item-custom">{{ $award_data_name->award_name }} </span></li>
                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="show_award_reg">
                            @foreach ($awards_recognition_arr as $a_reg_arr)
                            <?php
                                
                                
                                $subawards_name = DB::table("awards_recognitions")->where("award_id",$a_reg_arr)->first();
                                $as_data = (array)$a_data[$a_reg_arr];
                                $subawards_recognition_arr = array();

                                foreach ($as_data as $suba_reg) {
                                    $subawards_recognition_arr[] = $suba_reg;
                                }
                            
                            ?>    
                            @endforeach
                            <div class="col-md-12 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <strong>{{ $subawards_name->award_name }}</strong>
                                    <ul class="dropdown-list">
                                        @foreach($subawards_recognition_arr as $award_id)
                                        <?php
                                            $award_data_name = DB::table("awards_recognitions")->where("award_id",$award_id)->first();
                                            
                                        ?>
                                        <li><span class="dropdown-item-custom">{{ $award_data_name->award_name }} </span></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="d-flex gap-3 flex-wrap">
                                    <div class="evidence_label">
                                        <strong>Evidence</strong>
                                    </div>
                                    
                                    <div class="memb_evdence">
                                        @if(!empty($proMembershipData) && $proMembershipData->evidence_imgs)
                                        <?php
                                        $dtran_img = json_decode($proMembershipData->evidence_imgs);
                                        //print_r($dtran_img);
                                        
                                        ?>

                                        @if(!empty($dtran_img))
                                        @foreach($dtran_img as $tranimg)
                                        <div class="trans_img trans_img-{{ $i }}">
                                        <a href="{{ url('/public/uploads/education_degree') }}/{{ $tranimg }}" target="_blank"><i class="fa fa-file"></i>{{ $tranimg }}</a>
                                        
                                        </div>
                                        
                                        @endforeach
                                        @endif

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="text-center text-danger fs-5">No data found</div>
                    </div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="tab-pane p-3" id="navpill-9" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center">Interview and References</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    @if($interviewrefData)
                    <div class="row">

                        @if(isset($interviewrefData->interview_availablity) && $interviewrefData->interview_availablity)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Interview Availability : </strong><span>{{ \Carbon\Carbon::parse($interviewrefData->interview_availablity)->format('d/m/y H:i') }}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($interviewrefData->reference_name) && $interviewrefData->reference_name)
                        <h4 class="mt-4 fw-bolder fs-6 lh-base d-flex align-items-center">Professional References</h4>
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Names : </strong><span>{{ $interviewrefData->reference_name }}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($interviewrefData->reference_email) && $interviewrefData->reference_email)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Email: </strong>
                                <span>{{$interviewrefData->reference_email}}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($interviewrefData->contact_country_code) && $interviewrefData->contact_country_code)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Mobile Number : </strong>
                                <span>+{{ $interviewrefData->contact_country_code }}{{ " "}}
                                    {{ $interviewrefData->reference_contact }}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($interviewrefData->reference_relationship) && $interviewrefData->reference_relationship)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Relationship : </strong>
                                <span>{{ $interviewrefData->reference_relationship }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="text-center text-danger fs-5">No data found</div>
                    </div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="tab-pane p-3" id="navpill-10" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center">Personal Preferences</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    @if($personalprefData)
                    <div class="row">

                        @if(isset($personalprefData->preferred_work_schedule) && $personalprefData->preferred_work_schedule)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Preferred Work Schedule : </strong><span>{{ $personalprefData->preferred_work_schedule }}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($personalprefData->country) && $personalprefData->country)
                        <h4 class="mt-4 fw-bolder fs-6 lh-base d-flex align-items-center">Preferred Work Locations</h4>
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Country : </strong><span>{{ country_name($personalprefData->country)}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($personalprefData->state) && $personalprefData->state)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>State: </strong>
                                <span>{{ state_name($personalprefData->state)}}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($personalprefData->work_environment) && $personalprefData->work_environment)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Work Environment Preferences : </strong>
                                <span>{{ $personalprefData->work_environment }}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($personalprefData->shift_preferences) && $personalprefData->shift_preferences)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Shift Preferences : </strong>
                                <span>{{ $personalprefData->shift_preferences }}</span>
                            </div>
                        </div>
                        @endif
                        @if(isset($personalprefData->specific_facilities) && $personalprefData->specific_facilities)
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Specific Facilities : </strong>
                                <textarea name="specific_facilities" class="form-control">{{ $personalprefData->specific_facilities }}</textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="text-center text-danger fs-5">No data found</div>
                    </div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="tab-pane p-3" id="navpill-11" role="tabpanel">
    <div class="row">
        <div class=" w-100  overflow-hidden">
            <div class="card-body p-3 px-md-4 pb-0">
                <h3 class="fw-bolder fs-6 lh-base d-flex align-items-center">Find Work Preferences</h3>
            </div>
            <div class="card-body p-3 px-md-4">
                <div class="col-md-12">
                    @if($findworkData)
                    <div class="row">

                        @if(isset($findworkData->desired_job_role) && $findworkData->desired_job_role)
                        <?php
                        $desired_job_roles = json_decode($findworkData->desired_job_role);
                        ?>
                        <div class="col-md-12 mt-3">

                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Desired Job Role : </strong>
                                <ul class="dropdown-list">
                                    @forelse($desired_job_roles as $key => $desired_job_role)
                                    <li><span class="dropdown-item-custom">{{ specialty_name_by_id_NEW($desired_job_role) }} , </span></li>
                                    @empty
                                    <li><a href="#" class="dropdown-item-custom">No specialties available</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        @endif


                        @if(isset($findworkData->benefits_preferences) && $findworkData->benefits_preferences)
                        <div class="col-md-12 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Benefits Preferences : </strong>
                                <?php
                                $benefits_preferences = json_decode($findworkData->benefits_preferences);
                                ?>
                                <ul class="dropdown-list">
                                    @forelse($benefits_preferences as $key => $benefits_prefere)
                                    <li><span class="dropdown-item-custom">{{ $benefits_prefere }} , </span></li>
                                    @empty
                                    <li><a href="#" class="dropdown-item-custom">No specialties available</a></li>
                                    @endforelse
                                </ul>

                            </div>
                        </div>
                        @endif
                        @if(isset($findworkData->salary_expectations) && $findworkData->salary_expectations)
                        
                        <div class="col-md-6 mt-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <strong>Salary Expectations : </strong><span>{{ $findworkData->salary_expectations}}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="text-center text-danger fs-5">No data found</div>
                    </div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div> --}}
</div>
</div>
</div>

</div>
@endsection
@section('js')
<script type="text/javascript"
    src="https://nextjs.webwiders.in/pindrow/public/advertiser/dist/libs/owl.carousel/dist/owl.carousel.min.js">
</script>

<script type="text/javascript"></script>
<script>
    $(document).ready(function() {
        // cate_1
        $('#cat_1').after(sugical_care);
        $('#sugical_care').after(Operating_Room);
        $('#Operating_Room').after(paediatric_oR);
        $('#paediatric_oR').after(Technician_Nurse);

        // For cat 2
        $('#cat_2').after(Surgical_Obstetrics);

        // For cat 3
        $('#cat_3').after(Neonatal_Care);
        $('#Neonatal_Care').after(Surgical_Preop);
        $('#Surgical_Preop').after(Paediatric_Operating);
        $('#Paediatric_Operating').after(Paediatric_Operating_Scout);
        $('#Paediatric_Operating_Scout').after(Paediatric_Operating_Scrub);
    });
</script>
@endsection