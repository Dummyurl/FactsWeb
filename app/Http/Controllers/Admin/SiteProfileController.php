<?php
namespace App\Http\Controllers\Admin; // namespace call to this folder

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteProfileController extends Controller
{
    public function index()
    {
   		return view('admin.siteprofile.index');
    }
    public function edit(Request $request)
   	{
   		$data= [];
   		return view('admin.siteprofile.edit',compact('data'));	
   	}
    public function update(Request $request)
   	{
   		$data= [];
   		return view('admin.siteprofile.edit',compact('data'));	
   	}
}