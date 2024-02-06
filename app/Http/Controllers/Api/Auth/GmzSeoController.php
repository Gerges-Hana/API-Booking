<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzSeo;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_seo = GmzSeo::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_seo) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_seo
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
                'message' => "Failed to get gmz_seo, please try again. {$exception->getMessage()}"
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
            $gmz_seo = GmzSeo::create($request->all());
            $gmz_seo->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_seo
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_seo, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_id','post_type','seo_title','meta_description','seo_image_facebook','seo_title_facebook','meta_description_facebook','seo_image_twitter','seo_title_twitter','meta_description_twitter','created_at','updated_at','deleted_at'];
            $gmz_seo = GmzSeo::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_seo) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_seo
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
                'message' => "Failed to get gmz_seo, please try again. {$exception->getMessage()}"
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
            $gmz_seo = GmzSeo::where('id', '=', $id)->first();
            if ($gmz_seo) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_seo
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
                'message' => "Failed to get gmz_seo data, please try again. {$exception->getMessage()}"
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

            $gmz_seo = GmzSeo::find($id);

           $gmz_seo->post_id = $input['post_id'];$gmz_seo->post_type = $input['post_type'];$gmz_seo->seo_title = $input['seo_title'];$gmz_seo->meta_description = $input['meta_description'];$gmz_seo->seo_image_facebook = $input['seo_image_facebook'];$gmz_seo->seo_title_facebook = $input['seo_title_facebook'];$gmz_seo->meta_description_facebook = $input['meta_description_facebook'];$gmz_seo->seo_image_twitter = $input['seo_image_twitter'];$gmz_seo->seo_title_twitter = $input['seo_title_twitter'];$gmz_seo->meta_description_twitter = $input['meta_description_twitter'];$gmz_seo->created_at = $input['created_at'];$gmz_seo->updated_at = $input['updated_at'];$gmz_seo->deleted_at = $input['deleted_at'];

            $res = $gmz_seo->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_seo
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_seo"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_seo, please try again. {$exception->getMessage()}"
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
            $res = GmzSeo::find($id)->delete();
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
                    'data' => "Failed to delete gmz_seo"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_seo, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

