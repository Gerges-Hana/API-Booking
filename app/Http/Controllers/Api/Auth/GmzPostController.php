<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzPost;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_post = GmzPost::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_post) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_post
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
                'message' => "Failed to get gmz_post, please try again. {$exception->getMessage()}"
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
            $gmz_post = GmzPost::create($request->all());
            $gmz_post->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_post
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_post, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_description','post_content','post_category','post_tag','thumbnail_id','status','author','created_at','updated_at','deleted_at'];
            $gmz_post = GmzPost::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_post) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_post
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
                'message' => "Failed to get gmz_post, please try again. {$exception->getMessage()}"
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
            $gmz_post = GmzPost::where('id', '=', $id)->first();
            if ($gmz_post) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_post
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
                'message' => "Failed to get gmz_post data, please try again. {$exception->getMessage()}"
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

            $gmz_post = GmzPost::find($id);

           $gmz_post->post_title = $input['post_title'];$gmz_post->post_slug = $input['post_slug'];$gmz_post->post_description = $input['post_description'];$gmz_post->post_content = $input['post_content'];$gmz_post->post_category = $input['post_category'];$gmz_post->post_tag = $input['post_tag'];$gmz_post->thumbnail_id = $input['thumbnail_id'];$gmz_post->status = $input['status'];$gmz_post->author = $input['author'];$gmz_post->created_at = $input['created_at'];$gmz_post->updated_at = $input['updated_at'];$gmz_post->deleted_at = $input['deleted_at'];

            $res = $gmz_post->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_post
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_post"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_post, please try again. {$exception->getMessage()}"
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
            $res = GmzPost::find($id)->delete();
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
                    'data' => "Failed to delete gmz_post"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_post, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

