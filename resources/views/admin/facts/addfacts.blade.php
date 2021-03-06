@extends('admin.layout.master')
@section('content')
	<div class="portlet light portlet-fit portlet-form bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">FACTS ADD</span>
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
        <style type="text/css">
        	.error {
			    color: red;
			}
        </style>
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.facts.store')}}" method="POST" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
            @csrf
                <div class="form-body">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-'success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group">
                        <div class="col-md-3">
	                        <label class="control-label">Facts Title 
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="title" data-required="1" class="form-control" placeholder="Enter Facts Name" value="{{ !empty($data['row']->title)?$data['row']['title']:'' }}"> 
                            @if($errors->has('title'))
                                <span class="help-block ">
                                    <strong class="error">{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        @if($data['category'])
                        <div class="col-sm-3">
                            <label>Facts Category</label>
                            <select class="form-control" name="category_id" >
                              <option selected="selected" value="">---Select Facts Category---</option>
                              @foreach($data['category'] as $key=>$cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        @endif
                        <div class="col-md-3">
	                        <label class="control-label">Facts Short Description
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="shortdesc" class="form-control" placeholder="Enter Facts Short Description" value="{{ !empty($data['row']->shortdesc)?$data['row']->shortdesc:'' }}"> 
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Facts Full Description
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Facts Full Description" value="{{ !empty($data['row']->description)?$data['row']->description:'' }}"> 
                        </div>
                        <div class="col-md-3">
	                        <label class="control-label">Facts Order
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="order" class="form-control" placeholder="Enter Facts Order" value="{{ !empty($data['row']->order)?$data['row']->order:'' }}"> 
                        </div>
                        @if(isset($data['row']))
	                        <div class="col-sm-3">
	                            <label>Facts Image</label>
	                            <input type="file" class="form-control" name="image">
	                        </div>
	                        @if ($data['row']->image)
	                          <div class="col-sm-3">
	                            <label>Previous Facts Image</label>
	                            <img src="{{  asset('images/facts/'.$data['row']->image) }}" height="100" width="80">
	                            </div>
	                        @else
	                             <div class="col-sm-3">
	                              <span>No image Found</span>
	                            </div>
		                        </div>
		                        @endif
		                    @else
	                        <div class="col-sm-3">
	                            <label>Facts Image</label>
	                              <input type="file" class="form-control" name="image">
	                              @if($errors->has('image'))
	                                <span class="help-block error">
	                                    <strong class="error">{{ $errors->first('image') }}</strong>
	                                </span>
	                              @endif
	                        </div>
	                    @endif
                        <div class="col-md-3">
                              <label class="control-label">Public Date</label>
                            <input name="public_date" data-provide="datepicker" class="form-control input-medium date-picker" type="text" value="{{ !empty($data['row']->description)?$data['row']->description:'' }}">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green"> @if(isset($data['row'])) Update @else Submit @endif</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
<script type="text/javascript">
    $(document).off('.datepicker.data-api');
</script>

@endsection
@section('js')
    <script src="{{ asset('admin-panel/assets//plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
@endsection


