<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzBeautyAvailability;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzBeautyAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_beauty_availability = GmzBeautyAvailability::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_beauty_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty_availability
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
                'message' => "Failed to get gmz_beauty_availability, please try again. {$exception->getMessage()}"
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
            $gmz_beauty_availability = GmzBeautyAvailability::create($request->all());
            $gmz_beauty_availability->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_beauty_availability
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_beauty_availability, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_id','check_in','check_out','price','status','created_at','updated_at'];
            $gmz_beauty_availability = GmzBeautyAvailability::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_beauty_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty_availability
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
                'message' => "Failed to get gmz_beauty_availability, please try again. {$exception->getMessage()}"
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
            $gmz_beauty_availability = GmzBeautyAvailability::where('id', '=', $id)->first();
            if ($gmz_beauty_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty_availability
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
                'message' => "Failed to get gmz_beauty_availability data, please try again. {$exception->getMessage()}"
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

            $gmz_beauty_availability = GmzBeautyAvailability::find($id);

           $gmz_beauty_availability->post_id = $input['post_id'];$gmz_beauty_availability->check_in = $input['check_in'];$gmz_beauty_availability->check_out = $input['check_out'];$gmz_beauty_availability->price = $input['price'];$gmz_beauty_availability->status = $input['status'];$gmz_beauty_availability->created_at = $input['created_at'];$gmz_beauty_availability->updated_at = $input['updated_at'];

            $res = $gmz_beauty_availability->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty_availability
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_beauty_availability"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_beauty_availability, please try again. {$exception->getMessage()}"
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
            $res = GmzBeautyAvailability::find($id)->delete();
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
                    'data' => "Failed to delete gmz_beauty_availability"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_beauty_availability, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

