<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facts;
use App\Models\FactCategory;
use App\Models\PublicPoll;
use App\Models\Polloption;
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
        $data['publicpoll'] =PublicPoll::select('question','day_poll','poll_date','question_type','status','createdby','visitor','device')->orderBy('id', 'DESC')->take(10)->get();  
        $data['option'] = DB::table('publicpoll as p')
            ->join('polloption as po', 'po.question_id', '=', 'p.id','LEFT')
            ->select('p.*', 'po.*')
            ->get();
        foreach ($data['publicpoll'] as $key => $value) {
            $polloftheday[] = array(
                'question'=>$value->question,
                'day_poll'=>$value->day_poll,
                'poll_date'=>$value->poll_date,
                'question_type'=>$value->question_type,
                'status'=>$value->status,
                'options'=>$data['option']
            );
        }
        //dd($data['publicpoll']);
        print(json_encode($polloftheday));
    }
}
