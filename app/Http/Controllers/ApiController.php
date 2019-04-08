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
        foreach ($data['publicpoll'] as $key => $value) {
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
                        "survey_company"=>$data['company'],
                        "surevy_fro"=>$surveyapidata,
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
    public function POST_like()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $request->request->get('post_id');
            $data['row'] = Facts::where('id',$id)->first();
            $nlike = $data['row']->like + $request->request->get('post_like');
            $request->request->add([
                'like' => $nlike+1,
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
    public function testapi()
    {
        
       $n =array(
        "nepal"=>0,"nepa"=>9
       );
       
        print(json_encode($n));
    }
}
 