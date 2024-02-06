<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzHotel;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_hotel = GmzHotel::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_hotel) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_hotel
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
                'message' => "Failed to get gmz_hotel, please try again. {$exception->getMessage()}"
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
            $gmz_hotel = GmzHotel::create($request->all());
            $gmz_hotel->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_hotel
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_hotel, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','extra_services','hotel_star','hotel_logo','video','policy','checkin_time','checkout_time','min_day_booking','min_day_stay','nearby_common','nearby_education','nearby_health','nearby_top_attractions','nearby_restaurants_cafes','nearby_natural_beauty','nearby_airports','faq','enable_cancellation','cancel_before','cancellation_detail','property_type','hotel_facilities','hotel_services','rating','is_featured','author','status','created_at','updated_at','booking_form','external_booking','external_link','post_description','deleted_at'];
            $gmz_hotel = GmzHotel::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_hotel) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_hotel
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
                'message' => "Failed to get gmz_hotel, please try again. {$exception->getMessage()}"
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
            $gmz_hotel = GmzHotel::where('id', '=', $id)->first();
            if ($gmz_hotel) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_hotel
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
                'message' => "Failed to get gmz_hotel data, please try again. {$exception->getMessage()}"
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

            $gmz_hotel = GmzHotel::find($id);

           $gmz_hotel->post_title = $input['post_title'];$gmz_hotel->post_slug = $input['post_slug'];$gmz_hotel->post_content = $input['post_content'];$gmz_hotel->location_lat = $input['location_lat'];$gmz_hotel->location_lng = $input['location_lng'];$gmz_hotel->location_address = $input['location_address'];$gmz_hotel->location_zoom = $input['location_zoom'];$gmz_hotel->location_state = $input['location_state'];$gmz_hotel->location_postcode = $input['location_postcode'];$gmz_hotel->location_country = $input['location_country'];$gmz_hotel->location_city = $input['location_city'];$gmz_hotel->thumbnail_id = $input['thumbnail_id'];$gmz_hotel->gallery = $input['gallery'];$gmz_hotel->base_price = $input['base_price'];$gmz_hotel->extra_services = $input['extra_services'];$gmz_hotel->hotel_star = $input['hotel_star'];$gmz_hotel->hotel_logo = $input['hotel_logo'];$gmz_hotel->video = $input['video'];$gmz_hotel->policy = $input['policy'];$gmz_hotel->checkin_time = $input['checkin_time'];$gmz_hotel->checkout_time = $input['checkout_time'];$gmz_hotel->min_day_booking = $input['min_day_booking'];$gmz_hotel->min_day_stay = $input['min_day_stay'];$gmz_hotel->nearby_common = $input['nearby_common'];$gmz_hotel->nearby_education = $input['nearby_education'];$gmz_hotel->nearby_health = $input['nearby_health'];$gmz_hotel->nearby_top_attractions = $input['nearby_top_attractions'];$gmz_hotel->nearby_restaurants_cafes = $input['nearby_restaurants_cafes'];$gmz_hotel->nearby_natural_beauty = $input['nearby_natural_beauty'];$gmz_hotel->nearby_airports = $input['nearby_airports'];$gmz_hotel->faq = $input['faq'];$gmz_hotel->enable_cancellation = $input['enable_cancellation'];$gmz_hotel->cancel_before = $input['cancel_before'];$gmz_hotel->cancellation_detail = $input['cancellation_detail'];$gmz_hotel->property_type = $input['property_type'];$gmz_hotel->hotel_facilities = $input['hotel_facilities'];$gmz_hotel->hotel_services = $input['hotel_services'];$gmz_hotel->rating = $input['rating'];$gmz_hotel->is_featured = $input['is_featured'];$gmz_hotel->author = $input['author'];$gmz_hotel->status = $input['status'];$gmz_hotel->created_at = $input['created_at'];$gmz_hotel->updated_at = $input['updated_at'];$gmz_hotel->booking_form = $input['booking_form'];$gmz_hotel->external_booking = $input['external_booking'];$gmz_hotel->external_link = $input['external_link'];$gmz_hotel->post_description = $input['post_description'];$gmz_hotel->deleted_at = $input['deleted_at'];

            $res = $gmz_hotel->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_hotel
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_hotel"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_hotel, please try again. {$exception->getMessage()}"
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
            $res = GmzHotel::find($id)->delete();
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
                    'data' => "Failed to delete gmz_hotel"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_hotel, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

