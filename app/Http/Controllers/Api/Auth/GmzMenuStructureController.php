<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzMenuStructure;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzMenuStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_menu_structure = GmzMenuStructure::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_menu_structure) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_menu_structure
                ], 200);
            } else {
                return response([
                    'status' => 'error',
                    'code' => 0,
                    'data' => "No record found"
                ], 404);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to get gmz_menu_structure, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $gmz_menu_structure = GmzMenuStructure::create($request->all());
            $gmz_menu_structure->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_menu_structure
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_menu_structure, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($search, Request $request)
    {
        try {
            $searchQuery = trim($search);
            $requestData = ['id','item_id','parent_id','depth','left','right','name','type','post_id','post_title','url','class','menu_id','menu_lang','target_blank','created_at','updated_at'];
            $gmz_menu_structure = GmzMenuStructure::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_menu_structure) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_menu_structure
                ], 200);
            } else {
                return response([
                    'status' => 'error',
                    'code' => 0,
                    'data' => "No record found"
                ], 404);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to get gmz_menu_structure, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $gmz_menu_structure = GmzMenuStructure::where('id', '=', $id)->first();
            if ($gmz_menu_structure) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_menu_structure
                ], 200);
            } else {

                return response([
                    'status' => 'error',
                    'code' => 0,
                    'message' => "No record found"
                ], 404);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to get gmz_menu_structure data, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $input = $request->all();

            $gmz_menu_structure = GmzMenuStructure::find($id);

           $gmz_menu_structure->item_id = $input['item_id'];$gmz_menu_structure->parent_id = $input['parent_id'];$gmz_menu_structure->depth = $input['depth'];$gmz_menu_structure->left = $input['left'];$gmz_menu_structure->right = $input['right'];$gmz_menu_structure->name = $input['name'];$gmz_menu_structure->type = $input['type'];$gmz_menu_structure->post_id = $input['post_id'];$gmz_menu_structure->post_title = $input['post_title'];$gmz_menu_structure->url = $input['url'];$gmz_menu_structure->class = $input['class'];$gmz_menu_structure->menu_id = $input['menu_id'];$gmz_menu_structure->menu_lang = $input['menu_lang'];$gmz_menu_structure->target_blank = $input['target_blank'];$gmz_menu_structure->created_at = $input['created_at'];$gmz_menu_structure->updated_at = $input['updated_at'];

            $res = $gmz_menu_structure->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_menu_structure
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_menu_structure"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_menu_structure, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $res = GmzMenuStructure::find($id)->delete();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'message' => "Deleted successfully"
                ], 200);
            } else {
                return response([
                    'status' => 'error',
                    'code' => 0,
                    'data' => "Failed to delete gmz_menu_structure"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_menu_structure, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

