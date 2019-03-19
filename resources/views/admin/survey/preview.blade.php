@if($data['row']['question_type'] == 'radio')
<div class="form-group">
    <div class="col-md-3">
        <label class="control-label">Question  
            <span class="required" aria-required="true"> * </span>
        </label>
        {{ $data['row']['question'] }}
    </div>
    <div class="col-sm-3">
        <label>Question {{ $data['row']['question_type'] }}</label>
         @if($data['row'])  
                @foreach($data['row']['rdiooprtion'] as $key => $rb)
            <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                <label class="mt-radio">
                    <input type="radio">{{ $rb }}
                    <span></span> 
                </label>
            </div>
        @endforeach
            @endif  
    </div>
</div>
@endif
@if($data['row']['question_type'] == 'checkbox')
<div class="form-group">
    <div class="col-md-3">
        <label class="control-label">Question  
            <span class="required" aria-required="true"> * </span>
        </label>
        {{ $data['row']['question'] }}
    </div>
    <div class="col-sm-3">
        @if($data['row'])  
            @foreach($data['row']['checkboxoption'] as $key => $chk)
            <div class="mt-checkbox-list">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox">{{ $chk }}
                    <span></span>
                </label>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endif
@if($data['row']['question_type'] == 'star_rating')
<div class="form-group">
    <div class="col-md-3">
        <label class="control-label">Question  
            <span class="required" aria-required="true"> * </span>
        </label>
        {{ $data['row']['question'] }}
    </div>
    <div class="col-sm-3">
        <label>Star Rating</label>
        @if($data['row'])  
            <select class="form-control optionType" id="optionType" name="question_type">
                <option selected="selected" value="">---Rating---</option>
                  {{ $nomb = $data['row']['starrating'] }}
                   @for ($i =1; $i <= $nomb; $i++)
                     <option value="{{ $i }}">{{ $i }} Star</option>
                  @endfor 
            </select>
        @endif
    </div>
</div>
@endif
@if($data['row']['question_type'] == 'dropdown')
<div class="form-group">
    <div class="col-md-3">
        <label class="control-label">Question  
            <span class="required" aria-required="true"> * </span>
        </label>
        {{ $data['row']['question'] }}
    </div>
    <div class="col-sm-3">
        <label>Question {{ $data['row']['question_type'] }}</label>
        <select class="form-control optionType" id="optionType" name="question_type">
            <option selected="selected" value="">---Select Question Type---</option>
            @if($data['row'])  
                @foreach($data['row']['dropdownoption'] as $key => $rb)
                <option value="">{{ $rb }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
@endif