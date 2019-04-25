@extends('admin.layout.master')
@section('content')
  <div class="portlet light portlet-fit portlet-form bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">FACTS CATEGORY ADD</span>
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
     <form action="{{ route('admin.facts.storecat')}}" method="POST" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
        @csrf
            <div class="form-body">
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
@endsection



