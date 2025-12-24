@extends('layouts.backend')

@section('styles')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('page-header')
<div class="row align-items-center">
	<div class="col">
		<h3 class="page-title">Create Client</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Create Client</li>
		</ul>
	</div>
	
</div>
@endsection


@section('content')
<div class="row">
	<div class="col-sm-12">
		<form action="{{route('client.add')}}" method="post" enctype="multipart/form-data">
			@csrf
            <div style="background: #ffffff; padding: 16px 16px;border-radius: 25px;border: 1px solid #f1cccc;">
            <div><button class="btn">Personal Information</button></div>
            <div class="row" >

<div class="form-group col-lg-3">

  <label for="contact_person" >Salutation <span class="text-danger">*</span></label>

  <select name="title" id="title" class="select2" style="width:100%">

    <option disabled selected>-- Select an Option --</option>

    <option value="Miss">Miss</option>

    <option value="Mr">Mr</option>

    <option value="Mrs">Mrs</option>

    <option value="Ms">Ms</option>

    <option value="Other">Other</option>

  </select>

</div>

<div class="form-group col-lg-3">

  <label for="contact_person" >First Name <span class="text-danger">*</span></label>

  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_email" >Last Name <span class="text-danger">*</span></label>

  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" autocomplete="off">

</div>

<div class="col-lg-3">
					<div class="form-group">
						<label>Project <span class="text-danger">*</span></label>
						<select class="select2" name="project" title="select project">
							<option value="null">Select Project</option>
							@foreach (\app\Models\Project::get() as $project)
								<option value="{{$project->id}}">{{$project->name}}</option>
							@endforeach
						</select>
					</div>
				</div>

</div>
<div class="row">

<div class="form-group col-lg-3">

  <label for="contact_phone" >Nationality <span class="text-danger">*</span></label>

  <select class="select2 select_group" name="nationality" id="nationality" style="width:100%">

    <option disabled selected>-- Select Country --</option>

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

    <option value="kittian and nevisian">Kittian and Nevisian</option>

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

    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>

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

<div class="form-group col-lg-3">

  <label for="contact_phone">DOB</label>

  <input type="date" class="form-control datetimepicker" name="dob" id="dob" placeholder="Enter DOB" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone">Occupation</label>

  <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter occupation" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone">NI</label>

  <input type="text" class="form-control" name="ni" id="ni" placeholder="Enter NI" autocomplete="off">

</div>

</div>
<div class="row">

<div class="form-group col-lg-4">

  <label for="contact_phone">Phone</label>

  <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" autocomplete="off">

</div>

<div class="form-group col-lg-4">

  <label for="contact_mobile">Mobile</label>

  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" autocomplete="off">

</div>

<div class="form-group col-lg-4">

  <label for="contact_phone">Email</label>

  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" autocomplete="off">

</div>

</div>
<div class="row">

<div class="form-group col-lg-9">

  <label for="contact_phone">Address</label>

  <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_mobile">Postcode</label>

  <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Enter Postcode" autocomplete="off">

</div>

</div>
</div>

<div style="background: #ffffff; padding: 16px 16px;border-radius: 25px;margin-top: 20px;border: 1px solid #f1cccc;">
<div><button class="btn">Files Details</button></div>
<div class="row">

<div class="form-group col-lg-3">

  <label for="contact_person" >Matter Type <span class="text-danger">*</span></label>

  <select class="form-control" name="matter_type" id="matter_type" style="width:100%">

    <option disabled selected>--Select an Option--</option>



  </select>

</div>

<div class="form-group col-lg-3">

  <label for="contact_email" >Case Opened <span class="text-danger">*</span></label>

  <input type="date" class="form-control datetimepicker" name="date_open" id="date_open">

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone">Case Consultation Date</label>

  <input type="date" class="form-control datetimepicker" name="deadline" id="deadline">

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone">Case Consultation Time</label>

  <input type="time" class="form-control" name="file_contime" id="file_contime">

</div>

</div>

<div class="row">

<div class="form-group col-lg-4">

  <label for="contact_phone" >File Status <span class="text-danger">*</span></label>

  <select class="form-control" name="file_status" id="file_status" style="width:100%">

    <option value="Open" selected>Open</option>

    <option value="Close">Close</option>

  </select>

</div>

<div class="form-group col-lg-4">

  <label for="contact_mobile">Client Resident Country</label>

  <select class="form-control" name="inout_country" id="inout_country" style="width:100%">

    <option disabled selected>--Select an Option--</option>

    <option value="IN">Country IN</option>

    <option value="OUT">Country OUT</option>

  </select>

</div>

<div class="form-group col-lg-4">

  <label for="contact_phone">File Location</label>

  <input type="text" class="form-control" name="file_location" id="file_location" placeholder="Enter File Location" autocomplete="off">

</div>

</div>


<div class="row">

<div class="form-group col-lg-4">

  <label for="contact_phone">Is Money Laundering Checks Passed?</label>

  <select class="form-control" name="money_checks" id="money_checks" style="width:100%">

    <option value="Yes" selected>Yes</option>

    <option value="No">No</option>

  </select>

</div>

<div class="form-group col-lg-4">

  <label for="contact_phone">Has Conflict of Interest been Checked?</label>

  <select class="form-control" name="conflict_check" id="conflict_check" style="width:100%">

    <option value="Yes" selected>Yes</option>

    <option value="No">No</option>

  </select>

</div>

<div class="form-group col-lg-4">

  <label for="contact_mobile">Whats the Case Risk Level?</label>

  <select class="form-control" name="risk_level" id="risk_level" style="width:100%">

    <option value="Low" selected>Low</option>

    <option value="Medium">Medium</option>

    <option value="High">High</option>

  </select>

</div>

</div>

<div class="row">

<div class="form-group col-lg-12">

  <label for="contact_mobile" >Principle Worker <span class="text-danger">*</span></label>

  <select class="form-control select_group" name="case_worker" id="case_worker" style="width:100%">

    <option disabled selected>--Select an Option--</option>



  </select>

</div>

</div>

<div class="row">

<div class="form-group col-lg-12">

  <label for="contact_mobile">Client Summary</label>

  <textarea class="form-control" name="case_summary" id="case_summary"></textarea>

</div>

</div>
</div>


<div style="background: #ffffff; padding: 16px 16px;border-radius: 25px;margin-top: 20px;border: 1px solid #f1cccc;">
<div><button class="btn">Sponsors Details</button></div>
<div class="row">

<div class="form-group col-lg-3">

  <label>Salutation</label>

  <select name="sponsor_title" id="sponsor_title" class="form-control" style="width:100%">

    <option disabled selected>-- Select an Option --</option>

    <option value="Miss">Miss</option>

    <option value="Mr">Mr</option>

    <option value="Mrs">Mrs</option>

    <option value="Ms">Ms</option>

    <option value="Other">Other</option>

  </select>

</div>

<div class="form-group col-lg-3">

  <label for="lead_source">Name</label>

  <input type="text" class="form-control" name="sponsor_name" id="sponsor_name" placeholder="Enter Name" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="lead_status">Contact</label>

  <input type="text" class="form-control" name="sponsor_phone" id="sponsor_phone" placeholder="Enter Number" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="lead_status">Email</label>

  <input type="email" class="form-control" name="sponsor_email" id="sponsor_email" placeholder="Enter Email" autocomplete="off">

</div>

</div>
</div>


<div style="background: #ffffff; padding: 16px 16px;border-radius: 25px;margin-top: 20px;border: 1px solid #f1cccc;">
<div><button class="btn">Enter Client Fees</button></div>

<div class="row">

<div class="form-group col-lg-3">

  <label for="contact_person" >Date of Payment <span class="text-danger">*</span></label>

  <input type="date" class="form-control datetimepicker" name="payment_date" id="payment_date" placeholder="Enter First Name" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_email" >Method of Payment <span class="text-danger">*</span></label>

  <select name="payment_method" id="payment_method" class="form-control" style="width:100%">

    <option disabled selected>--Select an Option--</option>

    <option value="Cash">Cash</option>

    <option value="Bank Transfer">Bank Transfer</option>

    <option value="Card">Card</option>

    <option value="Cheque">Cheque</option>

  </select>

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone" >Agreed Cost <span class="text-danger">*</span></label>

  <input type="number" class="form-control" name="total_fee" id="total_fee" placeholder="Enter Agreed Cost" autocomplete="off">

</div>

<div class="form-group col-lg-3">

  <label for="contact_phone" >Paid Amount <span class="text-danger">*</span></label>

  <input type="number" class="form-control" name="paid_fee" id="paid_fee" placeholder="Enter Paid Amount" autocomplete="off">

</div>

</div>

<div class="row">

<div class="form-group col-lg-12">

  <label for="contact_phone">Description</label>

  <input type="text" class="form-control" name="payment_description" id="payment_description" placeholder="Enter Description" autocomplete="off">

</div>

</div>
</div>

			<div class="submit-section">
				<button class="btn btn-primary submit-btn">Save</button>
			</div>
		</form>
	</div>
</div> 
@endsection


@section('scripts')
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-repeater/jquery.repeater.min.js')}}"></script>

@endsection