<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\AddFromValidation;
//use App\Http\Requests\Slider\EditCategoryFormValidation;

class SliderController extends Controller
{ 
	public function index()
	{	
		$data =[];
		$data['rows'] =Slider::select('id','title','slug','image','status')->get();
        dd($data['rows']);
		return view('admin.slider.index',compact('data'));
	}
	public function add()
	{
		return view('admin.slider.addslider');
	}
	/**
     * Store a new user.
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
			$image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'slider',$image_name);
    	}
        $user = auth()->user();
    	$request->request->add([
    			'slug' => str_slug($request->get('title')),
    			'shortdesc' => $request->get('shortdesc'),
    			'status' => $request->get('status') == 'active'?1:0,
    			'image' => $image_name,
                'createdby'=>$user->id,
    		]);
    	//dd($request->request->all());
    	Slider::create($request->request->all());
    	$request->session()->flash('success_message', 'Slider added Successfully.');
    	return redirect()->route('admin.slider');
    }
    public function edit(Request $request,$id)
    {
    	$data= [];
    	$data['row'] = Category::where('id',$id)->first();
    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request.');
    		return redirect()->route('admin.slider');
    	}
    	$data['row']->status = $data['row']->status == 1?'active':'in-active';
    	//dd($data['row']->status);
    	return view('admin.slider.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$data= [];
    	$data['row'] = Slider::where('id',$id)->first();
    	if($request->hasFile('main_image')) {
    		$image = $request->file('main_image');
    		$image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
			$image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'slider',$image_name);
			if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'slider'.DIRECTORY_SEPARATOR.$data['row']->image)) {
				unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'slider'.DIRECTORY_SEPARATOR.$data['row']->image);
			}
    	}
    	$request->request->add([
    			'slug' => str_slug($request->get('title')),
    			'status' => $request->get('status') == 'active'?1:0,
    			'image' => isset($image_name)?$image_name:$data['row']->image
    		]);
    	$data['row']->update($request->all());
    	$request->session()->flash('success_message', 'Slider Update Succcessfully');
    	return redirect()->route('admin.slider');
    }
    public function delete(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = Slider::where('id',$id)->first();

    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request');
    		return redirect()->route('admin.slider');
		}
		if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR.$data['row']->image)) {
				unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR.$data['row']->image);
			}

		$data['row']->delete();
		$request->session()->flash('success_message', 'Category Delete Succcessfully');
    	return redirect()->route('admin.slider');
    }
}