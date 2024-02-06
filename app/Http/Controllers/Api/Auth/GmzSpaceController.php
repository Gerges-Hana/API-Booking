<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzSpace;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_space = GmzSpace::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_space) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_space
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
                'message' => "Failed to get gmz_space, please try again. {$exception->getMessage()}"
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
            $gmz_space = GmzSpace::create($request->all());
            $gmz_space->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_space
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_space, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','number_of_guest','number_of_bedroom','number_of_bathroom','size','min_stay','max_stay','booking_type','extra_services','space_type','space_amenity','enable_cancellation','cancel_before','cancellation_detail','checkin_time','checkout_time','rating','is_featured','discount_by_day','video','author','status','created_at','updated_at','external_booking','external_link','post_description','ical','deleted_at'];
            $gmz_space = GmzSpace::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_space) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_space
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
                'message' => "Failed to get gmz_space, please try again. {$exception->getMessage()}"
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
            $gmz_space = GmzSpace::where('id', '=', $id)->first();
            if ($gmz_space) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_space
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
                'message' => "Failed to get gmz_space data, please try again. {$exception->getMessage()}"
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

            $gmz_space = GmzSpace::find($id);

           $gmz_space->post_title = $input['post_title'];$gmz_space->post_slug = $input['post_slug'];$gmz_space->post_content = $input['post_content'];$gmz_space->location_lat = $input['location_lat'];$gmz_space->location_lng = $input['location_lng'];$gmz_space->location_address = $input['location_address'];$gmz_space->location_zoom = $input['location_zoom'];$gmz_space->location_state = $input['location_state'];$gmz_space->location_postcode = $input['location_postcode'];$gmz_space->location_country = $input['location_country'];$gmz_space->location_city = $input['location_city'];$gmz_space->thumbnail_id = $input['thumbnail_id'];$gmz_space->gallery = $input['gallery'];$gmz_space->base_price = $input['base_price'];$gmz_space->booking_form = $input['booking_form'];$gmz_space->number_of_guest = $input['number_of_guest'];$gmz_space->number_of_bedroom = $input['number_of_bedroom'];$gmz_space->number_of_bathroom = $input['number_of_bathroom'];$gmz_space->size = $input['size'];$gmz_space->min_stay = $input['min_stay'];$gmz_space->max_stay = $input['max_stay'];$gmz_space->booking_type = $input['booking_type'];$gmz_space->extra_services = $input['extra_services'];$gmz_space->space_type = $input['space_type'];$gmz_space->space_amenity = $input['space_amenity'];$gmz_space->enable_cancellation = $input['enable_cancellation'];$gmz_space->cancel_before = $input['cancel_before'];$gmz_space->cancellation_detail = $input['cancellation_detail'];$gmz_space->checkin_time = $input['checkin_time'];$gmz_space->checkout_time = $input['checkout_time'];$gmz_space->rating = $input['rating'];$gmz_space->is_featured = $input['is_featured'];$gmz_space->discount_by_day = $input['discount_by_day'];$gmz_space->video = $input['video'];$gmz_space->author = $input['author'];$gmz_space->status = $input['status'];$gmz_space->created_at = $input['created_at'];$gmz_space->updated_at = $input['updated_at'];$gmz_space->external_booking = $input['external_booking'];$gmz_space->external_link = $input['external_link'];$gmz_space->post_description = $input['post_description'];$gmz_space->ical = $input['ical'];$gmz_space->deleted_at = $input['deleted_at'];

            $res = $gmz_space->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_space
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_space"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_space, please try again. {$exception->getMessage()}"
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
            $res = GmzSpace::find($id)->delete();
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
                    'data' => "Failed to delete gmz_space"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_space, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

