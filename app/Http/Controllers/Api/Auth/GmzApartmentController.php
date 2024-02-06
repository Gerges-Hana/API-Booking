<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzApartment;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_apartment = GmzApartment::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_apartment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment
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
                'message' => "Failed to get gmz_apartment, please try again. {$exception->getMessage()}"
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
            $gmz_apartment = GmzApartment::create($request->all());
            $gmz_apartment->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_apartment
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_apartment, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','number_of_guest','number_of_bedroom','number_of_bathroom','size','min_stay','max_stay','booking_type','extra_services','apartment_type','apartment_amenity','enable_cancellation','cancel_before','cancellation_detail','checkin_time','checkout_time','rating','is_featured','discount_by_day','video','author','status','created_at','updated_at','external_booking','external_link','post_description','ical','deleted_at'];
            $gmz_apartment = GmzApartment::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_apartment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment
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
                'message' => "Failed to get gmz_apartment, please try again. {$exception->getMessage()}"
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
            $gmz_apartment = GmzApartment::where('id', '=', $id)->first();
            if ($gmz_apartment) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment
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
                'message' => "Failed to get gmz_apartment data, please try again. {$exception->getMessage()}"
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

            $gmz_apartment = GmzApartment::find($id);

           $gmz_apartment->post_title = $input['post_title'];$gmz_apartment->post_slug = $input['post_slug'];$gmz_apartment->post_content = $input['post_content'];$gmz_apartment->location_lat = $input['location_lat'];$gmz_apartment->location_lng = $input['location_lng'];$gmz_apartment->location_address = $input['location_address'];$gmz_apartment->location_zoom = $input['location_zoom'];$gmz_apartment->location_state = $input['location_state'];$gmz_apartment->location_postcode = $input['location_postcode'];$gmz_apartment->location_country = $input['location_country'];$gmz_apartment->location_city = $input['location_city'];$gmz_apartment->thumbnail_id = $input['thumbnail_id'];$gmz_apartment->gallery = $input['gallery'];$gmz_apartment->base_price = $input['base_price'];$gmz_apartment->booking_form = $input['booking_form'];$gmz_apartment->number_of_guest = $input['number_of_guest'];$gmz_apartment->number_of_bedroom = $input['number_of_bedroom'];$gmz_apartment->number_of_bathroom = $input['number_of_bathroom'];$gmz_apartment->size = $input['size'];$gmz_apartment->min_stay = $input['min_stay'];$gmz_apartment->max_stay = $input['max_stay'];$gmz_apartment->booking_type = $input['booking_type'];$gmz_apartment->extra_services = $input['extra_services'];$gmz_apartment->apartment_type = $input['apartment_type'];$gmz_apartment->apartment_amenity = $input['apartment_amenity'];$gmz_apartment->enable_cancellation = $input['enable_cancellation'];$gmz_apartment->cancel_before = $input['cancel_before'];$gmz_apartment->cancellation_detail = $input['cancellation_detail'];$gmz_apartment->checkin_time = $input['checkin_time'];$gmz_apartment->checkout_time = $input['checkout_time'];$gmz_apartment->rating = $input['rating'];$gmz_apartment->is_featured = $input['is_featured'];$gmz_apartment->discount_by_day = $input['discount_by_day'];$gmz_apartment->video = $input['video'];$gmz_apartment->author = $input['author'];$gmz_apartment->status = $input['status'];$gmz_apartment->created_at = $input['created_at'];$gmz_apartment->updated_at = $input['updated_at'];$gmz_apartment->external_booking = $input['external_booking'];$gmz_apartment->external_link = $input['external_link'];$gmz_apartment->post_description = $input['post_description'];$gmz_apartment->ical = $input['ical'];$gmz_apartment->deleted_at = $input['deleted_at'];

            $res = $gmz_apartment->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_apartment
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_apartment"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_apartment, please try again. {$exception->getMessage()}"
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
            $res = GmzApartment::find($id)->delete();
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
                    'data' => "Failed to delete gmz_apartment"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_apartment, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

