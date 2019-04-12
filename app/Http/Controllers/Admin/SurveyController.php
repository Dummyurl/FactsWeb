<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Surveyoption;
use App\Models\SurveyCompany;
use App\Models\SurveyForms;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Publicpoll\AddFromValidation;
use View;
//use App\Http\Requests\Slider\EditCategoryFormValidation;

class SurveyController extends Controller
{ 
	public function index()
	{  
        $data =[];
        //$data['rows'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device')->get();
        //dd($data['rows']);
        //$data['rows'] =SurveyForms::select('id','question','status','createdby','question_id','survey_id','question_type')->get();
        $data['rows'] =SurveyCompany::select('id','title','slug','shortdesc','image','description')->get();
        //dd($data['rows']);
		return view('admin.survey.index',compact('data'));
	}

	public function add()
	{
        $data =[];
        $data['category'] =Survey::select('id','question')->get();
        $data['company'] =SurveyCompany::select('id','title')->get();
        //dd($data['category']);
		return view('admin.survey.addsurvey',compact('data'));
	}

    public function editsurvey(Request $request,$id)
    {
    	$data= [];
    	$data['row'] = Survey::where('id',$id)->first();
        $data['company'] =SurveyCompany::select('id','title')->get();
        $data['qnoptions'] =Surveyoption::select('id','question','question_id')->where('question_id',$id)->get();
        //dd($data['qnoptions']);
        $data['optionstype'] = array(
                                "checkbox","radio","star_rating","dropdown"
                                );
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request.');
    		return redirect()->route('admin.survey.add');
    	}
    	return view('admin.survey.editsurvey',compact('data'));
    }

    public function update(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = Survey::where('id',$id)->first();
        //dd($data['row']);
        $user = auth()->user();
        $data['row'] = Survey::where('id', $id)->update(array( 
            'question'=>$request->get('question'),
            'day_poll'=>$request->get('status'),
            'poll_date'=>$request->get('poll_date'),
            'question_type'=>$request->get('question_type'),
            'status'=>$request->get('status'),
            'amount'=>$request->get('amount'),
            'createdby'=>$user->id,
            'survey_id'=>$request->get('survey_id'),
            'srvey_start_date'=>$request->get('srvey_start_date'),
            'srvey_end_date'=>$request->get('srvey_end_date'),
            'visitor'=>'192.68.1.1',//$this->getIp(), 
            'device'=>'df:sd:6y:y6:fd'));
        $data['qnoptions'] =Surveyoption::select('id')->where('question_id',$id)->get();
        //dd($data['qnoptions']);
        
        $questiontype = $request->get('question_type');
        if($questiontype == "checkbox")
        {   
            
            $chkopt = $request->request->get('checkboxoptionnew');
            if(!empty($chkopt))
            {
                $check = $request->request->get('checkboxoptionnew');//$request->get('newcheckbox');
                //dd($check);
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    Surveyoption::Create(
                            array(
                                    'question_id' => $id ,
                                    'question' => $input['checkboxoptionnew'][$key],
                            ));
                }
                $check = $request->request->get('checkboxoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnid'][$key],
                            'question' => $input['checkboxoption'][$key],
                        );
                    Surveyoption::where('id','=',$input['qnid'][$key])->update($farray);
                }  
            }else{
                $check = $request->request->get('checkboxoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnid'][$key],
                            'question' => $input['checkboxoption'][$key],
                        );
                    Surveyoption::where('id','=',$input['qnid'][$key])->update($farray);
                }  
            }
        }
        if($questiontype == "dropdown")
        {   
            $chkopt = $request->request->get('dropdownoptionnew');
            if(!empty($chkopt))
            {
                $check = $request->request->get('dropdownoptionnew');//$request->get('newcheckbox');
                //dd($check);
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    Surveyoption::Create(
                            array(
                                    'question_id' => $id ,
                                    'question' => $input['dropdownoptionnew'][$key],
                            ));
                }
                $check = $request->request->get('dropdownoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnidrop'][$key],
                            'question' => $input['dropdownoption'][$key],
                        );
                    Surveyoption::where('id','=',$input['qnidrop'][$key])->update($farray);
                }  
            }else{
                $check = $request->request->get('dropdownoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnidrop'][$key],
                            'question' => $input['dropdownoption'][$key],
                        );
                    Surveyoption::where('id','=',$input['qnidrop'][$key])->update($farray);
                }  
            }
        }
        if($questiontype == "radio")
        {
            $rdion = $request->request->get('rdiooprtionnew');
            if(!empty($rdion))
            {
                $rdion = $request->request->get('rdiooprtionnew');
                $input = $request->all();
                foreach ($rdion as $key => $chk) {
                    Surveyoption::Create(
                            array(
                                    'question_id' => $id ,
                                    'question' => $input['rdiooprtionnew'][$key],
                            ));
                }
                $checkrdo = $request->request->get('rdiooprtion');
                $inputrdo = $request->all();
                foreach ($checkrdo as $krd => $chk) {
                    $radioarray[] = array(
                            'question_id' => $id,
                            'question' => $inputrdo['rdiooprtion'][$krd],
                        );
                    Surveyoption::where('id','=',$inputrdo['qnidradio'][$krd])->update(array(
                            'question_id' => $id,
                            'question' => $inputrdo['rdiooprtion'][$krd],
                        ))   ;
                }  
            }else{
                $checkrdo = $request->request->get('rdiooprtion');
                $inputrdo = $request->all();
                foreach ($checkrdo as $krd => $chk) {
                    $radioarray[] = array(
                            'question_id' => $id,
                            'question' => $inputrdo['rdiooprtion'][$krd],
                        );
                    Surveyoption::where('id','=',$inputrdo['qnidradio'][$krd])->update(array(
                            'question_id' => $id,
                            'question' => $inputrdo['rdiooprtion'][$krd],
                        ))   ;
                }
            }
        }
        if($questiontype == "star_rating")
        {
            $strating = $request->request->get('starrating');
            $starid =$request->request->get('staropt');
            Surveyoption::where('id','=',$starid)->update(array('question'=>$strating));
        }
    	$request->session()->flash('success_message', 'Public Poll Update Succcessfully');
    	return redirect()->route('admin.surveylist');
    }

    public function delete(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = Survey::where('id',$id)->first();

    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request');
    		return redirect()->route('admin.surveylist');
		}
		$data['row']->delete();
		$request->session()->flash('success_message', 'Public Poll Data Delete Succcessfully');
    	return redirect()->route('admin.surveylist');
    }

    public function preview(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data= [];
            $data['row']=$request->all();
            if(!empty($request->request->get('question_type'))) {
                $template = View::make('admin.survey.preview',compact('data'));
                $contents = (string) $template; 
            }else{
              $contents ="Post Data Not Found";  
            }
            print_r(json_encode(array('status'=>'success','template'=>$contents,'message'=>'Survey Preview Successfully')));
            exit;
        }else {
            print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
            exit;
        }
    }

    public function storesurvey(AddFromValidation $request)
    {
        $user = auth()->user();
        Survey::insert(array( //no of forms
            'question'=>"one",//$request->get('question'),
            'day_poll'=>$request->get('status'),
            'poll_date'=>$request->get('poll_date'),
            'question_type'=>"zero",//$request->get('question_type'),
            'status'=>$request->get('status'),
            'createdby'=>$user->id,
            'amount'=>$request->get('amount'),
            'survey_id'=>$request->get('survey_id'),
            'srvey_start_date'=>$request->get('srvey_start_date'),
            'srvey_end_date'=>$request->get('srvey_end_date'),
            'visitor'=>'192.68.1.1',//$this->getIp(), 
            'device'=>'df:sd:6y:y6:fd'));
        $insertedid = DB::getPdo()->lastInsertId();
        if($insertedid)
        {
            $question =  $request->get('question');
            $input = $request->all();
            //dd($question);
            foreach ($question as $kdk => $q) {
                SurveyForms::Create( array(
                        "question"=>$input['question'][$kdk],
                        "status"=>$request->get('status'),
                        "createdby"=>$user->id,
                        "question_id"=>$request->get('survey_id'),
                        "survey_id"=>$insertedid,
                        "question_type"=>$request->get('$kdk+1.'.'question_type'),
                     //'question' =>
                    //dd($d);
                    ));
                $questionid = DB::getPdo()->lastInsertId();
                $questiontype =  $request->get('question_type');
                if($questiontype == "checkbox")
                {
                    $check = $request->request->get('checkboxoption');
                    //dd($request->all());
                    foreach ($check as $key => $chk) {
                        Surveyoption::Create(
                            array(
                                    'question_id' => $questionid ,
                                    'question' => $input['checkboxoption'][$key],
                            ));
                    }
               }
               if($questiontype == "radio")
               {
                    $checkbox = $request->request->get('rdiooprtion');
                    foreach ($checkbox as $kr => $rdo) {
                        Surveyoption::Create(
                            array(
                                    'question_id' => $questionid ,
                                    'question' => $input['rdiooprtion'][$kr],
                            ));
                    }
               }
               if($questiontype == "dropdown")
               {
                    $dropdownopt = $request->request->get('dropdownoption');
                    foreach ($dropdownopt as $km => $drop) {
                        Surveyoption::Create(
                            array(
                                    'question_id' => $questionid ,
                                    'question' => $input['dropdownoption'][$km],
                            ));
                    }
                }
                if($questiontype == "star_rating")
                {
                    $staropt = $request->request->get('starrating');
                    Surveyoption::Create(
                        array(
                                'question_id' => $questionid,
                                'question' =>$staropt,
                        ));
                }
            }
        }
        $request->session()->flash('success_message', 'Survey added Successfully.');
        return redirect()->route('admin.surveylist');
    }
    public function surveyer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['surveyer'] =SurveyCompany::select('id','title')->get();

            if($data['surveyer'])
            {
                echo json_encode($data['surveyer']);
            }else{
                echo json_encode("No Company Found !!");
            }
        }else {
            print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
            exit;
        }
    }
    public function categoryform(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $template = View::make('admin.survey.categoryform',compact('data'));
            $contents = (string) $template; 
            print_r(json_encode(array('status'=>'success','template'=>$contents,'message'=>'Survey Preview Successfully')));
            exit;
        }else {
            print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
            exit;
        }
    }
    public function categorystore(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $template = View::make('admin.survey.categoryform',compact('data'));
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
                $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts',$image_name);
                $imagefinalname = url('/').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$image_name;
            }
            $request->request->add([
                    'slug' => str_slug($request->get('title')),
                    'shortdesc' => $request->get('shortdesc'),
                    'image' => $imagefinalname,
                    'description'=>$request->get('description')
                ]);
            //dd($request->request->all());
            $trans = SurveyCompany::create($request->request->all());
                $request->request->add([
                    'slug' => str_slug($request->get('title')),
                    'shortdesc' => $request->get('shortdesc'),
                    'image' => $imagefinalname,
                    'description'=>$request->get('description')
                ]);
            if($trans) 
            {
                print_r(json_encode(array('status'=>'success','message'=>'Company  Created Successfully')));
                exit;
            }else{
                print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
                exit;
            }
           
        }else {
            print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
            exit;
        }
    }
}

