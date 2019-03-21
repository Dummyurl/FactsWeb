<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Polloption;
use App\Models\PublicPoll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image; //this is for image resizer
use App\Http\Requests\Publicpoll\AddFromValidation;

//use App\Http\Requests\Slider\EditCategoryFormValidation;

class PublicPollController extends Controller
{ 
	public function index()
	{  
        $data =[];
        $data['rows'] =PublicPoll::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device')->get();
        //dd($data['rows']);
		return view('admin.publicpoll.index',compact('data'));
	}
	public function add()
	{
        $data =[];
        $data['category'] =PublicPoll::select('id','question')->get();
        //dd($data['category']);
		return view('admin.publicpoll.addpblicpoll',compact('data'));
	}
	/**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response 
     */
    public function store(AddFromValidation $request)
    {
    	//dd($request->all());
        $thumbnailpath = public_path('images/facts/'.$image_name);
        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        //dd($imagefinalname);
        $user = auth()->user();
    	$request->request->add([
    			'slug' => str_slug($request->get('title')),
    			'shortdesc' => $request->get('shortdesc'),
    			'status' => $request->get('status') == 'active'?1:0,
    			'image' => $imagefinalname,
                'category_id'=>$request->get('category_id'),
                'public_date'=>$request->get('public_date'),
                'like'=>'1',
                'createdby'=>$user->id,
                'description'=>$request->get('description')
    		]);
    	//dd($request->request->all());
    	Facts::create($request->request->all());
    	$request->session()->flash('success_message', 'Facts added Successfully.');
    	return redirect()->route('admin.facts');
    }
    public function editpoll(Request $request,$id)
    {
    	$data= [];
    	$data['row'] = PublicPoll::where('id',$id)->first();
        //$data['qnoptions'] =Polloption::select('id','question','question_id')->get();
        $data['qnoptions'] =Polloption::select('id','question','question_id')->where('question_id',$id)->get();
        //dd($data['qnoptions']);
        $data['optionstype'] = array(
                                "checkbox","radio","star_rating","dropdown"
                                );
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request.');
    		return redirect()->route('admin.publicpoll.add');
    	}
    	return view('admin.publicpoll.editpublicpoll',compact('data'));
    }
    public function update(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = PublicPoll::where('id',$id)->first();
        //dd($data['row']);
        $user = auth()->user();
        $data['row'] = PublicPoll::where('id', $id)->update(array( 
            'question'=>$request->get('question'),
            'day_poll'=>$request->get('status'),
            'poll_date'=>$request->get('poll_date'),
            'question_type'=>$request->get('question_type'),
            'status'=>$request->get('status'),
            'createdby'=>$user->id,
            'visitor'=>'192.68.1.1',//$this->getIp(), 
            'device'=>'df:sd:6y:y6:fd'));
        $data['qnoptions'] =Polloption::select('id')->where('question_id',$id)->get();
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
                    Polloption::Create(
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
                    Polloption::where('id','=',$input['qnid'][$key])->update($farray);
                }  
            }else{
                $check = $request->request->get('checkboxoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnid'][$key],
                            'question' => $input['checkboxoption'][$key],
                        );
                    Polloption::where('id','=',$input['qnid'][$key])->update($farray);
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
                    Polloption::Create(
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
                    Polloption::where('id','=',$input['qnidrop'][$key])->update($farray);
                }  
            }else{
                $check = $request->request->get('dropdownoption');
                $input = $request->all();
                foreach ($check as $key => $chk) {
                    $farray= array(
                            'id' => $input['qnidrop'][$key],
                            'question' => $input['dropdownoption'][$key],
                        );
                    Polloption::where('id','=',$input['qnidrop'][$key])->update($farray);
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
                    Polloption::Create(
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
                    Polloption::where('id','=',$inputrdo['qnidradio'][$krd])->update(array(
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
                    Polloption::where('id','=',$inputrdo['qnidradio'][$krd])->update(array(
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
            Polloption::where('id','=',$starid)->update(array('question'=>$strating));
        }
    	$request->session()->flash('success_message', 'Public Poll Update Succcessfully');
    	return redirect()->route('admin.publicpolllist');
    }
    public function delete(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = PublicPoll::where('id',$id)->first();

    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request');
    		return redirect()->route('admin.publicpolllist');
		}
		$data['row']->delete();
		$request->session()->flash('success_message', 'Public Poll Data Delete Succcessfully');
    	return redirect()->route('admin.publicpolllist');
    }
    public function addcat()
    {
        $data =[];
        //$data['rows'] =Facts::select('title','slug','image','status','shortdesc','order','createdby','description')->get();
        //dd($data['rows']);
        return view('admin.facts.addcategory',compact('data'));
    }
    public function GetMAC(){
        ob_start();
        system('getmac');
        $Content = ob_get_contents();
        ob_clean();
        return substr($Content, strpos($Content,'\\')-20, 17);
    }
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
    public function storepublicpoll(AddFromValidation $request)
    {
        //dd($request->get('checkboxoption'));
        $user = auth()->user();
        PublicPoll::insert(array( 
            'question'=>$request->get('question'),
            'day_poll'=>$request->get('status'),
            'poll_date'=>$request->get('poll_date'),
            'question_type'=>$request->get('question_type'),
            'status'=>$request->get('status'),
            'createdby'=>$user->id,
            'visitor'=>'192.68.1.1',//$this->getIp(), 
            'device'=>'df:sd:6y:y6:fd'));
        $insertedid = DB::getPdo()->lastInsertId();
        if($insertedid)
        {
           $questiontype =  $request->get('question_type');
           $input = $request->all();
           if($questiontype == "checkbox")
           {
                $check = $request->request->get('checkboxoption');
                //dd($request->all());
                foreach ($check as $key => $chk) {
                    Polloption::Create(
                        array(
                                'question_id' => $insertedid ,
                                'question' => $input['checkboxoption'][$key],
                        ));
                }
           }
           if($questiontype == "radio")
           {
                $checkbox = $request->request->get('rdiooprtion');
                foreach ($checkbox as $kr => $rdo) {
                    Polloption::Create(
                        array(
                                'question_id' => $insertedid ,
                                'question' => $input['rdiooprtion'][$kr],
                        ));
                }
           }
           if($questiontype == "dropdown")
           {
                $dropdownopt = $request->request->get('dropdownoption');
                foreach ($dropdownopt as $km => $drop) {
                    Polloption::Create(
                        array(
                                'question_id' => $insertedid ,
                                'question' => $input['dropdownoption'][$km],
                        ));
                }
           }
           if($questiontype == "star_rating")
           {
                $staropt = $request->request->get('starrating');
                Polloption::Create(
                    array(
                            'question_id' => $insertedid,
                            'question' =>$staropt,
                    ));
           }
        }
        $request->session()->flash('success_message', 'Public poll added Successfully.');
        return redirect()->route('admin.publicpolllist');
    }
    public function catlist()
    {
        $data =[];
        $data['rows'] =FactCategory::select('title','id')->get();
        //dd($data['rows']);
        return view('admin.facts.catlist',compact('data'));
    }
    public function deletecat(Request $request, $id)
    {
        $data= [];
        $data['row'] = FactCategory::where('id',$id)->first();

        //dd($data['row']);
        if(!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route('admin.facts.catlist');
        }
        $data['row']->delete();
        $request->session()->flash('success_message', 'Fact Category Delete Succcessfully');
        return redirect()->route('admin.facts.catlist');
    }
}