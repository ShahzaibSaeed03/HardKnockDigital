@extends('layouts.backend') @section('content')
    <style>
        i.fa.fa-pencil {
            padding: 6px !important;
        }

        .set_height {
            height: 220px !important;
        }
    </style>
    <div class="page">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Client Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ul>
                    </div>
                </div>
            </div> {{-- message --}}
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img"> <a href="#">
                                            <img alt=""
                                                src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}"
                                                alt="{{ Auth::user()->name }}">
                                        </a> </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">Client : {{ $client->firstname }}</h3>
                                                <div class="small doj text-muted">Email : {{ $client->email }}</div>
                                                <div class="small doj text-muted">Phone : {{ $client->phone }}</div>
                                                <div class="small doj text-muted">DOB : {{ $client->dob }}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send
                                                        Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">NI:</div>
                                                    <div class="small doj text-muted">{{ $client->ni }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Mobile:</div>
                                                    <div class="small doj text-muted">{{ $client->mobile }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Nationality:</div>
                                                    <div class="small doj text-muted">{{ $client->nationality }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="small doj text-muted">{{ $client->address }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Post Code:</div>
                                                    <div class="small doj text-muted">{{ $client->postcode }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Occupation:</div>
                                                    <div class="small doj text-muted">{{ $client->occupation }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                        href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab"
                                    class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank &
                                    Statutory <small class="text-danger">(Admin Only)</small></a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">File Manager</a>
                            </li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Notes</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Client
                                    Account</a></li>
                            <li class="nav-item"><a href="#client_documents" data-toggle="tab"
                                    class="nav-link">Documents</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">File Time
                                    Sheet</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <!-- Documents Info Tab -->

                <div class="tab-pane fade" id="client_documents">
                    <div class="row">
                        <!-- CCL Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">CCL <a href="#" class="edit-icon" data-toggle="modal"
                                            data-target="#Create_CCL_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>CLL ID</th>
                                                    <th>Client</th>
                                                    <th>Date</th>
                                                    <th>Cost</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl as $ccl_data)
                                                    <tr>
                                                        <td>{{ $ccl_data->ccl_uniid }}</td>
                                                        <td>{{ $ccl_data->CCL_Client->firstname }}
                                                            {{ $ccl_data->CCL_Client->lastname }}</td>
                                                        <td>{{ $ccl_data->matter_date }}</td>
                                                        <td>{{ $ccl_data->matter_cost }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL Table -->

                        <!-- CCL_Deportation Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">CCL Deportation <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#Create_CCL_Deportation_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_depo as $depo)
                                                    <tr>
                                                        <td>{{ $depo->ccl_d_uniid }}</td>
                                                        <td>{{ $depo->CCL_Client_Depo->firstname }}
                                                            {{ $depo->CCL_Client_Depo->firstname }}</td>
                                                        <td>{{ $depo->ccl_d_date }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_Deportation Table -->

                        <!-- CCL_Naturalisation Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Naturalisation <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#Create_CCL_Naturalisation_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Client</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_naturalisation as $nat)
                                                    <tr>
                                                        <td>{{ $nat->naturalisation_uniid }}</td>
                                                        <td>{{ $nat->CCL_Client_Nat->firstname }}
                                                            {{ $nat->CCL_Client_Nat->lastaname }}</td>
                                                        <td>{{ $nat->naturalisation_date }}</td>
                                                        <td>{{ $nat->naturalisation_type }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_Naturalisation Table -->

                        <!-- CCL_ClientLetter Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Client Letter <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#Create_ClientLetter_CCL_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_clientLetter as $CL)
                                                    <tr>
                                                        <td>{{ $CL->cus_l_uniid }}</td>
                                                        <td>{{ $CL->CCL_CL->firstname }} {{ $CL->CCL_CL->lastname }}</td>
                                                        <td>{{ $CL->cus_l_date }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_ClientLetter Table -->

                        <!-- CCL_LetterForClient Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Letter For Client <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#Create_LetterForClient_CCL_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_clientForLetter as $LFC)
                                                    <tr>
                                                        <td>{{ $LFC->let_f_uniid }}</td>
                                                        <td>{{ $LFC->CCL_Client_LFC->firstname }}
                                                            {{ $LFC->CCL_Client_LFC->lastname }}</td>
                                                        <td>{{ $LFC->let_f_date }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_LetterForClient Table -->

                        <!-- CCL_ClientFax Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Client Fax <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#Create_ClientFax_CCL_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_fax as $fax)
                                                    <tr>
                                                        <td>{{ $fax->cus_f_uniid }}</td>
                                                        <td>{{ $fax->CCL_clientFax->firstname }}
                                                            {{ $fax->CCL_clientFax->lastname }}</td>
                                                        <td>{{ $fax->cus_f_date }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_ClientFax Table -->

                        <!-- CCL_Generic Table -->
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">CCL Generic <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#fCreate_Generic_CCL_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive set_height">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>GenericCCL ID</th>
                                                    <th>Client</th>
                                                    <th>Date</th>
                                                    <th>Cost</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ccl_generic as $genric)
                                                    <tr>
                                                        <td>{{ $genric->ccl_uniid }}</td>
                                                        <td>{{ $genric->CCL_Client_Gen->firstname }}
                                                            {{ $genric->CCL_Client_Gen->lastname }}</td>
                                                        <td>{{ $genric->matter_date }}</td>
                                                        <td>{{ $genric->matter_cost }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown"
                                                                    class="action-icon dropdown-toggle" href="#"><i
                                                                        class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i
                                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /CCL_Generic Table -->

                    </div>
                </div>

                <!--/ Documents Info Tab -->
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Files Details <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    @if (!empty($files))
                                        @foreach ($files as $file)
                                            <ul class="personal-info d-flex">
                                                <div class="col-sm-5">
                                                    <li>
                                                        <div class="title">File No.</div>
                                                        <div class="text">{{ $file->file_uniid }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Matter Type</div>
                                                        <div class="text">{{ $file->matter_type }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case Consultation Date</div>
                                                        <div class="text"><a href="">{{ $file->date_open }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case Consultation Time</div>
                                                        <div class="text">{{ $file->file_contime }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Form Filled By</div>
                                                        <div class="text">{{ $file->filled_by }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">File Status</div>
                                                        <div class="text">{{ $file->file_status }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">File Location</div>
                                                        <div class="text">{{ $file->file_media_path }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case Opened</div>
                                                        <div class="text">{{ $file->date_open }}</div>
                                                    </li>
                                                </div>
                                                <div class="col-sm-7">
                                                    <li>
                                                        <div class="title">Money Laundering</div>
                                                        <div class="text">{{ $file->money_checks }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Conflict of Interest</div>
                                                        <div class="text">{{ $file->conflict_check }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case Risk Level</div>
                                                        <div class="text">{{ $file->risk_level }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Client Resident Country</div>
                                                        <div class="text">{{ $file->inout_country }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Principle Worker</div>
                                                        <div class="text">{{ $file->case_worker }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case Workers(s)</div>
                                                        <div class="text">{{ $file->case_summary }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Client Summary</div>
                                                        <div class="text">{{ $file->case_summary }}</div>
                                                    </li>
                                                </div>
                                            </ul>
                                        @endforeach
                                    @else
                                        <ul class="personal-info d-flex">
                                            <div class="col-md-5 profile-info-left">
                                                <li>
                                                    <div class="title">File No.</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Matter Type</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Case Consultation Date</div>
                                                    <div class="text"><a href="">N/A</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Case Consultation Time</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Form Filled By</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">File Status</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">File Location</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Case Opened</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                            </div>
                                            <div class="col-md-7">
                                                <li>
                                                    <div class="title">Money Laundering Checks</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Conflict of Interest</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Case Risk Level</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Client Resident Country</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Principle Worker</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Case Workers(s)</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                                <li>
                                                    <div class="title">Client Summary</div>
                                                    <div class="text">N/A</div>
                                                </li>
                                            </div>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Sponsors Details <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#family_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    @foreach ($files as $file)
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Salutation</div>
                                                <div class="text">{{ $file->sponsor_title }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">{{ $file->sponsor_name }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Contact</div>
                                                <div class="text">{{ $file->sponsor_phone }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Email</div>
                                                <div class="text">{{ $file->sponsor_email }}</div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Fee Details <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#family_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    @foreach ($fees as $fee)
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Date of Payment</div>
                                                <div class="text">{{ $fee->payment_date }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Method of Payment</div>
                                                <div class="text">{{ $fee->payment_method }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Agreed Cost (£)</div>
                                                <div class="text">{{ $fee->total_fee }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Paid Amount (£)</div>
                                                <div class="text">{{ $fee->paid_fee }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Description</div>
                                                <div class="text">{{ $fee->payment_description }}</div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->
                <!-- Projects Tab -->
                <div class="tab-pane fade" id="emp_projects">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action"> <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"> <a data-target="#edit_project"
                                                data-toggle="modal" href="#" class="dropdown-item"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a> <a
                                                data-target="#delete_project" data-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. When an unknown printer took a galley of type and scrambled it... </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title"> Deadline: </div>
                                        <div class="text-muted"> 17 Apr 2019 </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img
                                                        alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                        alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img
                                                        alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                        alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                        alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li> <a href="#" class="all-users">+15</a> </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action"> <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"> <a data-target="#edit_project"
                                                data-toggle="modal" href="#" class="dropdown-item"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a> <a
                                                data-target="#delete_project" data-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. When an unknown printer took a galley of type and scrambled it... </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title"> Deadline: </div>
                                        <div class="text-muted"> 17 Apr 2019 </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img
                                                        alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                        alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img
                                                        alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                        alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                        alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li> <a href="#" class="all-users">+15</a> </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action"> <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"> <a data-target="#edit_project"
                                                data-toggle="modal" href="#" class="dropdown-item"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a> <a
                                                data-target="#delete_project" data-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. When an unknown printer took a galley of type and scrambled it... </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title"> Deadline: </div>
                                        <div class="text-muted"> 17 Apr 2019 </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img
                                                        alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                        alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img
                                                        alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                        alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                        alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li> <a href="#" class="all-users">+15</a> </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action"> <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"> <a data-target="#edit_project"
                                                data-toggle="modal" href="#" class="dropdown-item"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a> <a
                                                data-target="#delete_project" data-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. When an unknown printer took a galley of type and scrambled it... </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title"> Deadline: </div>
                                        <div class="text-muted"> 17 Apr 2019 </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img
                                                        alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                        alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img
                                                        alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                        alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                        alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li> <a href="#" class="all-users">+15</a> </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Projects Tab -->
                <!-- Bank Statutory Tab -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Basic Salary Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary basis <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select salary basis type</option>
                                                <option>Hourly</option>
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary amount <small class="text-muted">per
                                                    month</small></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Type your salary amount" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment type</label>
                                            <select class="select">
                                                <option>Select payment type</option>
                                                <option>Bank transfer</option>
                                                <option>Check</option>
                                                <option>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> PF Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF contribution</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> ESI Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI contribution</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ESI rate</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Bank Statutory Tab -->
            </div>
        </div>
        <!-- /Page Content -->
        @if (!empty($client))
            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data"> @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img"> <img class="inline-block"
                                                src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}"
                                                alt="{{ Auth::user()->name }}">
                                            <div class="fileupload btn"> <span class="btn-text">edit</span>
                                                <input class="upload" type="file" id="image" name="images">
                                                <input type="hidden" name="hidden_image" id="e_image"
                                                    value="{{ Auth::user()->avatar }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <label>Salutation *</label>
                                                        <select name="title" id="title"
                                                            class="form-control select_group" style="width:100%"
                                                            required="Yes">
                                                            <option disabled selected>-- Select an Option --</option>
                                                            <option value="Miss" <?php if ($client['title'] == 'Miss') {
                                                                echo 'selected';
                                                            } ?>>Miss</option>
                                                            <option value="Mr" <?php if ($client['title'] == 'Mr') {
                                                                echo 'selected';
                                                            } ?>>Mr</option>
                                                            <option value="Mrs" <?php if ($client['title'] == 'Mrs') {
                                                                echo 'selected';
                                                            } ?>>Mrs</option>
                                                            <option value="Ms" <?php if ($client['title'] == 'Ms') {
                                                                echo 'selected';
                                                            } ?>>Ms</option>
                                                            <option value="Other" <?php if ($client['title'] == 'Other') {
                                                                echo 'selected';
                                                            } ?>>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" id="firstname"
                                                            name="firstname" value="{{ $client->firstname }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                            name="lastname" value="{{ $client->lastname }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                        <input type="tel" class="form-control" id="phone"
                                                            name="phone" value="{{ $client->phone }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Mobile</label>
                                                        <input type="tel" class="form-control" id="mobile"
                                                            name="mobile" value="{{ $client->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ $client->email }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>DOB</label>
                                                        <input type="date" class="form-control datetimepicker"
                                                            id="dob" name="dob" value="{{ $client->dob }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <label>NI</label>
                                                        <input type="text" class="form-control" id="ni"
                                                            name="ni" value="{{ $client->ni }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nationality</label>
                                                        <select class="form-control" data-live-search="true"
                                                            name="nationality" id="nationality" style="width:100%"
                                                            required="Yes">
                                                            <option value="<?php echo $client['nationality']; ?>" selected>
                                                                <?php echo $client['nationality']; ?>
                                                            </option>
                                                            <option disabled>-- Select Country --</option>
                                                            <option value="afghan">Afghan</option>
                                                            <option value="albanian">Albanian</option>
                                                            <option value="algerian">Algerian</option>
                                                            <option value="american">American</option>
                                                            <option value="andorran">Andorran</option>
                                                            <option value="angolan">Angolan</option>
                                                            <option value="antiguans">Antiguans</option>
                                                            <option value="argentinean">Argentinean</option>
                                                            <option value="armenian">Armenian</option>
                                                            <option value="australian">Australian</option>
                                                            <option value="austrian">Austrian</option>
                                                            <option value="azerbaijani">Azerbaijani</option>
                                                            <option value="bahamian">Bahamian</option>
                                                            <option value="bahraini">Bahraini</option>
                                                            <option value="bangladeshi">Bangladeshi</option>
                                                            <option value="barbadian">Barbadian</option>
                                                            <option value="barbudans">Barbudans</option>
                                                            <option value="batswana">Batswana</option>
                                                            <option value="belarusian">Belarusian</option>
                                                            <option value="belgian">Belgian</option>
                                                            <option value="belizean">Belizean</option>
                                                            <option value="beninese">Beninese</option>
                                                            <option value="bhutanese">Bhutanese</option>
                                                            <option value="bolivian">Bolivian</option>
                                                            <option value="bosnian">Bosnian</option>
                                                            <option value="brazilian">Brazilian</option>
                                                            <option value="british">British</option>
                                                            <option value="bruneian">Bruneian</option>
                                                            <option value="bulgarian">Bulgarian</option>
                                                            <option value="burkinabe">Burkinabe</option>
                                                            <option value="burmese">Burmese</option>
                                                            <option value="burundian">Burundian</option>
                                                            <option value="cambodian">Cambodian</option>
                                                            <option value="cameroonian">Cameroonian</option>
                                                            <option value="canadian">Canadian</option>
                                                            <option value="cape verdean">Cape Verdean</option>
                                                            <option value="central african">Central African</option>
                                                            <option value="chadian">Chadian</option>
                                                            <option value="chilean">Chilean</option>
                                                            <option value="chinese">Chinese</option>
                                                            <option value="colombian">Colombian</option>
                                                            <option value="comoran">Comoran</option>
                                                            <option value="congolese">Congolese</option>
                                                            <option value="costa rican">Costa Rican</option>
                                                            <option value="croatian">Croatian</option>
                                                            <option value="cuban">Cuban</option>
                                                            <option value="cypriot">Cypriot</option>
                                                            <option value="czech">Czech</option>
                                                            <option value="danish">Danish</option>
                                                            <option value="djibouti">Djibouti</option>
                                                            <option value="dominican">Dominican</option>
                                                            <option value="dutch">Dutch</option>
                                                            <option value="english">English</option>
                                                            <option value="east timorese">East Timorese</option>
                                                            <option value="ecuadorean">Ecuadorean</option>
                                                            <option value="egyptian">Egyptian</option>
                                                            <option value="emirian">Emirian</option>
                                                            <option value="emirati">Emirati</option>
                                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                                            <option value="eritrean">Eritrean</option>
                                                            <option value="estonian">Estonian</option>
                                                            <option value="ethiopian">Ethiopian</option>
                                                            <option value="fijian">Fijian</option>
                                                            <option value="filipino">Filipino</option>
                                                            <option value="finnish">Finnish</option>
                                                            <option value="french">French</option>
                                                            <option value="gabonese">Gabonese</option>
                                                            <option value="gambian">Gambian</option>
                                                            <option value="georgian">Georgian</option>
                                                            <option value="german">German</option>
                                                            <option value="ghanaian">Ghanaian</option>
                                                            <option value="greek">Greek</option>
                                                            <option value="grenadian">Grenadian</option>
                                                            <option value="guatemalan">Guatemalan</option>
                                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                            <option value="guinean">Guinean</option>
                                                            <option value="guyanese">Guyanese</option>
                                                            <option value="haitian">Haitian</option>
                                                            <option value="herzegovinian">Herzegovinian</option>
                                                            <option value="honduran">Honduran</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="hungarian">Hungarian</option>
                                                            <option value="icelandic">Icelandic</option>
                                                            <option value="icelander">Icelander</option>
                                                            <option value="indian">Indian</option>
                                                            <option value="indonesian">Indonesian</option>
                                                            <option value="iranian">Iranian</option>
                                                            <option value="iraqi">Iraqi</option>
                                                            <option value="irish">Irish</option>
                                                            <option value="israeli">Israeli</option>
                                                            <option value="italian">Italian</option>
                                                            <option value="ivorian">Ivorian</option>
                                                            <option value="jamaican">Jamaican</option>
                                                            <option value="japanese">Japanese</option>
                                                            <option value="jordanian">Jordanian</option>
                                                            <option value="kazakhstani">Kazakhstani</option>
                                                            <option value="kenyan">Kenyan</option>
                                                            <option value="kittian and nevisian">Kittian and Nevisian
                                                            </option>
                                                            <option value="kuwaiti">Kuwaiti</option>
                                                            <option value="kyrgyz">Kyrgyz</option>
                                                            <option value="laotian">Laotian</option>
                                                            <option value="latvian">Latvian</option>
                                                            <option value="lebanese">Lebanese</option>
                                                            <option value="liberian">Liberian</option>
                                                            <option value="libyan">Libyan</option>
                                                            <option value="liechtensteiner">Liechtensteiner</option>
                                                            <option value="lithuanian">Lithuanian</option>
                                                            <option value="luxembourger">Luxembourger</option>
                                                            <option value="macedonian">Macedonian</option>
                                                            <option value="malagasy">Malagasy</option>
                                                            <option value="malawian">Malawian</option>
                                                            <option value="malaysian">Malaysian</option>
                                                            <option value="maldivan">Maldivan</option>
                                                            <option value="malian">Malian</option>
                                                            <option value="maltese">Maltese</option>
                                                            <option value="marshallese">Marshallese</option>
                                                            <option value="mauritanian">Mauritanian</option>
                                                            <option value="mauritian">Mauritian</option>
                                                            <option value="mexican">Mexican</option>
                                                            <option value="micronesian">Micronesian</option>
                                                            <option value="moldovan">Moldovan</option>
                                                            <option value="monacan">Monacan</option>
                                                            <option value="mongolian">Mongolian</option>
                                                            <option value="moroccan">Moroccan</option>
                                                            <option value="mosotho">Mosotho</option>
                                                            <option value="motswana">Motswana</option>
                                                            <option value="mozambican">Mozambican</option>
                                                            <option value="namibian">Namibian</option>
                                                            <option value="nauruan">Nauruan</option>
                                                            <option value="nepalese">Nepalese</option>
                                                            <option value="new zealander">New Zealander</option>
                                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                            <option value="nicaraguan">Nicaraguan</option>
                                                            <option value="nigerien">Nigerien</option>
                                                            <option value="north korean">North Korean</option>
                                                            <option value="northern irish">Northern Irish</option>
                                                            <option value="norwegian">Norwegian</option>
                                                            <option value="omani">Omani</option>
                                                            <option value="pakistani">Pakistani</option>
                                                            <option value="philippine">Philippine</option>
                                                            <option value="palauan">Palauan</option>
                                                            <option value="panamanian">Panamanian</option>
                                                            <option value="papua new guinean">Papua New Guinean</option>
                                                            <option value="paraguayan">Paraguayan</option>
                                                            <option value="peruvian">Peruvian</option>
                                                            <option value="polish">Polish</option>
                                                            <option value="portuguese">Portuguese</option>
                                                            <option value="qatari">Qatari</option>
                                                            <option value="romanian">Romanian</option>
                                                            <option value="russian">Russian</option>
                                                            <option value="rwandan">Rwandan</option>
                                                            <option value="saint lucian">Saint Lucian</option>
                                                            <option value="salvadoran">Salvadoran</option>
                                                            <option value="samoan">Samoan</option>
                                                            <option value="san marinese">San Marinese</option>
                                                            <option value="sao tomean">Sao Tomean</option>
                                                            <option value="saudi">Saudi</option>
                                                            <option value="scottish">Scottish</option>
                                                            <option value="senegalese">Senegalese</option>
                                                            <option value="serbian">Serbian</option>
                                                            <option value="seychellois">Seychellois</option>
                                                            <option value="sierra leonean">Sierra Leonean</option>
                                                            <option value="singaporean">Singaporean</option>
                                                            <option value="slovakian">Slovakian</option>
                                                            <option value="slovenian">Slovenian</option>
                                                            <option value="solomon islander">Solomon Islander</option>
                                                            <option value="somali">Somali</option>
                                                            <option value="south african">South African</option>
                                                            <option value="south korean">South Korean</option>
                                                            <option value="spanish">Spanish</option>
                                                            <option value="sri lankan">Sri Lankan</option>
                                                            <option value="sudanese">Sudanese</option>
                                                            <option value="surinamer">Surinamer</option>
                                                            <option value="swazi">Swazi</option>
                                                            <option value="swedish">Swedish</option>
                                                            <option value="swiss">Swiss</option>
                                                            <option value="syrian">Syrian</option>
                                                            <option value="taiwanese">Taiwanese</option>
                                                            <option value="tajik">Tajik</option>
                                                            <option value="tajikistani">Tajikistani</option>
                                                            <option value="tanzanian">Tanzanian</option>
                                                            <option value="thai">Thai</option>
                                                            <option value="togolese">Togolese</option>
                                                            <option value="tongan">Tongan</option>
                                                            <option value="trinidadian or tobagonian">Trinidadian or
                                                                Tobagonian</option>
                                                            <option value="tunisian">Tunisian</option>
                                                            <option value="turkish">Turkish</option>
                                                            <option value="tuvaluan">Tuvaluan</option>
                                                            <option value="ugandan">Ugandan</option>
                                                            <option value="ukrainian">Ukrainian</option>
                                                            <option value="uruguayan">Uruguayan</option>
                                                            <option value="uzbekistani">Uzbekistani</option>
                                                            <option value="venezuelan">Venezuelan</option>
                                                            <option value="vietnamese">Vietnamese</option>
                                                            <option value="welsh">Welsh</option>
                                                            <option value="yemenite">Yemenite</option>
                                                            <option value="zambian">Zambian</option>
                                                            <option value="zimbabwean">Zimbabwean</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Occupation</label>
                                                        <input type="text" class="form-control" id="occupation"
                                                            name="occupation" value="{{ $client->occupation }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <div class="col-md-8">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" value="{{ $client->address }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Post code</label>
                                                        <input type="text" class="form-control" id="post_code"
                                                            name="post_code" value="{{ $client->postcode }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->
        @else
            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST"> @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img"> <img class="inline-block"
                                                src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}"
                                                alt="{{ Auth::user()->name }}">
                                            <div class="fileupload btn"> <span class="btn-text">edit</span>
                                                <input class="upload" type="file" id="upload" name="upload">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="{{ Auth::user()->name }}">
                                                    <input type="hidden" class="form-control" id="user_id"
                                                        name="user_id" value="{{ Auth::user()->user_id }}">
                                                    <input type="hidden" class="form-control" id="email"
                                                        name="email" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker" type="text"
                                                            id="birthDate" name="birthDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="select form-control" id="gender" name="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" id="address"
                                                name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" id="state"
                                                name="state">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" id=""
                                                name="country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pin Code</label>
                                            <input type="text" class="form-control" id="pin_code"
                                                name="pin_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="phoneNumber"
                                                name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select" id="department" name="department">
                                                <option selected disabled>Select Department</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="select" id="" name="designation">
                                                <option selected disabled>Select Designation</option>
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reports To <span class="text-danger">*</span></label>
                                            <select class="select" id="" name="reports_to">
                                                <option selected disabled>-- select --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->
            @endif @if (!empty($userInformation))
                <!-- Personal Info Modal -->
                <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Personal Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                        aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST"> @csrf
                                    <input type="hidden" class="form-control" name="user_id"
                                        value="{{ Session::get('user_id') }}" readonly>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Passport No</label>
                                                <input type="text"
                                                    class="form-control @error('passport_no') is-invalid @enderror"
                                                    name="passport_no" value="{{ $userInformation->passport_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Passport Expiry Date</label>
                                                <div class="cal-icon">
                                                    <input
                                                        class="form-control datetimepicker @error('passport_expiry_date') is-invalid @enderror"
                                                        type="text" name="passport_expiry_date"
                                                        value="{{ $userInformation->passport_expiry_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tel</label>
                                                <input class="form-control @error('tel') is-invalid @enderror"
                                                    type="text" name="tel"
                                                    value="{{ $userInformation->tel }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nationality <span class="text-danger">*</span></label>
                                                <input class="form-control @error('nationality') is-invalid @enderror"
                                                    type="text" name="nationality"
                                                    value="{{ $userInformation->nationality }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <div class="form-group">
                                                    <input class="form-control @error('religion') is-invalid @enderror"
                                                        type="text" name="religion"
                                                        value="{{ $userInformation->religion }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marital status <span class="text-danger">*</span></label>
                                                <select
                                                    class="select form-control @error('marital_status') is-invalid @enderror"
                                                    name="marital_status">
                                                    <option value="{{ $userInformation->marital_status }}"
                                                        {{ $userInformation->marital_status == $userInformation->marital_status ? 'selected' : '' }}>
                                                        {{ $userInformation->marital_status }} </option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employment of spouse</label>
                                                <input
                                                    class="form-control @error('employment_of_spouse') is-invalid @enderror"
                                                    type="text" name="employment_of_spouse"
                                                    value="{{ $userInformation->employment_of_spouse }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. of children </label>
                                                <input class="form-control @error('children') is-invalid @enderror"
                                                    type="text" name="children"
                                                    value="{{ $userInformation->children }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Personal Info Modal -->
            @else
                <!-- Personal Info Modal -->
                <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Personal Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                        aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST"> @csrf
                                    <input type="hidden" class="form-control" name="user_id"
                                        value="{{ Session::get('user_id') }}" readonly>
                                    <div class="row">
                                        @foreach ($files as $file)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Matter Type</label>
                                                    <select class="form-control" name="matter_type" id="matter_type"
                                                        style="width:100%" required="Yes">

                                                        <option disabled>--Select an Option--</option>

                                                        @foreach ($tags_data as $v)
                                                            <option value="<?php echo $v->id; ?>" <?php if ($file->matter_type == $v->id) {
                                                                echo 'selected';
                                                            } ?>>
                                                                <?php echo $v->tag_name; ?></option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Case Opened <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="date_open"
                                                        value="{{ $file->date_open }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Case Consultation Date</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="religion"
                                                            value="{{ $file->date_open }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Case Consultation Time</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="religion"
                                                            value="{{ $file->file_contime }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Form Filled By</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="religion"
                                                            value="{{ $file->filled_by }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>File Status</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="file_status"
                                                            id="file_status" style="width:100%" required="Yes">

                                                            <option value="Open" <?php if ($file['file_status'] == 'Open') {
                                                                echo 'selected';
                                                            } ?>>Open</option>

                                                            <option value="Close" <?php if ($file['file_status'] == 'Close') {
                                                                echo 'selected';
                                                            } ?>>Close</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Is Money Laundering Checks Passed?</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="money_checks"
                                                            id="money_checks" style="width:100%">

                                                            <option value="Yes" <?php if ($file['money_checks'] == 'Yes') {
                                                                echo 'selected';
                                                            } ?>>Yes</option>

                                                            <option value="No" <?php if ($file['money_checks'] == 'No') {
                                                                echo 'selected';
                                                            } ?>>No</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Has Conflict of Interest been Checked?</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="conflict_check"
                                                            id="conflict_check" style="width:100%">

                                                            <option value="Yes" <?php if ($file['conflict_check'] == 'Yes') {
                                                                echo 'selected';
                                                            } ?>>Yes</option>

                                                            <option value="No" <?php if ($file['conflict_check'] == 'No') {
                                                                echo 'selected';
                                                            } ?>>No</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Whats the Case Risk Level?</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="risk_level" id="risk_level"
                                                            style="width:100%">

                                                            <option value="Low" <?php if ($file['risk_level'] == 'Low') {
                                                                echo 'selected';
                                                            } ?>>Low</option>

                                                            <option value="Medium" <?php if ($file['risk_level'] == 'Medium') {
                                                                echo 'selected';
                                                            } ?>>Medium</option>

                                                            <option value="High" <?php if ($file['risk_level'] == 'High') {
                                                                echo 'selected';
                                                            } ?>>High</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="contact_mobile">Client Resident Country</label>

                                                    <select class="form-control" name="inout_country"
                                                        id="inout_country" style="width:100%">

                                                        <option disabled>--Select an Option--</option>

                                                        <option value="IN" <?php if ($file['inout_country'] == 'IN') {
                                                            echo 'selected';
                                                        } ?>>Country IN</option>

                                                        <option value="OUT" <?php if ($file['inout_country'] == 'OUT') {
                                                            echo 'selected';
                                                        } ?>>Country OUT</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>File Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="religion"
                                                            value="{{ $file->file_media_path }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="contact_mobile">Principle Worker *</label>

                                                    <select class="form-control select_group" name="case_worker"
                                                        id="case_worker" style="width:100%" required="Yes">

                                                        <option disabled selected>--Select an Option--</option>

                                                        <?php foreach ($users_data as $v) : ?>

                                                        <option value="<?php echo $v->user_uniid; ?>" <?php if ($file->case_worker == $v->user_uniid) {
                                                            echo 'selected';
                                                        } ?>>
                                                            <?php echo $v->firstname . ' ' . $v->lastname; ?> (<?php echo $v['username']; ?>)</option>

                                                        <?php endforeach ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Case Workers(s)</label>
                                                    <select class="form-control select_group" name="assigned_to[]"
                                                        id="assigned_to[]" style="width:100%" required="Yes">

                                                        <option disabled selected>--Select an Option--</option>

                                                        <?php foreach ($users_data as $v) : ?>

                                                        <option value="<?php echo $v->user_uniid; ?>" <?php if ($file->case_worker == $v->user_uniid) {
                                                            echo 'selected';
                                                        } ?>>
                                                            <?php echo $v->firstname . ' ' . $v->lastname; ?> (<?php echo $v['username']; ?>)</option>

                                                        <?php endforeach ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Client Summary</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="religion" value="{{ $file->case_summary }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Personal Info Modal -->
            @endif
            <!-- Create CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL.Create_ccl')
            @endforeach
            <!-- /Create CCL Modal Modal -->

            <!-- Create ClientFax CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_ClientFax.Create_ClientFax_CCL')
            @endforeach
            <!-- /Create ClientFax CCL Modal Modal -->

            <!-- Create ClientLetter CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_ClientLetter.Create_ClientLetter_CCL')
            @endforeach
            <!-- /Create ClientLetter CCL Modal Modal -->

            <!-- Create Deportation CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_Deportation.Create_Deportation_CCL')
            @endforeach
            <!-- /Create Deportation CCL Modal Modal -->

            <!-- Create Generic CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_Generic.Create_Generic_CCL')
            @endforeach
            <!-- /Create Generic CCL Modal Modal -->

            <!-- Create LetterForClient CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_LetterForClient.Create_LetterForClient_CCL')
            @endforeach
            <!-- /Create LetterForClient CCL Modal Modal -->

            <!-- Create Naturalisation CCL Modal -->
            @foreach ($files as $file)
                @include('backend.CCL_Data.CCL_Naturalisation.Create_Naturalisation_CCL')
            @endforeach
            <!-- /Create Naturalisation CCL Modal Modal -->

            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Sponsors Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Sponsors </h3>
                                            <div class="row">
                                                @foreach ($files as $file)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Salutation <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $file->sponsor_title }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $file->sponsor_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Contact <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $file->sponsor_phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $file->sponsor_email }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Family Info Modal -->
            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->
            <!-- Education Modal -->
            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Education Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A"
                                                            class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A"
                                                            class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more"> <a href="javascript:void(0);"><i
                                                        class="fa fa-plus-circle"></i> Add More</a> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Education Modal -->
            <!-- Experience Modal -->
            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more"> <a href="javascript:void(0);"><i
                                                        class="fa fa-plus-circle"></i> Add More</a> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Experience Modal -->
            <!-- /Page Content -->
</div> @endsection
