<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzBeauty;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzBeautyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_beauty = GmzBeauty::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_beauty) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty
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
                'message' => "Failed to get gmz_beauty, please try again. {$exception->getMessage()}"
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
            $gmz_beauty = GmzBeauty::create($request->all());
            $gmz_beauty->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_beauty
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_beauty, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','enable_cancellation','cancel_before','cancellation_detail','quantity','rating','is_featured','video','service','available_space','service_starts','service_ends','service_duration','branch','day_off_week','author','status','created_at','updated_at','external_booking','external_link','post_description','deleted_at'];
            $gmz_beauty = GmzBeauty::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_beauty) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty
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
                'message' => "Failed to get gmz_beauty, please try again. {$exception->getMessage()}"
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
            $gmz_beauty = GmzBeauty::where('id', '=', $id)->first();
            if ($gmz_beauty) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty
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
                'message' => "Failed to get gmz_beauty data, please try again. {$exception->getMessage()}"
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

            $gmz_beauty = GmzBeauty::find($id);

           $gmz_beauty->post_title = $input['post_title'];$gmz_beauty->post_slug = $input['post_slug'];$gmz_beauty->post_content = $input['post_content'];$gmz_beauty->location_lat = $input['location_lat'];$gmz_beauty->location_lng = $input['location_lng'];$gmz_beauty->location_address = $input['location_address'];$gmz_beauty->location_zoom = $input['location_zoom'];$gmz_beauty->location_state = $input['location_state'];$gmz_beauty->location_postcode = $input['location_postcode'];$gmz_beauty->location_country = $input['location_country'];$gmz_beauty->location_city = $input['location_city'];$gmz_beauty->thumbnail_id = $input['thumbnail_id'];$gmz_beauty->gallery = $input['gallery'];$gmz_beauty->base_price = $input['base_price'];$gmz_beauty->booking_form = $input['booking_form'];$gmz_beauty->enable_cancellation = $input['enable_cancellation'];$gmz_beauty->cancel_before = $input['cancel_before'];$gmz_beauty->cancellation_detail = $input['cancellation_detail'];$gmz_beauty->quantity = $input['quantity'];$gmz_beauty->rating = $input['rating'];$gmz_beauty->is_featured = $input['is_featured'];$gmz_beauty->video = $input['video'];$gmz_beauty->service = $input['service'];$gmz_beauty->available_space = $input['available_space'];$gmz_beauty->service_starts = $input['service_starts'];$gmz_beauty->service_ends = $input['service_ends'];$gmz_beauty->service_duration = $input['service_duration'];$gmz_beauty->branch = $input['branch'];$gmz_beauty->day_off_week = $input['day_off_week'];$gmz_beauty->author = $input['author'];$gmz_beauty->status = $input['status'];$gmz_beauty->created_at = $input['created_at'];$gmz_beauty->updated_at = $input['updated_at'];$gmz_beauty->external_booking = $input['external_booking'];$gmz_beauty->external_link = $input['external_link'];$gmz_beauty->post_description = $input['post_description'];$gmz_beauty->deleted_at = $input['deleted_at'];

            $res = $gmz_beauty->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_beauty
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_beauty"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_beauty, please try again. {$exception->getMessage()}"
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
            $res = GmzBeauty::find($id)->delete();
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
                    'data' => "Failed to delete gmz_beauty"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_beauty, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

