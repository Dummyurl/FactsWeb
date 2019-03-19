<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facts;
use App\Models\FactCategory;
use App\Models\PublicPoll;
use App\Models\Polloption;
use App\Models\Survey;
use App\Models\Surveyoption;
use Illuminate\Support\Facades\DB;
use App\Models\SiteProfile;

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
    public function index()
    {
        $data['category'] =FactCategory::select('id','title','slug')->get();
        //dd($data['category']);
        // asset('images/facts/'.$row->image)
        $data['fact'] =Facts::select('id','title','slug','image as image_url','status','shortdesc as short_desc','order','description','like as like_count','category_id')->orderBy('id', 'DESC')->take(10)->get();
        //dd($data['fact']);
        foreach ($data['fact'] as $key => $value) {
           
        }
        $apidata[]= array(
                "version" =>"1.1.0",
                "category"=>$data['category'],
                "home"=>$data['fact']
            );
        print(json_encode($apidata));
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
        $data['publicpoll'] =Survey::select('id','question','day_poll','poll_date','question_type','status','createdby','visitor','device')->orderBy('id', 'DESC')->take(10)->get();  
        foreach ($data['publicpoll'] as $key => $value) {
            $surveyapidata[] = array(
                'id'=>$value->id,
                'question'=>$value->question,
                'public_date'=>$value->day_poll,
                //'poll_date'=>$value->poll_date,
                'question_type'=>$value->question_type,
                'active'=>$value->status,
                'options'=>Surveyoption::select('id','question','question_id')->where('question_id',$value->id)->get(),
            );
        }
        print(json_encode($surveyapidata));

    }
}
 