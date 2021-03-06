<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image; 
use App\Http\Requests\Services\AddFromValidation;
//use App\Http\Requests\SiteProfile\EditCategoryFormValidation;

class ServicesController extends Controller
{
    public function index()
    {   
        $data =[];
        $data['rows'] =Services::select('id','title','slug','shortdesc','image','description','order','status','createdby')->get();
        return view('admin.services.index',compact('data'));
    }
    public function add()
    {
        return view('admin.services.addservices');
    }
    /**
     * Store a new services.
     *
     * @param  Request  $request
     * @return Response 
     */
    public function store(AddFromValidation $request)
    {
        //dd($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
            $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services',$image_name);
            $imagefinalname = url('/').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR.$image_name;
        }
        $thumbnailpath = public_path('images/services/'.$image_name);
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
                'order'=>$request->get('order'),
                'createdby'=>$user->id,
                'description'=>$request->get('description')
            ]);
        //dd($request->request->all());
        Services::create($request->request->all());
        $request->session()->flash('success_message', 'Services added Successfully.');
        return redirect()->route('admin.serviceslist');
    }
    public function edit(Request $request,$id)
    {
        $data= [];
        $data['row'] = Services::where('id',$id)->first();
        //dd($data['row']);
        if(!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request.');
            return redirect()->route('admin.services.add');
        }
        $data['row']->status = $data['row']->status == 1?'active':'in-active';
        //dd($data['row']->status);
        return view('admin.services.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data= [];
        $data['row'] = Services::where('id',$id)->first();
        //dd($data['row']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
            $imagefinalname = url('/').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services/'.DIRECTORY_SEPARATOR.$image_name;
            $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services',$image_name);
            if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR.$data['row']->image)) {
                unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR.$data['row']->image);
            }
        }
        $user = auth()->user();
        $request->request->add([
                'slug' => str_slug($request->get('title')),
                'shortdesc' => $request->get('shortdesc'),
                'status' => $request->get('status') == 'active'?1:0,
                'createdby'=>$user->id,
                'description'=>$request->get('description'),
                'image' => isset($image_name)?$imagefinalname:$data['row']->image
            ]);
        //dd($request->request->all());
        $data['row']->update($request->request->all());
        $request->session()->flash('success_message', 'Services Update Succcessfully');
        return redirect()->route('admin.serviceslist');
    }
    public function delete(Request $request, $id)
    {
        $data= [];
        $data['row'] = Services::where('id',$id)->first();

        //dd($data['row']);
        if(!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route('admin.serviceslist');
        }
        if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR.$data['row']->image)) {
                unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR.$data['row']->image);
            }

        $data['row']->delete();
        $request->session()->flash('success_message', 'Serviceslist Delete Succcessfully');
        return redirect()->route('admin.serviceslist');
    }
}

