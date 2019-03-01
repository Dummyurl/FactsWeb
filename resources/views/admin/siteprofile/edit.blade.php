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
            <form action="#" id="form_sample_1" class="form-horizontal" novalidate="novalidate">
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
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control" placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
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
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control" placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
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
	                    </div>
	                    <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control" placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Name
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="name" data-required="1" class="form-control"  placeholder="Enter"> 
                        </div>
                        <div class="col-md-3">
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
	                    </div>
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