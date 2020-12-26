<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;

use App\Models\User;
use App\Models\ToolsInventory;
use App\Models\Name;
use App\Http\Controllers\RecordActivityLogController;

class ToolsInventoryController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $toolsInventories = ToolsInventory::orderBy('name', 'ASC')->get();

        $data = [
            'toolsInventories'  =>  $toolsInventories,
        ];

        return view('admin.tools.inventory', $data)->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name'          => 'required|unique:tool_inventories,name',
            'quantity'      => 'required|Numeric|min:1',
        ]);

        $createToolInventory = ToolsInventory::create([
            'user_id'       =>  Auth::id(),
            'name'          =>  ucwords($request->input('name')),
            'quantity'      =>  $request->input('quantity'),
            'available'     =>  $request->input('quantity'),
            'updated_at'    =>  null,
        ]);

        if($createToolInventory){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' added '.ucwords($request->input('name')).' to Tools Inventory';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', ucwords($request->input('name')).' Tools Inventory was successfully added.');
        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to add '.ucwords($request->input('name')).' to Tools Inventory';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to add to Tools Inventory.');
        }

        return back()->withInput();
    }

    public function edit($id){

        ToolsInventory::findOrFail($id);

        $tool = ToolsInventory::where('id', $id)->first();

        $data = [
            'tool'    =>  $tool,
        ];

        return view('admin.tools._tools_inventory_edit', $data);
    }

    public function update(Request $request, $id){

        $toolExists = ToolsInventory::findOrFail($id);

        $request->validate([
            'name'          => 'required|unique:tool_inventories,name,'.$id.',id',
            'quantity'      => 'required|Numeric|min:1',
        ]);

        $oldQuantity = $toolExists->quantity;
        $oldAvailable = $toolExists->available;
        $oldName = $toolExists->name;

        if($request->input('quantity') > $oldQuantity){
            $available = ($request->input('quantity') - $oldQuantity) + $oldAvailable;
        }else{
            $available = $oldAvailable - ($oldQuantity - $request->input('quantity'));
        }


        $updateTool = ToolsInventory::where('id', $id)->update([
            'name'          =>  ucwords($request->get('name')),
            'quantity'      =>  $request->input('quantity'),
            'available'     =>  $available,
        ]);

        if($updateTool){
        
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$oldName.' Tool';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.tools_inventory')->with('success', 'Tool has been updated.');
            
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update '. $oldName.' tool.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update Tool.');
        } 
    
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $toolExists = ToolsInventory::findOrFail($id);

        $softDeleteTool = ToolsInventory::where('id', $id)->delete();

        if($softDeleteTool){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deleted '.$toolExists->name.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.tools_inventory')->with('success', 'Tool has been deleted.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to delete '.$toolExists->name.' tool.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to delete tool.');
        } 
    }

}
