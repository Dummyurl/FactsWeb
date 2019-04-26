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
                        <div class="col-sm-3">
                            <label>Question Type</label>
                            <select class="form-control optionType" name="survey_id" data- id="optionManu">
                                <option selected="selected" value="">---Select Survey For---</option>
                                @foreach($data['company'] as $key=>$cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('survey_id'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('survey_id') }}</strong>
                                </span>
                            @endif
                        </div></br>
                        <div class="col-md-1">
                            <a href="javascript:void(0)" class="btn btn-info btnRefreshEmployer" id="btnRefreshEmployer" type="fa fa-refresh"><i class="fa fa-refresh"></i></a>
                            <a href="javascript:void(0)" class="btn btn-info" id="globlModalClick">+</a>
                        </div>
                        <div class="col-md-2">
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
                        <div class="col-md-2">
                            <label class="control-label">Survey Start From</label>
                            <input name="srvey_start_date" data-provide="datepicker" class="form-control date-picker" type="text" value="{{ !empty($data['row']->srvey_start_date)?$data['row']->srvey_start_date:'' }}" placeholder="Enter Survey Start Date">
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Survey End Date</label>
                            <input name="srvey_end_date" data-provide="datepicker" class="form-control date-picker" type="text" value="{{ !empty($data['row']->srvey_end_date)?$data['row']->srvey_end_date:'' }}" placeholder="Enter Survey End Date">
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Publish Date</label>
                            <input name="poll_date" data-provide="datepicker" class="form-control date-picker" type="text" value="{{ !empty($data['row']->poll_date)?$data['row']->poll_date:'' }}" placeholder="Enter Publish Date">
                        </div>
                        <div class="col-md-9">
                            <label>Survey About</label>
                            <textarea name="survey_about" class="form-control" rows="4" placeholder="Enter Survey About"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Survey Amount</label>
                            <input name="amount"  class="form-control" type="text" value="{{ !empty($data['row']->amount)?$data['row']->amount:'' }}" placeholder="If Fee Enter Zero">
                        </div>
                    </div>
                    <style type="text/css">
                      body {
                          color: #6a6c6f;
                          background-color: #f1f3f6;
                          margin-top: 30px;
                        }

                        .container {
                          max-width: 960px;
                        }

                        .panel-default>.panel-heading {
                          color: #333;
                          background-color: #fff;
                          border-color: #e4e5e7;
                          padding: 0;
                          -webkit-user-select: none;
                          -moz-user-select: none;
                          -ms-user-select: none;
                          user-select: none;
                        }

                        .panel-default>.panel-heading a {
                          display: block;
                          padding: 10px 15px;
                        }

                        .panel-default>.panel-heading a:after {
                          content: "";
                          position: relative;
                          top: 1px;
                          display: inline-block;
                          font-family: 'Glyphicons Halflings';
                          font-style: normal;
                          font-weight: 400;
                          line-height: 1;
                          -webkit-font-smoothing: antialiased;
                          -moz-osx-font-smoothing: grayscale;
                          float: right;
                          transition: transform .25s linear;
                          -webkit-transition: -webkit-transform .25s linear;
                        }

                        .panel-default>.panel-heading a[aria-expanded="true"] {
                          background-color: #eee;
                        }

                        .panel-default>.panel-heading a[aria-expanded="true"]:after {
                          content: "\2212";
                          -webkit-transform: rotate(180deg);
                          transform: rotate(180deg);
                        }

                        .panel-default>.panel-heading a[aria-expanded="false"]:after {
                          content: "\002b";
                          -webkit-transform: rotate(90deg);
                          transform: rotate(90deg);
                        }

                        .accordion-option {
                          width: 100%;
                          float: left;
                          clear: both;
                          margin: 15px 0;
                        }

                        .accordion-option .title {
                          font-size: 20px;
                          font-weight: bold;
                          float: left;
                          padding: 0;
                          margin: 0;
                        }

                        .accordion-option .toggle-accordion {
                          float: right;
                          font-size: 16px;
                          color: #6a6c6f;
                        }

                        .accordion-option .toggle-accordion:before {
                          content: "Expand All";
                        }

                        .accordion-option .toggle-accordion.active:before {
                          content: "Collapse All";
                        }
                    </style>
                   <!--  <div class="container">
                      <div class="accordion-option">
                        <h3 class="title">Lorem Ipsum</h3>
                        <a href="javascript:void(0)" class="toggle-accordion active" accordion-id="#accordion"></a>
                      </div>
                      <div class="clearfix"></div>
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Collapsible Group Item #1
                            </a>
                          </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                              on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                              raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              Collapsible Group Item #2
                            </a>
                          </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                              on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                              raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                              Collapsible Group Item #3
                            </a>
                          </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                              on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                              raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-md-3">
	                        <label class="control-label">Question 
	                            <span class="required" aria-required="true"> * </span>
	                        </label>
                            <input type="text" name="question[]" data-required="1" class="form-control" placeholder="Enter Question" value="{{ !empty($data['row']->question)?$data['row']['question']:'' }}"> 
                            @if($errors->has('question'))
                                <span class="help-block ">
                                    <strong class="error">{{ $errors->first('question') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <label>Question Type</label>
                            <select class="form-control optionType optionShowClassa1" data-mid="1" id="optionType1" data-curid="a" name="question_type" >
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
                        <div class="col-md-1">
                            <br>
                            <a href="javascript:void(0)" class="btn btn-info" id="AddMoreQuestion">+</a>
                        </div>
                    </div>
                    <div class="addOptionRow"></div>
                    <div class="form-group" id="radioOptionNew" style="display: none">
                        <div class="col-md-3">
                            <label></label>
                            <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                              
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
                            <label class="control-label"></label>
                        </div>
                    </div>
                    <div class="addCheckOptionRow"></div>
                    <div class="form-group" id="checkOptionsNew" style="display: none">
                        <div class="col-md-3">
                            <label></label>
                            <div class="mt-checkbox-list">
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
                            <label class="control-label"></label>
                        </div>
                    </div>
                    <div class="addDropdownOptionRow"></div>
                    <div class="form-group" id="dropDownNew" style="display: none">
                        <div class="col-md-3">
                            <label></label>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Please Enter Dropdown Otption 
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <input type="text" name="dropdownoption[]" class="form-control" placeholder="Enter Please Enter Dropdown Otption"> 
                        </div>
                        <div class="col-md-3">
                            <br><button  class="btn btn-info" id="addDropdownOption" type="button">+</button>
                            <label class="control-label"></label>
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
                    <div class="addMoreQuestionWithOption"></div>
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
<div id="myModal" class="modal fade" role="dialog" aria-hidden="true" style="display: ; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" id="GlobalModalForm">
          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).off('click','#addOptionsMore');
        $(document).on('click','#addOptionsMore', function(){ 
            $(".addOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addOptionRow .btnminus').length+1;
            $('.addOptionRow').append('<div class="form-group"> <div class="col-md-3"> <label></label> <div class="mt-radio-list" data-error-container="#form_2_membership_error"> </div></div><div class="col-md-6"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input id="radio_option'+count+'" type="text" name="rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption"> </div><div class="col-md-3"> <br><button class="btn btn-danger btnminus" type="button">x</button> <label class="control-label"></label></div></div>');

        });
        $(document).off('click','#addCheckOption');
        $(document).on('click','#addCheckOption', function(){ 
            $(".addCheckOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addCheckOptionRow .btnminus').length+1;
            $('.addCheckOptionRow').append('<div class="form-group"> <div class="col-md-3"> <label></label></div><div class="col-md-6"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input id="check'+count+'" type="text" name="checkboxoption[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-3"> <br><button class="btn btn-danger btnminus " type="button">x</button> <label class="control-label"></label></div></div>');

        });
        $(document).off('click','#addDropdownOption');
        $(document).on('click','#addDropdownOption', function(){ 
            $(".addDropdownOptionRow").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addDropdownOptionRow .btnminus').length+1;
            $('.addDropdownOptionRow').append('<div class="form-group" id="dropDownNew"><div class="col-md-3"> <label></label><div class="mt-checkbox-list"></div></div><div class="col-md-6"> <label class="control-label">Please Enter Dropdown Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="dropdownoption[]" class="form-control" placeholder="Enter Please Enter Dropdown Otption"></div><div class="col-md-3"><br><button class="btn btn-danger btnminus" type="button">x</button> <label class="control-label"></label></div></div>');

        });
       
        $(document).off('click','#AddMoreQuestion');
        $(document).on('click','#AddMoreQuestion', function(){ 
            $(".addMoreQuestionWithOption").on('click','.btnminus',function(){
                $(this).closest('.form-group').remove();
            });
            var count = $('.addMoreQuestionWithOption .btnminus').length+2;
            //console.log(count);
            $('.addMoreQuestionWithOption').append('<div class="form-group newClass'+count+'" id="dropDownNew" ><div class="col-md-3"> <label class="control-label">Question <span class="required" aria-required="true"> * </span> </label> <input type="text" name="question[]" data-required="1" class="form-control" placeholder="Enter Question" value="{{!empty($data['row']->question)?$data['row']['question']:''}}"> @if($errors->has('question')) <span class="help-block "> <strong class="error">{{$errors->first('question')}}</strong> </span> @endif</div><div class="col-sm-3"> <label>Question Type</label> <select class="form-control optionType optionShowClassa'+count+'" data-mid="'+count+'" data-curid="a'+count+'" id="optionType'+count+'" name="'+count+'question_type" > <option selected="selected" value="">---Select Question Type---</option> <option value="checkbox">Checkbox</option> <option value="radio">Radio</option> <option value="star_rating">Star Rating</option> <option value="dropdown">Dropdown</option> </select> @if($errors->has('question_type')) <span class="help-block error"> <strong>{{$errors->first('question_type')}}</strong> </span> @endif</div><div class="col-md-1"> <br><a href="javascript:void(0)" class="btn btn-danger btnminus">x</a></div></div><div class="addMoreQuestionWithOption'+count+'"></div>');
        });
        $(document).on('change','.optionType',function(){
            var id = $(this).data('curid');
            var newaddedid = $(this).data('mid');
            var type = $('#optionType'+newaddedid).val();
            var option = $('#optionType'+id).val();
            var $wrapper = $('#radioOptionNew', this);
            //console.log(type);
            // $( ".optionShowClass"+id ).after(  '<div class="form-group" id="radioOptionNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-2"> <br><button class="btn btn-info addOptionsMoreNew" data-nid="'+id+'" id="addOptionsMoreNew" type="button">+</button> <label class="control-label"></label> </div></div>' );
            
            // $(".addOptionsMoreNew").on('click',function(){
            //     var countn = $(".optionShowClassa"+id).length+1;
            //     var neid = $(this).data('nid');
            //     $(".optionShowClass").on('click','.btnminus',function(){
            //         $(this).closest('.form-group').remove();
            //     });
            //     console.log(neid);
            //     $( ".optionShowClass"+neid ).after(  '<div class="form-group" id="radioOptionNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-2"> <br><button class="btn btn-danger btnminus addOptionsMoreNew" id="addOptionsMoreNew" type="button">x</button> <label class="control-label"></label> </div></div>' );
            // });
            if(type == 'radio')
            { 
                $('#radioOptionNew').show();
                $( ".optionShowClass"+id ).after(  '<div class="form-group" id="radioOptionNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-2"> <br><button class="btn btn-info addOptionsMoreNew" data-nid="'+id+'" id="addOptionsMoreNew" type="button">+</button> <label class="control-label"></label> </div></div>' );
                $(".addOptionsMoreNew").on('click',function(){
                    var countn = $(".optionShowClassa"+id).length+1;
                    var neid = $(this).data('nid');
                    $(".optionShowClass").on('click','.btnminus',function(){
                        $(this).closest('.form-group').remove();
                    });
                    //console.log(neid);
                    $( ".optionShowClass"+neid ).after( '<div class="form-group" id="radioOptionNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'rdiooprtion[]" class="form-control" placeholder="Enter Please Enter Otption "> </div><div class="col-md-2"> <br><button class="btn btn-danger btnminus addOptionsMoreNew" id="addOptionsMoreNew" type="button">x</button> <label class="control-label"></label> </div></div>' );
                });
                $('.typeCheckSurvey').attr('id', type);
               
            }else{
                $('#radioOptionNew').hide();
            }
            if(type == 'checkbox')
            {
                $('#checkOptionsNew').show();
                $( ".optionShowClass"+id ).after('<div class="form-group" id="checkOptionsNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'checkboxoption[]" class="form-control" placeholder="Enter Please Enter Otption"> </div><div class="col-md-2"> <br><button class="btn btn-info addCheckOptionMoreNew" id="addCheckOptionMoreNew" type="button" data-nid="'+id+'">+</button> <label class="control-label"></label> </div></div>');
                $(".addCheckOptionMoreNew").on('click',function(){
                    var countn = $(".optionShowClassa"+id).length+1;
                    var neid = $(this).data('nid');
                    $(".optionShowClass").on('click','.btnminus',function(){
                        $(this).closest('.form-group').remove();
                    });
                    console.log(neid);
                    $( ".optionShowClass"+neid ).after('<div class="form-group" id="checkOptionsNew"> <div class="col-md-10"> <label class="control-label">Please Enter Otption <span class="required" aria-required="true"> * </span> </label> <input type="text" name="'+id+'checkboxoption[]" class="form-control" placeholder="Enter Please Enter Otption"> </div><div class="col-md-2"> <br><button class="btn btn-danger btnminus addCheckOptionMoreNew" id="addCheckOption" type="button">x</button> <label class="control-label"></label> </div></div>' );
                });
                $('.typeCheckSurvey').attr('id', type);
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
        $(document).on('click','.submitCompany', function(){ 
            event.preventDefault();
            jQuery.noConflict();
            var formdata = new FormData($('form#CategoryForm')[0]);
            var APP_URL = {!! json_encode(url('/')) !!};
            var urlpost = APP_URL+'/admin/survey/categorystore';
            var token =  $("input[name=_token]").val();
            var CSRF_TOKEN =  $("input[name=_token]").val(); 
            var title =  $("input[name=title]").val();
            if(title.length == 0 || title =='')
            {
                $("#titleCompany").focus();
                return false;
            }
            $.ajax({
                type:'POST',
                url:urlpost,
                dataType: 'html',
                //data:$('form#CategoryForm').serialize(),
                data:formdata,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    
                },
                success:function(jsons){
                    console.log(jsons);
                    data = jQuery.parseJSON(jsons); 
                    console.log(data.template); 
                    if(data.status=='success')
                    {
                        $('#GlobalModalFormMessage').html(data.message);
                        setTimeout(function(){
                            $('#CategoryForm')[0].reset();
                            $('#myModal').modal('hide');
                        },2000);
                    }
                }
            });
        });
        //  $(document).off('click','#globlModalClick');
        $(document).on('click','#globlModalClick', function(){ 
            event.preventDefault();
            jQuery.noConflict();
            var APP_URL = {!! json_encode(url('/')) !!};
            var urlpost = APP_URL+'/admin/survey/category';
            var token =  $("input[name=_token]").val();
            var CSRF_TOKEN =  $("input[name=_token]").val(); 
            $('#myModal').modal('show');
            $.ajax({
               type:'POST',
               url:urlpost,
               dataType: 'html',
               data:$('form#surveyForm').serialize(),
                beforeSend: function(){
                    $('#GlobalModalForm').html();
                },
                success:function(jsons){
                    console.log(jsons);
                    data = jQuery.parseJSON(jsons);  
                    console.log(data.template); 
                    if(data.status=='success')
                    {
                        $('#GlobalModalForm').html(data.template);
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).off('click','.btnRefreshEmployer');
        $(document).on('click','.btnRefreshEmployer',function(e){
            e.preventDefault();
            var APP_URL = {!! json_encode(url('/')) !!}; 
            var action = APP_URL+'/admin/survey/survey_list';
            var token =  $("input[name=_token]").val();
            var CSRF_TOKEN =  $("input[name=_token]").val();  
            console.log(CSRF_TOKEN);
            $.ajax({
                type: "POST",
                url: action,
                dataType: 'json',
                data:$('form#surveyForm').serialize(),
                success: function(datas) 
                {
                    console.log(datas);
                    var opt='';
                        opt='<option value="">---Select Survey For---</option>';
                        $.each(datas,function(i,k)
                        {
                          opt += '<option value='+k.id+'>'+k.title+'</option>';
                        });
                    $('#optionManu').html(opt);
                }
            });
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
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection


