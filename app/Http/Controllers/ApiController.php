<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facts;
use App\Models\FactCategory;

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
}
