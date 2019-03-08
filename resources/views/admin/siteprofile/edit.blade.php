@extends('admin.layout.master')
@section('content')
	<div class="portlet light portlet-fit portlet-form bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">SITE UPDATE</span>
            </div>
        </div>
        <div class="portlet-body">
        	@if(session()->has('success_message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!
           		{{ session()->get('success_message') }} </h4>
        </div>
        @endif
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.siteprofile.update')}}" method="POST" id="form_sample_1" class="form-horizontal"  novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                <div class="form-body">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-'success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group">
                        <div class="col-md-3">
	                        <label class="control-label">Site Name 
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="sitename" data-required="1" class="form-control" placeholder="Enter Site Name" value="{{ !empty($data['row']->sitename)?$data['row']['sitename']:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Site Slogan
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="siteslogan" data-required="1" class="form-control"  placeholder="Enter Site Slogan" value="{{ !empty($data['row']->siteslogan)?$data['row']->siteslogan:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Skip To Content
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="sikiptocontent" data-required="1" class="form-control"  placeholder="Enter Skip To Content" value="{{ !empty($data['row']->sikiptocontent)?$data['row']->sikiptocontent:'' }}"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Address Location
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="addressone" data-required="1" class="form-control"  placeholder="Enter Address Location" value="{{ !empty($data['row']->addressone)?$data['row']->addressone:'' }}"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Address Full Description
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="addresstwo" data-required="1" class="form-control" placeholder="Enter Address Full Description" value="{{ !empty($data['row']->addresstwo)?$data['row']->addresstwo:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Mobile Number
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="mobileno" data-required="1" class="form-control"  placeholder="Enter Mobile Number" value="{{ !empty($data['row']->mobileno)?$data['row']->mobileno:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Lane Line Number One
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="phoneone" data-required="1" class="form-control"  placeholder="Enter Lane Line Number One" value="{{ !empty($data['row']->phoneone)?$data['row']->phoneone:'' }}"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Lane Line Number Two
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="phonetwo" data-required="1" class="form-control"  placeholder="Enter Lane Line Number Two" value="{{ !empty($data['row']->phonetwo)?$data['row']->phonetwo:'' }}"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Copyright Text
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="copytext" data-required="1" class="form-control" placeholder="Enter Copyright Text" value="{{ !empty($data['row']->copytext)?$data['row']->copytext:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Facebook Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="facebook" data-required="1" class="form-control"  placeholder="Enter Facebook Link" value="{{ !empty($data['row']->facebook)?$data['row']->facebook:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Twitter Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="twitter" data-required="1" class="form-control"  placeholder="Enter Twitter Link" value="{{ !empty($data['row']->twitter)?$data['row']->twitter:'' }}"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Youtube Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="youtube" data-required="1" class="form-control"  placeholder="Enter Youtube Link" value="{{ !empty($data['row']->youtube)?$data['row']->youtube:'' }}"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Linkedin Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="linkedin" data-required="1" class="form-control" placeholder="Enter Linkedin Link" value="{{ !empty($data['row']->linkedin)?$data['row']->linkedin:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Instagram Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="instagram" data-required="1" class="form-control"  placeholder="Enter Instagram Link" value="{{ !empty($data['row']->instagram)?$data['row']->instagram:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Site Owner Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="owner" data-required="1" class="form-control"  placeholder="Enter Site Owner Name" value="{{ !empty($data['row']->owner)?$data['row']->owner:'' }}"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Meta Title Seo
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="metatitle" data-required="1" class="form-control"  placeholder="Enter Meta Title Seo" value="{{ !empty($data['row']->metatitle)?$data['row']->metatitle:'' }}"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Meta Title Description
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="metadescription" data-required="1" class="form-control" placeholder="Enter Meta Title Description" value="{{ !empty($data['row']->metadescription)?$data['row']->metadescription:'' }}"> 
                        </div>
                        @if(isset($data['row']))
	                      <div class="col-sm-3">
	                            <label>Logo</label>
	                            <input type="file" class="form-control" name="logo">
	                      </div>
	                        @if ($data['row']->logo)
	                          <div class="col-sm-3">
	                            <label>Existance Logo</label>
	                            <img src="{{  asset('images/site_profile/'.$data['row']->logo) }}" height="100" width="80">
	                            </div>
	                        @else
	                             <div class="col-sm-3">
	                              <span>No image Found</span>
	                            </div>
		                        </div>
		                        @endif
		                    @else
	                        <div class="col-sm-3">
	                            <label>Logo</label>
	                              <input type="file" class="form-control" name="logo">
	                              @if($errors->has('logo'))
	                                <span class="help-block error">
	                                    <strong>{{ $errors->first('logo') }}</strong>
	                                </span>
	                              @endif
	                        </div>
	                    @endif
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection