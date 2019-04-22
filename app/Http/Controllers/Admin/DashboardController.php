<?php
namespace App\Http\Controllers\Admin; // namespace call to this folder

use App\Http\Controllers\Controller;
use App\Models\Facts;
use App\Models\PublicPoll;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
   		$data =[];
   		$date = \Carbon\Carbon::now();
        $data['totafacts'] =Facts::select('id')->count();
        $data['totapoll'] =PublicPoll::select('id')->count();
        $data['totalsurvey'] =Survey::select('id')->count();
        $data['totaluser'] =Auth::user('id')->count();

        //dd($data['totaluser']);
   		return view('admin.dashboard.index',compact('data'));

   }
}