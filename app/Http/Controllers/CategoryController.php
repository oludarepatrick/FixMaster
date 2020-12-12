<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;
use Image;

use App\Models\User;
use App\Models\Name;

use App\Models\Service;
use App\Models\Category;
use App\Http\Controllers\RecordActivityLogController;

class CategoryController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        $data = [
            'categories'  =>  $categories,
        ];

        return view('admin.services.list_category', $data)->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $services = Service::select('id', 'name', 'is_active')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC')->get();

        $data = [
            'services'  =>  $services,
        ];

        return view('admin.services.add_category', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         //Validate user input fields
         $this->validateRequest();

         //Validate if an image file was selected 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = ucwords($request->input('name')) .'.'.$image->getClientOriginalExtension();
            $imagePath = public_path('assets/category-images').'/'.$imageName;

        }

         $createCategory = Category::create([
            'user_id'       =>  Auth::id(),
            'service_id'    =>  $request->input('service_id'),
            'name'          =>  ucwords($request->input('name')),
            'standard_fee'  =>  str_replace(",", "", $request->input('standard_fee')), 
            'urgent_fee'    =>  str_replace(",", "", $request->input('urgent_fee')), 
            'ooh_fee'       =>  str_replace(",", "", $request->input('ooh_fee')), 
            'description'   =>  $request->input('description'),
            'image'         =>  $imageName,
            'updated_at'    =>  null,
        ]);

        if($createCategory){
            //Move image to `category-images` folder
            // $image->move(public_path('assets/category-images'), $imageName);
            Image::make($image->getRealPath())->resize(350, 259)->save($imagePath);

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' created '.ucwords($request->input('name')).' Service Category';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_category')->with('success', ucwords($request->input('name')).' Service Category was successfully created.');
        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to create Service Category.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to create Service Category.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'name'              =>   'required|unique:categories,name',
            'service_id'        =>   'required',
            // 'image'             =>   'required|mimes:jpg,png,jpeg,gif,svg|max:1014|dimensions:min_width=350,min_height=259,max_width=350,max_height=259',
            'image'             =>   'required|mimes:jpg,png,jpeg,gif,svg|max:1014',
            'is_active'         =>   'required', 
            'standard_fee'      =>   'required', 
            'urgent_fee'        =>   'required', 
            'ooh_fee'           =>   'required', 
            'description'       =>   'required', 
        ]);
    }

    public function edit($id){

        $categoryExists = Category::findOrFail($id);

        $services = Service::select('id','name')->orderBy('name', 'ASC')->get();

        $data = [
            'services'  =>  $services,
            'category'  =>  $categoryExists,
        ];

        return view('admin.services.edit_category', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate user input fields
        $request->validate([
            'name'              =>   'required',
            'service_id'        =>   'required',
            'is_active'         =>   'required', 
            'standard_fee'      =>   'required', 
            'urgent_fee'        =>   'required', 
            'ooh_fee'           =>   'required', 
            'description'       =>   'required', 
        ]);

         //Validate if an image file was selected 
         if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = ucwords($request->input('name')) .'.'.$image->getClientOriginalExtension();
            $imagePath = public_path('assets/category-images').'/'.$imageName;

            //Delete old image
            if(\File::exists(public_path('assets/category-images/'.$request->input('old_post_image')))){
                $done = \File::delete(public_path('assets/category-images/'.$request->input('old_post_image')));
                if($done){
                    // echo 'File has been deleted';
                }
            }

            //Move new image to `category-images` folder
            Image::make($image->getRealPath())->resize(350, 259)->save($imagePath);
        }else{
            $imageName = $request->input('old_post_image');
        }

         $updateCategory = Category::where('id', $id)->update([
            'service_id'    =>  $request->input('service_id'),
            'name'          =>  ucwords($request->input('name')),
            'is_active'     =>  $request->input('is_active'),
            'standard_fee'  =>  str_replace(",", "", $request->input('standard_fee')), 
            'urgent_fee'    =>  str_replace(",", "", $request->input('urgent_fee')), 
            'ooh_fee'       =>  str_replace(",", "", $request->input('ooh_fee')), 
            'description'   =>  $request->input('description'),
            'image'         =>  $imageName,
        ]);

        if($updateCategory){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.ucwords($request->input('name')).' Service Category';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_category')->with('success', ucwords($request->input('name')).' Service Category was successfully updated.');
        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update Service Category.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update Service Category.');
        }

        return back()->withInput();

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $categoryExists = Category::findOrFail($id);

        $softDeleteCategory = Category::where('id', $id)->delete();

        if($softDeleteCategory){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deleted '.$categoryExists->name.' category';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_category')->with('success', 'Category has been deleted.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to delete '.$categoryExists->name.' category.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to delete category.');
        } 
    }

    public function deactivate($id)
    {
        $categoryExists = Category::findOrFail($id);

        $deactivateCategory = Category::where('id', $id)->update([
            'is_active'    => '0',
        ]);

        if($deactivateCategory){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deactivated '.$categoryExists->name.' category';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_category')->with('success', 'Category has been deactivated.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to deactivate '.$categoryExists->name.' category.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to deactivate category.');
        } 
    }

    public function reinstate($id)
    {
        $categoryExists = Category::findOrFail($id);

        $reinstateCategory = Category::where('id', $id)->update([
            'is_active'    => '1',
        ]);

        if($reinstateCategory){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' reinstated '.$categoryExists->name.' category';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_category')->with('success', 'Category has been reinstated.');
            
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to reinstate '.$categoryExists->name.' category.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to reinstate category.');
        } 
    }

    public function categoryDetails($id){

        Category::findOrFail($id);

        $category = Category::where('id', $id)->first();

        $data = [
            'category'    =>  $category,
        ];

        return view('admin.services._category_details', $data);
    }
}
