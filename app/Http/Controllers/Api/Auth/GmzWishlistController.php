<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzWishlist;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_wishlist = GmzWishlist::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_wishlist) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_wishlist
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
                'message' => "Failed to get gmz_wishlist, please try again. {$exception->getMessage()}"
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
            $gmz_wishlist = GmzWishlist::create($request->all());
            $gmz_wishlist->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_wishlist
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_wishlist, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_id','post_type','author','created_at','updated_at','deleted_at'];
            $gmz_wishlist = GmzWishlist::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_wishlist) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_wishlist
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
                'message' => "Failed to get gmz_wishlist, please try again. {$exception->getMessage()}"
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
            $gmz_wishlist = GmzWishlist::where('id', '=', $id)->first();
            if ($gmz_wishlist) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_wishlist
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
                'message' => "Failed to get gmz_wishlist data, please try again. {$exception->getMessage()}"
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

            $gmz_wishlist = GmzWishlist::find($id);

           $gmz_wishlist->post_id = $input['post_id'];$gmz_wishlist->post_type = $input['post_type'];$gmz_wishlist->author = $input['author'];$gmz_wishlist->created_at = $input['created_at'];$gmz_wishlist->updated_at = $input['updated_at'];$gmz_wishlist->deleted_at = $input['deleted_at'];

            $res = $gmz_wishlist->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_wishlist
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_wishlist"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_wishlist, please try again. {$exception->getMessage()}"
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
            $res = GmzWishlist::find($id)->delete();
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
                    'data' => "Failed to delete gmz_wishlist"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_wishlist, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

