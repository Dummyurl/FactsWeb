<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Surveyoption;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Publicpoll\AddFromValidation;

//use App\Http\Requests\Slider\EditCategoryFormValidation;

class SurveyController extends Controller
{ 
	public function index()
	{  
        $data =[];
        $data['rows'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device')->get();
        //dd($data['rows']);
		return view('admin.survey.index',compact('data'));
	}
	public function add()
	{
        $data =[];
        $data['category'] =Survey::select('id','question')->get();
        //dd($data['category']);
		return view('admin.survey.addsurvey',compact('data'));
	}
    public function editsurvey(Request $request,$id)
    {
    	$data= [];
    	$data['row'] = Survey::where('id',$id)->first();
        //$data['qnoptions'] =Surveyoption::select('id','question','question_id')->get();
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
            'createdby'=>$user->id,
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
}