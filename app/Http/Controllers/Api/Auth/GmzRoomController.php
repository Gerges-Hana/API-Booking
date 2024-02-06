<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzRoom;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_room = GmzRoom::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_room) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_room
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
                'message' => "Failed to get gmz_room, please try again. {$exception->getMessage()}"
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
            $gmz_room = GmzRoom::create($request->all());
            $gmz_room->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_room
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_room, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_content','thumbnail_id','gallery','base_price','number_of_room','room_footage','number_of_bed','number_of_adult','number_of_children','room_facilities','hotel_id','author','status','created_at','updated_at','ical','deleted_at'];
            $gmz_room = GmzRoom::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_room) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_room
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
                'message' => "Failed to get gmz_room, please try again. {$exception->getMessage()}"
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
            $gmz_room = GmzRoom::where('id', '=', $id)->first();
            if ($gmz_room) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_room
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
                'message' => "Failed to get gmz_room data, please try again. {$exception->getMessage()}"
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

            $gmz_room = GmzRoom::find($id);

           $gmz_room->post_title = $input['post_title'];$gmz_room->post_content = $input['post_content'];$gmz_room->thumbnail_id = $input['thumbnail_id'];$gmz_room->gallery = $input['gallery'];$gmz_room->base_price = $input['base_price'];$gmz_room->number_of_room = $input['number_of_room'];$gmz_room->room_footage = $input['room_footage'];$gmz_room->number_of_bed = $input['number_of_bed'];$gmz_room->number_of_adult = $input['number_of_adult'];$gmz_room->number_of_children = $input['number_of_children'];$gmz_room->room_facilities = $input['room_facilities'];$gmz_room->hotel_id = $input['hotel_id'];$gmz_room->author = $input['author'];$gmz_room->status = $input['status'];$gmz_room->created_at = $input['created_at'];$gmz_room->updated_at = $input['updated_at'];$gmz_room->ical = $input['ical'];$gmz_room->deleted_at = $input['deleted_at'];

            $res = $gmz_room->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_room
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_room"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_room, please try again. {$exception->getMessage()}"
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
            $res = GmzRoom::find($id)->delete();
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
                    'data' => "Failed to delete gmz_room"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_room, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

