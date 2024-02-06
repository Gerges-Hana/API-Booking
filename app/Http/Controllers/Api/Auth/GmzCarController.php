<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzCar;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_car = GmzCar::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_car) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_car
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
                'message' => "Failed to get gmz_car, please try again. {$exception->getMessage()}"
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
            $gmz_car = GmzCar::create($request->all());
            $gmz_car->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_car
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_car, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','enable_cancellation','cancel_before','cancellation_detail','quantity','equipments','car_type','car_feature','car_equipment','rating','is_featured','discount_by_day','insurance_plan','passenger','gear_shift','baggage','door','video','author','status','created_at','updated_at','external_booking','external_link','post_description','deleted_at'];
            $gmz_car = GmzCar::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_car) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_car
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
                'message' => "Failed to get gmz_car, please try again. {$exception->getMessage()}"
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
            $gmz_car = GmzCar::where('id', '=', $id)->first();
            if ($gmz_car) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_car
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
                'message' => "Failed to get gmz_car data, please try again. {$exception->getMessage()}"
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

            $gmz_car = GmzCar::find($id);

           $gmz_car->post_title = $input['post_title'];$gmz_car->post_slug = $input['post_slug'];$gmz_car->post_content = $input['post_content'];$gmz_car->location_lat = $input['location_lat'];$gmz_car->location_lng = $input['location_lng'];$gmz_car->location_address = $input['location_address'];$gmz_car->location_zoom = $input['location_zoom'];$gmz_car->location_state = $input['location_state'];$gmz_car->location_postcode = $input['location_postcode'];$gmz_car->location_country = $input['location_country'];$gmz_car->location_city = $input['location_city'];$gmz_car->thumbnail_id = $input['thumbnail_id'];$gmz_car->gallery = $input['gallery'];$gmz_car->base_price = $input['base_price'];$gmz_car->booking_form = $input['booking_form'];$gmz_car->enable_cancellation = $input['enable_cancellation'];$gmz_car->cancel_before = $input['cancel_before'];$gmz_car->cancellation_detail = $input['cancellation_detail'];$gmz_car->quantity = $input['quantity'];$gmz_car->equipments = $input['equipments'];$gmz_car->car_type = $input['car_type'];$gmz_car->car_feature = $input['car_feature'];$gmz_car->car_equipment = $input['car_equipment'];$gmz_car->rating = $input['rating'];$gmz_car->is_featured = $input['is_featured'];$gmz_car->discount_by_day = $input['discount_by_day'];$gmz_car->insurance_plan = $input['insurance_plan'];$gmz_car->passenger = $input['passenger'];$gmz_car->gear_shift = $input['gear_shift'];$gmz_car->baggage = $input['baggage'];$gmz_car->door = $input['door'];$gmz_car->video = $input['video'];$gmz_car->author = $input['author'];$gmz_car->status = $input['status'];$gmz_car->created_at = $input['created_at'];$gmz_car->updated_at = $input['updated_at'];$gmz_car->external_booking = $input['external_booking'];$gmz_car->external_link = $input['external_link'];$gmz_car->post_description = $input['post_description'];$gmz_car->deleted_at = $input['deleted_at'];

            $res = $gmz_car->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_car
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_car"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_car, please try again. {$exception->getMessage()}"
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
            $res = GmzCar::find($id)->delete();
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
                    'data' => "Failed to delete gmz_car"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_car, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

