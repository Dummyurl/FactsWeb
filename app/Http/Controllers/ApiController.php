<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facts;
use App\Models\FactCategory;
use App\Models\PublicPoll;
use App\Models\Polloption;
use App\Models\Survey;
use App\Models\Services;
use App\Models\Surveyoption;
use App\Models\Initiative;
use App\Models\SiteProfile;
use App\Models\SurveyCompany;
use App\Models\RegisterUsers;
use App\Models\SurveyForms;

// use Validator;

use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function factapimob(Request $request)
    {
        if($request->request->get('categories')) {
            $dcat=  $request->request->get('categories');
            $remov = array("[", "]");
            $replc   = array("", "");
            $catd = str_replace($remov, $replc, $dcat);
            $cat = explode(",", $catd); 
            $data['category'] =FactCategory::select('id','title','slug')->whereIn('id', $cat)->get();
        }else{
            $data['category'] =FactCategory::select('id','title','slug')->get();
            foreach ($data['category'] as $key => $catt) {
                $cat[]=$catt->id;
            }
        }
        // DB::getQueryLog();
       // dd($data['category']);
        $data['fact'] =Facts::select('id','title','slug','image as image_url','status','shortdesc as short_desc','order','description','like as like_count','category_id')->orderBy('id', 'DESC')->whereIn('category_id', $cat)->take(10)->get();
        $apidata[]= array(
                "version" =>"1.1.0",
                "category"=>$data['category'],
                "home"=>$data['fact']
            );
        print(json_encode($apidata));
    }

    public function siteapi()
    {
        $data['site'] =SiteProfile::select('created_at','updated_at','sitename','siteslogan','sikiptocontent','addressone','addresstwo','location','mobileno','phoneone','phonetwo','copytext','facebook','twitter','youtube','linkedin','instagram','owner','metatitle','metadescription','logo')->get();   
        $sitedata[] = array(
            'sitedata'=>$data['site'],
            'status'=>'Success Message'
        );
        print(json_encode($sitedata));
    }
    public function factapi()
    {
        $data['factsdata'] = DB::table('facts as f')
            ->join('factcategories as fc', 'fc.id', '=', 'f.category_id')
            ->select('f.*', 'fc.title as category_title','fc.slug as category_slug')
            ->get();
        $apidata[]= array(
                "home"=>$data['factsdata']
            );  
        //dd($data['factsdata'] );
        print(json_encode($apidata));
    }
    public function publicpoll()
    {

        $data['publicpoll'] =PublicPoll::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device')->orderBy('id', 'DESC')->take(10)->get();  
        if(!empty($data['publicpoll'])) {
            foreach ($data['publicpoll'] as $key => $value) {
                $polloftheday[] = array(
                    'id'=>$value->id,
                    'question'=>$value->question,
                    'day_poll'=>$value->day_poll,
                    'poll_date'=>$value->poll_date,
                    'question_type'=>$value->question_type,
                    'active'=>$value->status,
                    'options'=>Polloption::select('id','question','question_id')->where('question_id',$value->id)->get(),
                );
            }
          
            print(json_encode($polloftheday));
           
        }else{
            $polloftheday = array(
                'status'=>'No Data Found',
                'message'=>'No Data Found',
            );
            print(json_encode($polloftheday));
        }
    }

    
    public function sitesetting()
    {   
        $data['site'] =SiteProfile::select('created_at','updated_at','sitename','siteslogan','sikiptocontent','addressone','addresstwo','location','mobileno','phoneone','phonetwo','copytext','facebook','twitter','youtube','linkedin','instagram','owner','metatitle','metadescription','logo')->get();
        $sitedata[] = array(
            'sitedata'=>$data['site'],
            'status'=>'Success Message'
        );
        print(json_encode($sitedata));
    }
    public function surveyapi()
    {
        $data['publicpoll'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id')->orderBy('id', 'DESC')->take(10)->get();  
        //dd($data['publicpoll']);
        $data['company'] =SurveyCompany::select('id','title','image','description','shortdesc')->get();
        $data['surveyform'] =SurveyForms::select('id','question_id','survey_id','question_type','question','status','createdby')->get();
        //dd($data['surveyform']);
        foreach ($data['publicpoll'] as $key => $value) {
            $surveyapidata[] = array(
                'id'=>$value->id,
                'question'=>$value->question,
                'public_date'=>$value->day_poll,
                'survey_company_id'=>$value->survey_id,
                'question_type'=>$value->question_type,
                'active'=>$value->status,
                //'forms'=>SurveyForms::select('id','question_id','survey_id','question_type','question','status','createdby')->where('survey_id',$value->id)->get(),
            );
        }

        // foreach ($data['publicpoll'] as $key => $value) {
        //     $surveyapidata[] = array(
        //         'id'=>$value->id,
        //         'question'=>$value->question,
        //         'public_date'=>$value->day_poll,
        //         'survey_id'=>$value->survey_id,
        //         'question_type'=>$value->question_type,
        //         'active'=>$value->status,
        //         'options'=>Surveyoption::select('id','question','question_id')->where('question_id',$value->id)->get(),
        //     );
        // }
        $finalapi = array(
                        "survey_company"=>$data['company'],
                        "forms"=>$surveyapidata,
                        );
        echo json_encode($finalapi);

    }
    public function survey_form(Request $request,$id)
    {
        //$data['surveyforms'] = Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id')->where('survey_id', $id)->get();
        //$data['qnlists'] = SurveyForms::select('id','question_id','survey_id','question_type','question','status','createdby')->where('survey_id',$qnid)->get();
        //dd($data['qnlists']);
       $data['surveyforms'] = SurveyForms::select('id','question_id','survey_id','question_type','question','status','createdby')->get();
        //$data['surveyforms'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id')->orderBy('id', 'DESC')->take(10)->get();  
        //dd($data['surveyforms']);
        foreach ($data['surveyforms'] as $key => $value) {
            $surveyapidata[] = array(
                'id'=>$value->id,
                'question'=>$value->question,
               // 'public_date'=>$value->day_poll,
                'survey_id'=>$value->survey_id,
                'question_type'=>"radio",
                //'active'=>$value->status,
                'options'=>Surveyoption::select('id','question','question_id')->where('question_id',$value->id)->get(),
            );
        }
        //dd($surveyapidata);
        $finalapi = array(
                        //"survey_forms"=>$data['surveyforms'],
                        'survey_question'=>$surveyapidata,
                        );
        print(json_encode($finalapi));
    }
    public function survey_quetion(Request $request,$id)
    {
        $data['surveyforms'] = SurveyForms::select('id','question_id','survey_id','question_type','question','status','createdby')->where('survey_id',$id)->get();
        //Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id')->where('id',$id)->first();
        //$data['publicpoll'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id')->orderBy('id', 'DESC')->take(10)->get(); 
        //dd($data['row']);
        foreach ($data['surveyforms'] as $key => $value) {
            $surveyapidata[] = array(
                'id'=>$value->id,
                'question'=>$value->question,
                'public_date'=>$value->day_poll,
                'survey_id'=>$value->survey_id,
                'question_type'=>$value->question_type,
                'active'=>$value->status,
                'options'=>Surveyoption::select('id','question','question_id')->where('question_id',$value->id)->get(),
            );
        }
        $finalapi = array(
                        "survey_question"=>$data['surveyforms'],
                        "options"=>Surveyoption::select('id','question','question_id')->where('question_id',$id)->get(),
                        );
        print(json_encode($finalapi));
    }
    public function ourinititives()
    {
        $data['publicpoll'] =Initiative::select('id','title','slug','shortdesc','image','description','order','status','createdby')->orderBy('id', 'DESC')->take(10)->get();   
        $ourinititives[] = array(
            'ourinititives'=>$data['publicpoll'],
            'status'=>'Success Message'
        );
        print(json_encode($ourinititives));
    }
    public function service()
    {
        $data['servicesdata'] =Services::select('id','title','slug','shortdesc','image','description','order','status','createdby')->orderBy('id', 'DESC')->take(10)->get();   
        $servicesarr[] = array(
            'services'=>$data['servicesdata'],
            'status'=>'Success Message'
            );
        print(json_encode($servicesarr));
    }
    public function POST_like(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $request->request->get('name');
            $data['row'] = Facts::where('id',$id)->first();
           // print_r(json_encode(array('status'=>$data['row'] ,'message'=>'Fact Like Increase Successfully')));
            $nlike = $data['row']->like + 1;
            //dd($nlike);
            $request->request->add([
                'like' => $nlike,
            ]);
            $data['row']->update($request->request->all());
            print_r(json_encode(array('status'=>'success','message'=>'Fact Like Increase Successfully')));
            exit;
        }else {
            print_r(json_encode(array('status'=>'error','message'=>'Cannot Perform this Operation')));
            exit;
        }
    }
    public function varun(Request $request)
    {   
        // dd($request->request->all());
        // $varun[] =  $request->request->all();
        $varun[] =  $request->request->get('name');
        // dd($varun);
        // $data=
        print_r(json_encode($varun));
    }
    public function pollresult(Request $request)
    {   
        // dd("sdasdsad");
        $club=array(
            "Liverpool","Manutd","Chelsea","Arsenal"
        );
        for($i=0;$i<sizeof($club); $i++){
            $varun[]=array(
                'name'=>$club[$i],
                'uv'=>mt_rand(100,500)
            );
        }
            print_r(json_encode($varun));
        
    }
    public function publicpollresult(Request $request)
    {  
        //  print("sdasdsad");
        // for($i=0;$i<4; $i++){
        //     $varun[]=array(
        //         'name'=>'Liverpool',
        //         'uv'=>20
        //     );
        // }
        // print_r(json_encode($varun));
        
    }
    public function testapi()
    {
        
       $n =array(
        "nepal"=>0,"nepa"=>9
       );
       
        print(json_encode($n));
    }
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [ 
    //                 'name' => 'required ',
    //                 'email' => 'required|unique:register_users,email'
    //     ]);   
    //     if ($validator->fails()) {          
    //          return response()->json(['error'=>$validator->errors()], 401);                        
    //     }  
    //     $input = $request->all();
    //     RegisterUsers::create($input);
    //     return response()->json(['success'=>"Use Regiser Successfully"], '200'); 
    // }
    // public function getUser()
    // {
    //     $user =RegisterUsers::select('email','name','photo_url','district','province','ward','latitude','longitude','birth_year','provider','gender','municipality','street','token')->get();
    //     return response()->json(['success' => $user], $this->successStatus); 
    // }
//     public function testapi()
//     {
       
//     }
//      $message = array(
//                         'success'=>"true",
//                         'token'=>$success,
//                         );
}
 
   
        