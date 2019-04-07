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
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
  <style type="text/css">
        
      .page {
        margin: 1em auto;
        max-width: 768px;
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        height: 100%;
      }

      .box {
        padding: 0.5em;
        width: 100%;
        margin:0.5em;
      }

      .box-2 {
        padding: 0.5em;
        width: calc(100%/2 - 1em);
      }

      .options label,
      .options input{
        width:7em;
        padding:0.5em 1em;
      }
      .btn{
        background:white;
        color:black;
        border:1px solid black;
        padding: 0.5em 1em;
        text-decoration:none;
        margin:0.8em 0.3em;
        display:inline-block;
        cursor:pointer;
      }

      .hide {
        display: none;
      }

      img {
        max-width: 100%;
      }

  </style>
      <main class="page">
        <h2>Upload ,Crop and save.</h2>
        <!-- input file -->
        <div class="box">
          <input type="file" id="file-input">
        </div>
        <!-- leftbox -->
        <div class="box-2">
          <div class="result"></div>
        </div>
        <!--rightbox-->
        <div class="box-2 img-result hide">
          <!-- result of crop -->
          <img class="cropped" src="" alt="">
        </div>
        <!-- input file -->
        <div class="box">
          <div class="options hide">
            <label> Width</label>
            <input type="number" class="img-w" value="300" min="100" max="1200" />
          </div>
          <!-- save btn -->
          <button class="btn save hide">Save</button>
          <!-- download btn -->
          <a href="" class="btn download hide">Download</a>
        </div>
      </main>
      <script type="text/javascript">
                  // vars
          let result = document.querySelector('.result'),
          img_result = document.querySelector('.img-result'),
          img_w = document.querySelector('.img-w'),
          img_h = document.querySelector('.img-h'),
          options = document.querySelector('.options'),
          save = document.querySelector('.save'),
          cropped = document.querySelector('.cropped'),
          dwn = document.querySelector('.download'),
          upload = document.querySelector('#file-input'),
          cropper = '';

          // on change show image with crop options
          upload.addEventListener('change', (e) => {
            if (e.target.files.length) {
              // start file reader
              const reader = new FileReader();
              reader.onload = (e)=> {
                if(e.target.result){
                  // create new image
                  let img = document.createElement('img');
                  img.id = 'image';
                  img.src = e.target.result
                  // clean result before
                  result.innerHTML = '';
                  // append new image
                  result.appendChild(img);
                  // show save btn and options
                  save.classList.remove('hide');
                  options.classList.remove('hide');
                  // init cropper
                  cropper = new Cropper(img);
                }
              };
              reader.readAsDataURL(e.target.files[0]);
            }
          });

          // save on click
          save.addEventListener('click',(e)=>{
            e.preventDefault();
            // get result to data uri
            let imgSrc = cropper.getCroppedCanvas({
              width: img_w.value // input value
            }).toDataURL();
            // remove hide class of img
            cropped.classList.remove('hide');
            img_result.classList.remove('hide');
            // show image cropped
            cropped.src = imgSrc;
            dwn.classList.remove('hide');
            dwn.download = 'imagename.png';
            dwn.setAttribute('href',imgSrc);
          });
      </script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js"></script>
@endsection



