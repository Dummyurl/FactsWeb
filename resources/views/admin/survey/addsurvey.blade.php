@extends('admin.layout.master')
@section('content')
	<div class="portlet light portlet-fit portlet-form bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">SURVEY</span>
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
            <form id="surveyForm" action="{{ route('admin.survey.storesurvey')}}" method="post" class="form-horizontal">
            @csrf
                <div class="form-body">
                    <div class="form-group">
                        <div class="col-md-3">
	                        <label class="control-label">Question 
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="question" data-required="1" class="form-control" placeholder="Enter Question" value="{{ !empty($data['row']->question)?$data['row']['question']:'' }}"> 
                            @if($errors->has('question'))
                                <span class="help-block ">
                                    <strong class="error">{{ $errors->first('question') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Public Date</label>
                            <input name="poll_date" data-provide="datepicker" class="form-control date-picker" type="text" value="{{ !empty($data['row']->poll_date)?$data['row']->poll_date:'' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Do You Want To Publish ?</label>
                            <div class="mt-checkbox-inline mt-radio-list" data-error-container="#form_2_membership_error">
                                <label class="mt-radio">
                                    <input type="radio" name="status" value="1"> Yes
                                    <span></span>
                                </label>
                                <label class="mt-radio">
                                    <input type="radio" name="status" value="0"> No
                                    <span></span>
                                </label>
                            </div>
                            <div id="form_2_membership_error"> </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Question Type</label>
                            <select class="form-control optionType" id="optionType" name="question_type" >
                              <option selected="selected" value="">---Select Question Type---</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio</option>
                                <option value="star_rating">Star Rating</option>
                                <option value="dropdown">Dropdown</option>
                            </select>
                            @if($errors->has('question_type'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('question_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="addOptionRow"></div>
                    <div class="form-group" id="radioOptionNew" style="display: none">
                        <div class="col-md-3">
                            <label>Question Type Radio</label>
                            <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                <label class="mt-radio">
                                    <input type="radio">
                                    <span></span> 
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Please Enter Otption 
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption " > 
                        </div>
                        <div class="col-md-3">
                            <br><button  class="btn btn-info" id="addOptionsMore" type="button">+</button>
                            <label class="control-label">Click Plus Option To Add Another option</label>
                        </div>
                    </div>
                    <div class="addCheckOptionRow"></div>
                    <div class="form-group" id="checkOptionsNew" style="display: none">
                        <div class="col-md-3">
                            <label>Question Type Check Box</label>
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox"> To Add New  Checkbox
                                    <span></span>
                                </label>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <label class="control-label">Please Enter Otption 
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="checkboxoption[]" class="form-control" placeholder="Enter Please Enter Otption"> 
                        </div>
                        <div class="col-md-3">
                            <br><button  class="btn btn-info" id="addCheckOption" type="button">+</button>
                            <label class="control-label">Click Plus Option To Add Another option</label>
                        </div>
                    </div>
                    <div class="addDropdownOptionRow"></div>
                    <div class="form-group" id="dropDownNew" style="display: none">
                        <div class="col-md-3">
                            <label>Question Type Dropdown</label>
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <select class="form-control">
                                        <option>Select</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Please Enter Dropdown Otption 
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="dropdownoption[]" class="form-control" placeholder="Enter Please Enter Dropdown Otption"> 
                        </div>
                        <div class="col-md-3">
                            <br><button  class="btn btn-info" id="addDropdownOption" type="button">+</button>
                            <label class="control-label">Click Plus Option To Add Another Dropdown option</label>
                        </div>
                    </div>
                    <div class="form-group" id="starRating" style="display: none">
                        <div class="col-md-3">
                            <label class="control-label">Please Enter Range Of Star 
                            <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="starrating" class="form-control" placeholder="Enter Range Of Star Eg. 1-6 "> 
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
            <div id="previewSurvey"></div>
            <div id="previewSurveyButton" style="display: none">
                <form method="post">
                    <div class="row">
                        @csrf
                         <div class="col-md-3 col-md-9">
                            <button type="submit" class="btn green btn-submit typeCheckSurvey">Preview Survey</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- <script type="text/javascript">
    $(document).off('.datepicker.data-api');
</script> -->

@endsection
@section('js')
    <script>
        $(document).off('click','#addOptionsMore');
        $(document).on('click','#addOptionsMore', function(){ 
            $(".addOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addOptionRow .btnminus').length+1;
            $('.addOptionRow').append('<div class="form-group"> <div class="col-md-3"> <label>Question Type Radio</label> <div class="mt-radio-list" data-error-container="#form_2_membership_error"> <label class="mt-radio"> <input type="radio"><span></span> </label> </div></div><div class="col-md-6"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input id="radio_option'+count+'" type="text" name="rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption"> </div><div class="col-md-3"> <br><button class="btn btn-danger btnminus" type="button">x</button> <label class="control-label">Click Plus Option To Add Another option</label></div></div>');

        });
        $(document).off('click','#addCheckOption');
        $(document).on('click','#addCheckOption', function(){ 
            $(".addCheckOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addCheckOptionRow .btnminus').length+1;
            $('.addCheckOptionRow').append('<div class="form-group"> <div class="col-md-3"> <label>Question Type Check Box</label> <div class="mt-checkbox-list"> <label class="mt-checkbox mt-checkbox-outline"> <input type="checkbox"> To Add New Checkbox <span></span> </label> </div></div><div class="col-md-6"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input id="check'+count+'" type="text" name="checkboxoption[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-3"> <br><button class="btn btn-danger btnminus " type="button">x</button> <label class="control-label">Click Plus Option To Add Another option</label></div></div>');

        });
        $(document).off('click','#addDropdownOption');
        $(document).on('click','#addDropdownOption', function(){ 
            $(".addDropdownOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addDropdownOptionRow .btnminus').length+1;
            $('.addDropdownOptionRow').append('<div class="form-group" id="dropDownNew"><div class="col-md-3"> <label>Question Type Dropdown</label><div class="mt-checkbox-list"> <label class="mt-checkbox mt-checkbox-outline"> <select class="form-control"><option>Select</option> </select> </label></div></div><div class="col-md-6"> <label class="control-label">Please Enter Dropdown Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="dropdownoption[]" class="form-control" placeholder="Enter Please Enter Dropdown Otption"></div><div class="col-md-3"><br><button class="btn btn-danger btnminus" type="button">x</button> <label class="control-label">Click Plus Option To Add Another option</label></div></div>');

        });
        $(document).on('change','.optionType',function(){
            var type = $('#optionType').val();
            if(type == 'radio')
            {
                $('#radioOptionNew').show();
                $('.typeCheckSurvey').attr('id', type);
               
            }else{
                $('#radioOptionNew').hide();
            }
            if(type == 'checkbox')
            {
                $('.typeCheckSurvey').attr('id', type);
                $('#checkOptionsNew').show();
            }else{
                $('#checkOptionsNew').hide();
            }
            if(type == 'dropdown')
            {
                $('.typeCheckSurvey').attr('id', type);
                $('#dropDownNew').show();
            }else{
                $('#dropDownNew').hide();
            }
            if(type == 'star_rating')
            {
                
                $('.typeCheckSurvey').attr('id', type);
                $('#starRating').show();
            }else{
                
                $('#starRating').hide();
            }
            if(type == 'radio' || type == 'star_rating' || type == 'dropdown' || type == 'checkbox')
            {
                $('#previewSurveyButton').show();
            }else{
               $('#previewSurveyButton').hide(); 
            }
        });
    </script>
    <script type="text/javascript">
        $(".btn-submit").click(function(e){
            e.preventDefault();
            
            var APP_URL = {!! json_encode(url('/')) !!};
            var urlpost = APP_URL+'/admin/survey/preview';
            var optiontype = $(this).attr('id');
            var token =  $("input[name=_token]").val();
            var CSRF_TOKEN =  $("input[name=_token]").val();  
            $.ajax({
               type:'POST',
               url:urlpost,
               dataType: 'html',
               //data:{optiontype:optiontype,_token:CSRF_TOKEN},
               data:$('form#surveyForm').serialize(),
                beforeSend: function(){
                    $('#previewSurvey').html();
                },
                success:function(jsons){
                    console.log(jsons);
                    data = jQuery.parseJSON(jsons);  
                    console.log(data.template); 
                    if(data.status=='success')
                    {
                        $('#previewSurvey').html(data.template);
                    }
                }
            });
        });
</script>
    <script src="{{ asset('admin-panel/assets//plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
