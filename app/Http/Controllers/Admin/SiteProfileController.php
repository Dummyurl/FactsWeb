<?php
namespace App\Http\Controllers\Admin; // namespace call to this folder

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteProfile;

class SiteProfileController extends Controller
{
    public function index()
    {
      return view('admin.siteprofile.index');
    }
    public function edit(Request $request)
    {
      $data= [];
      $data['row'] = SiteProfile::first();
      //dd($data['row']);
      return view('admin.siteprofile.edit',compact('data'));  
    }
    public function update(Request $request)
    { 
        $data= [];
        $data['row'] = SiteProfile::first();
        //dd($request->all());
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
            $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'site_profile',$image_name);
            //dd(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'site_profile',$image_name);
            if(!empty($data['row']->logo)?$data['row']->logo:'' && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'site_profile'.DIRECTORY_SEPARATOR.$data['row']->logo)) {
                unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'site_profile'.DIRECTORY_SEPARATOR.$data['row']->logo);
            }
        }
        $request->request->add([
            'logo' => isset($image_name)?$image_name:$data['row']->logo
        ]);
        //dd($request->request->all());
        if($data['row']) {
            $data['row']->update($request->request->all());
        }else{
            SiteProfile::create($request->request->all());
        }
        $request->session()->flash('success_message', 'Site Profile Update Succcessfully');
        return redirect()->route('admin.siteprofile.edit');
    }
}