<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzComment;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_comment = GmzComment::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_comment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_comment
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
                'message' => "Failed to get gmz_comment, please try again. {$exception->getMessage()}"
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
            $gmz_comment = GmzComment::create($request->all());
            $gmz_comment->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_comment
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_comment, please try again. {$exception->getMessage()}"
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
            $requestData = ['comment_id','post_id','comment_title','comment_content','comment_name','comment_email','comment_author','comment_rate','post_type','parent','status','created_at','updated_at','deleted_at'];
            $gmz_comment = GmzComment::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_comment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_comment
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
                'message' => "Failed to get gmz_comment, please try again. {$exception->getMessage()}"
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
            $gmz_comment = GmzComment::where('comment_id', '=', $id)->first();
            if ($gmz_comment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_comment
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
                'message' => "Failed to get gmz_comment data, please try again. {$exception->getMessage()}"
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

            $gmz_comment = GmzComment::find($id);

           $gmz_comment->post_id = $input['post_id'];$gmz_comment->comment_title = $input['comment_title'];$gmz_comment->comment_content = $input['comment_content'];$gmz_comment->comment_name = $input['comment_name'];$gmz_comment->comment_email = $input['comment_email'];$gmz_comment->comment_author = $input['comment_author'];$gmz_comment->comment_rate = $input['comment_rate'];$gmz_comment->post_type = $input['post_type'];$gmz_comment->parent = $input['parent'];$gmz_comment->status = $input['status'];$gmz_comment->created_at = $input['created_at'];$gmz_comment->updated_at = $input['updated_at'];$gmz_comment->deleted_at = $input['deleted_at'];

            $res = $gmz_comment->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_comment
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_comment"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_comment, please try again. {$exception->getMessage()}"
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
            $res = GmzComment::find($id)->delete();
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
                    'data' => "Failed to delete gmz_comment"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_comment, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

