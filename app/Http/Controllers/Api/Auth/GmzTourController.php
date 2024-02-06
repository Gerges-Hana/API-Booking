<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzTour;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_tour = GmzTour::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_tour) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_tour
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
                'message' => "Failed to get gmz_tour, please try again. {$exception->getMessage()}"
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
            $gmz_tour = GmzTour::create($request->all());
            $gmz_tour->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_tour
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_tour, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','adult_price','children_price','infant_price','booking_form','group_size','duration','booking_type','external_link','extra_services','tour_type','tour_include','tour_exclude','highlight','itinerary','faq','enable_cancellation','cancel_before','cancellation_detail','rating','is_featured','video','author','status','created_at','updated_at','post_description','ical','deleted_at','package_start_date','package_end_date'];
            $gmz_tour = GmzTour::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_tour) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_tour
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
                'message' => "Failed to get gmz_tour, please try again. {$exception->getMessage()}"
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
            $gmz_tour = GmzTour::where('id', '=', $id)->first();
            if ($gmz_tour) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_tour
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
                'message' => "Failed to get gmz_tour data, please try again. {$exception->getMessage()}"
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

            $gmz_tour = GmzTour::find($id);

           $gmz_tour->post_title = $input['post_title'];$gmz_tour->post_slug = $input['post_slug'];$gmz_tour->post_content = $input['post_content'];$gmz_tour->location_lat = $input['location_lat'];$gmz_tour->location_lng = $input['location_lng'];$gmz_tour->location_address = $input['location_address'];$gmz_tour->location_zoom = $input['location_zoom'];$gmz_tour->location_state = $input['location_state'];$gmz_tour->location_postcode = $input['location_postcode'];$gmz_tour->location_country = $input['location_country'];$gmz_tour->location_city = $input['location_city'];$gmz_tour->thumbnail_id = $input['thumbnail_id'];$gmz_tour->gallery = $input['gallery'];$gmz_tour->adult_price = $input['adult_price'];$gmz_tour->children_price = $input['children_price'];$gmz_tour->infant_price = $input['infant_price'];$gmz_tour->booking_form = $input['booking_form'];$gmz_tour->group_size = $input['group_size'];$gmz_tour->duration = $input['duration'];$gmz_tour->booking_type = $input['booking_type'];$gmz_tour->external_link = $input['external_link'];$gmz_tour->extra_services = $input['extra_services'];$gmz_tour->tour_type = $input['tour_type'];$gmz_tour->tour_include = $input['tour_include'];$gmz_tour->tour_exclude = $input['tour_exclude'];$gmz_tour->highlight = $input['highlight'];$gmz_tour->itinerary = $input['itinerary'];$gmz_tour->faq = $input['faq'];$gmz_tour->enable_cancellation = $input['enable_cancellation'];$gmz_tour->cancel_before = $input['cancel_before'];$gmz_tour->cancellation_detail = $input['cancellation_detail'];$gmz_tour->rating = $input['rating'];$gmz_tour->is_featured = $input['is_featured'];$gmz_tour->video = $input['video'];$gmz_tour->author = $input['author'];$gmz_tour->status = $input['status'];$gmz_tour->created_at = $input['created_at'];$gmz_tour->updated_at = $input['updated_at'];$gmz_tour->post_description = $input['post_description'];$gmz_tour->ical = $input['ical'];$gmz_tour->deleted_at = $input['deleted_at'];$gmz_tour->package_start_date = $input['package_start_date'];$gmz_tour->package_end_date = $input['package_end_date'];

            $res = $gmz_tour->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_tour
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_tour"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_tour, please try again. {$exception->getMessage()}"
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
            $res = GmzTour::find($id)->delete();
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
                    'data' => "Failed to delete gmz_tour"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_tour, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

