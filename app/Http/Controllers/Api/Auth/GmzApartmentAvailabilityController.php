<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzApartmentAvailability;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzApartmentAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_apartment_availability = GmzApartmentAvailability::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_apartment_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment_availability
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
                'message' => "Failed to get gmz_apartment_availability, please try again. {$exception->getMessage()}"
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
            $gmz_apartment_availability = GmzApartmentAvailability::create($request->all());
            $gmz_apartment_availability->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_apartment_availability
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_apartment_availability, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_id','check_in','check_out','price','booked','status','created_at','updated_at','is_base'];
            $gmz_apartment_availability = GmzApartmentAvailability::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_apartment_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment_availability
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
                'message' => "Failed to get gmz_apartment_availability, please try again. {$exception->getMessage()}"
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
            $gmz_apartment_availability = GmzApartmentAvailability::where('id', '=', $id)->first();
            if ($gmz_apartment_availability) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment_availability
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
                'message' => "Failed to get gmz_apartment_availability data, please try again. {$exception->getMessage()}"
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

            $gmz_apartment_availability = GmzApartmentAvailability::find($id);

           $gmz_apartment_availability->post_id = $input['post_id'];$gmz_apartment_availability->check_in = $input['check_in'];$gmz_apartment_availability->check_out = $input['check_out'];$gmz_apartment_availability->price = $input['price'];$gmz_apartment_availability->booked = $input['booked'];$gmz_apartment_availability->status = $input['status'];$gmz_apartment_availability->created_at = $input['created_at'];$gmz_apartment_availability->updated_at = $input['updated_at'];$gmz_apartment_availability->is_base = $input['is_base'];

            $res = $gmz_apartment_availability->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment_availability
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_apartment_availability"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_apartment_availability, please try again. {$exception->getMessage()}"
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
            $res = GmzApartmentAvailability::find($id)->delete();
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
                    'data' => "Failed to delete gmz_apartment_availability"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_apartment_availability, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

