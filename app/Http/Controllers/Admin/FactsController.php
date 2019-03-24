<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Facts;
use App\Models\FactCategory;
use Illuminate\Http\Request;
use Image; //this is for image resizer
use App\Http\Requests\Facts\AddFromValidation;
use App\Http\Requests\Facts\AddFromValidationCat;

//use App\Http\Requests\Slider\EditCategoryFormValidation;

class FactsController extends Controller
{ 
	public function index()
	{  
		$data =[];
		$data['rows'] =Facts::select('id','title','slug','image','status','shortdesc','order','createdby','description')->get();
        //dd($data['rows']);
		return view('admin.facts.index',compact('data'));
	}
	public function add()
	{
        $data =[];
        $data['category'] =FactCategory::select('id','title')->get();
        //dd($data['category']);
		return view('admin.facts.addfacts',compact('data'));
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
			$image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts',$image_name);
            $imagefinalname = 'http://127.0.0.1:8000'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$image_name;
    	}
        $thumbnailpath = public_path('images/facts/'.$image_name);
        $img = Image::make($thumbnailpath)->resize(940, 594, function($constraint) {
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
                'public_date'=>$request->get('public_date'),
                'like'=>'1',
                'createdby'=>$user->id,
                'description'=>$request->get('description')
    		]);
    	//dd($request->request->all());
    	Facts::create($request->request->all());
    	$request->session()->flash('success_message', 'Facts added Successfully.');
    	return redirect()->route('admin.facts');
    }
    public function edit(Request $request,$id)
    {
    	$data= [];
    	$data['row'] = Facts::where('id',$id)->first();
        $data['category'] =FactCategory::select('id','title')->get();
    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request.');
    		return redirect()->route('admin.facts.addfacts');
    	}
    	$data['row']->status = $data['row']->status == 1?'active':'in-active';
    	//dd($data['row']->status);
    	return view('admin.facts.editfact',compact('data'));
    }
    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$data= [];
    	$data['row'] = Facts::where('id',$id)->first();
        //dd($data['row']);
    	if($request->hasFile('image')) {
    		$image = $request->file('image');
    		$image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
            $imagefinalname = 'http://127.0.0.1:8000'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts/'.DIRECTORY_SEPARATOR.$image_name;
			$image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts',$image_name);
			if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$data['row']->image)) {
				unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$data['row']->image);
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
    	$request->session()->flash('success_message', 'Facts Update Succcessfully');
    	return redirect()->route('admin.facts');
    }
    public function delete(Request $request, $id)
    {
    	$data= [];
    	$data['row'] = Facts::where('id',$id)->first();

    	//dd($data['row']);
    	if(!$data['row']) {
    		$request->session()->flash('error_message', 'Invalid Request');
    		return redirect()->route('admin.facts');
		}
		if($data['row']->image && file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$data['row']->image)) {
				unlink(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'facts'.DIRECTORY_SEPARATOR.$data['row']->image);
			}

		$data['row']->delete();
		$request->session()->flash('success_message', 'Fact Delete Succcessfully');
    	return redirect()->route('admin.facts');
    }
    public function addcat()
    {
        $data =[];
        //$data['rows'] =Facts::select('title','slug','image','status','shortdesc','order','createdby','description')->get();
        //dd($data['rows']);
        return view('admin.facts.addcategory',compact('data'));
    }
    public function storecat(AddFromValidationCat $request)
    {
        //dd($request->all());
        // if($request->hasFile('main_image')) {
        //     $image = $request->file('main_image');
        //     $image_name = rand(4952, 9857).'_'.$image->getClientOriginalName();
        //     $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'category',$image_name);
        // }
        $request->request->add([
                'slug' => str_slug($request->get('title')),
                'status' => $request->get('status') == 'active'?1:0,
                'image'=>'test',
            ]);
        //dd($request->request->all());
        FactCategory::create($request->request->all());
        $request->session()->flash('success_message', 'Category added Successfully.');
        return redirect()->route('admin.facts.catlist');
    }
    public function catlist()
    {
        $data =[];
        $data['rows'] =FactCategory::select('title','id')->get();
        //dd($data['rows']);
        return view('admin.facts.catlist',compact('data'));
    }
    public function deletecat(Request $request, $id)
    {
        $data= [];
        $data['row'] = FactCategory::where('id',$id)->first();

        //dd($data['row']);
        if(!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route('admin.facts.catlist');
        }
        $data['row']->delete();
        $request->session()->flash('success_message', 'Fact Category Delete Succcessfully');
        return redirect()->route('admin.facts.catlist');
    }
}