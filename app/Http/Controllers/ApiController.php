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
        // $cat[] =  $request->request->get('categories')
        // $data['category'] =FactCategory::select('id','title','slug')->get();
        // $data['fact'] =Facts::select('id','title','slug','image as image_url','status','shortdesc as short_desc','order','description','like as like_count','category_id')->orderBy('id', 'DESC')->whereIn('category_id',$cat)->take(10)->get();
        // $apidata[]= array(
        //         "version" =>"1.1.0",
        //         "category"=>$data['category'],
        //         "home"=>$data['fact']
        //     );
        // print(json_encode($apidata));
        $cat =  $request->request->get('categories');
        //dd($cat);
        $data['category'] =FactCategory::select('id','title','slug')->get();
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
            ->select('f.*', 'fc.*')
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
    
}
 