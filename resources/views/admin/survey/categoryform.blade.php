<form id="CategoryForm" action="{{ route('admin.survey.categorystore')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
    <div class="form-body">
        <div class="form-group">
            <div class="col-md-6">
                <label class="control-label">Survey Company Name 
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input type="text" name="title" data-required="1" class="form-control" id="titleCompany" placeholder="Enter Survey Company Name" value="{{ !empty($data['row']->title)?$data['row']['title']:'' }}"> 
            </div>
            <div class="col-sm-6">
                <label>Company Image</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label class="control-label">Company Short Description 
                    <span class="required" aria-required="true"> * </span>
                </label>
                <textarea class="form-control" rows="3" name="shortdesc" placeholder="Company Short Description"></textarea>
            </div>
            <div class="col-md-6">
                <label class="control-label">Company Instruction 
                    <span class="required" aria-required="true"> * </span>
                </label>
                <textarea class="form-control" rows="3" name="description" placeholder="Survey Instruction"></textarea>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <div id="GlobalModalFormMessage"></div>
                <button class="btn green submitCompany">Save</button>
            </div>
        </div>
    </div>

</form>