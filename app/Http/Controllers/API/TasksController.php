<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TasksController extends Controller
{
    public function list(Request $request){
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
        $pageLength = $request->length;
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table
        $query = DB::table('tasks')->select('*');

        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search){
            $query->orWhere('title', 'like', "%".$search."%");
            $query->orWhere('description', 'like', "%".$search."%");
            $query->orWhere('priority', 'like', "%".$search."%");
            $query->orWhere('due_date', 'like', "%".$search."%");
            $query->orWhere('status', 'like', "%".$search."%");
        });

        $orderByName = 'title';
        switch($orderColumnIndex){
            case '0':
                $orderByName = 'title';
                break;
            case '1':
                $orderByName = 'description';
                break;
            case '2':
                $orderByName = 'priority';
                break;
            case '3':
                $orderByName = 'due_date';
                break;
            case '4':
                $orderByName = 'status';
                break;
        
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:100',
            'description'=>'required|string|min:2|max:100|',
            'priority'=>Rule::in(['Low','Medium','High']),
            'due_date'=>'required|date',
            'status'=>Rule::in(['Pending','Completed']),
        ]);

        if ($validator->fails())
        {
            return response()->json(['status'=>'error','errors'=>$validator->errors()]);
        }

        $task = Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'priority'=>$request->priority,
            'due_date'=>$request->due_date,
            'status'=>$request->status,
        ]);

        return response()->json([
            'status'=>'success',
            'msg'=>'Task Inserted Successfully',
            'task'=>$task,
        ]);
    }
    public function delete(Request $request,$id){
        $data= Task::find($id);
        if(!$data){
            return response()->json(['errors'=>'No Data Found']);
        }
        $data->delete();
        return response()->json([
            'msg'=>'Task Deleted Successfully',
            'status'=>'success'
        ]);
    }
    public function get(Request $request, $id){
        $data= Task::find($id);
        if(!$data){
            return response()->json(['status'=>'error','errors'=>'No Data Found']);
        }
        return response()->json([
            'status'=>'success',
            'msg'=>'Task Fetch Successfully',
            'task'=>$data,
        ]);
    }
    public function update(Request $request, $id){
        $data= Task::find($id);
        if(!$data){
            return response()->json(['errors'=>'No Data Found']);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:100',
            'description'=>'required|string|min:2|max:100|',
            'priority'=>Rule::in(['Low','Medium','High']),
            'due_date'=>'required|date',
            'status'=>Rule::in(['Pending','Completed']),
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $data->title=$request->title;
        $data->description=$request->description;
        $data->priority=$request->priority;
        $data->due_date=$request->due_date;
        $data->status=$request->status;
        $data->save();
        return response()->json([
            "status"=>'success',
            'msg'=>'Task Update Successfully',
            'task'=>$data,
        ]);
    }
}
