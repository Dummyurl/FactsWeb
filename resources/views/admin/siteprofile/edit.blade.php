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
            <!-- BEGIN FORM-->
            <form action="#" id="form_sample_1" class="form-horizontal" method="post" novalidate="novalidate">
                <div class="form-body">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group">
                        <div class="col-md-3">
	                        <label class="control-label">Site Name 
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="sitename" data-required="1" class="form-control" placeholder="Enter Site Name"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Site Slogan
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="siteslogan" data-required="1" class="form-control"  placeholder="Enter Site Slogan"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Skip To Content
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="sikiptocontent" data-required="1" class="form-control"  placeholder="Enter Skip To Content"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Address Location
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="addressone" data-required="1" class="form-control"  placeholder="Enter Address Location"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Address Full Description
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="addresstwo" data-required="1" class="form-control" placeholder="Enter Address Full Description"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Mobile Number
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="mobileno" data-required="1" class="form-control"  placeholder="Enter Mobile Number"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Lane Line Number One
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="phoneone" data-required="1" class="form-control"  placeholder="Enter Lane Line Number One"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Lane Line Number Two
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="phonetwo" data-required="1" class="form-control"  placeholder="Enter Lane Line Number Two"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Copyright Text
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="copytext" data-required="1" class="form-control" placeholder="Enter Copyright Text"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Facebook Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="facebook" data-required="1" class="form-control"  placeholder="Enter Facebook Link"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Twitter Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="twitter" data-required="1" class="form-control"  placeholder="Enter Twitter Link"> 
	                    </div>
	                     <div class="col-md-3">
	                        <label class="control-label">Youtube Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="youtube" data-required="1" class="form-control"  placeholder="Enter Youtube Link"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Linkedin Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="linkedin" data-required="1" class="form-control" placeholder="Enter Linkedin Link"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Instagram Link
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="Link" data-required="1" class="form-control"  placeholder="Enter Instagram Link"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Site Owner Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="owner" data-required="1" class="form-control"  placeholder="Enter Site Owner Name"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Meta Title Seo
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="metatitle" data-required="1" class="form-control"  placeholder="Enter Meta Title Seo"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Meta Title Description
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="metadescription" data-required="1" class="form-control" placeholder="Enter Meta Title Description"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Site Logo
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
                        </div>
                        <!-- <div class="col-md-3">
	                        <label class="control-label">Email
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Email
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
	                       	 <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
	                    </div> -->
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