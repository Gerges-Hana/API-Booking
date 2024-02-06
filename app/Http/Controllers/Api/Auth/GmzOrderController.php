<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GmzOrder;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class GmzOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        
            $gmz_order = GmzOrder::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_order) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_order
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
                'message' => "Failed to get gmz_order, please try again. {$exception->getMessage()}"
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
            $gmz_order = GmzOrder::create($request->all());
            $gmz_order->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $gmz_order
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store gmz_order, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','sku','order_token','description','post_id','total','number','buyer','owner','payment_type','checkout_data','token_code','currency','commission','start_date','end_date','start_time','end_time','post_type','payment_status','transaction_id','status','money_to_wallet','first_name','last_name','email','phone','address','city','country','postcode','note','change_log','created_at','updated_at'];
            $gmz_order = GmzOrder::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($gmz_order) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_order
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
                'message' => "Failed to get gmz_order, please try again. {$exception->getMessage()}"
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
            $gmz_order = GmzOrder::where('id', '=', $id)->first();
            if ($gmz_order) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_order
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
                'message' => "Failed to get gmz_order data, please try again. {$exception->getMessage()}"
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

            $gmz_order = GmzOrder::find($id);

           $gmz_order->sku = $input['sku'];$gmz_order->order_token = $input['order_token'];$gmz_order->description = $input['description'];$gmz_order->post_id = $input['post_id'];$gmz_order->total = $input['total'];$gmz_order->number = $input['number'];$gmz_order->buyer = $input['buyer'];$gmz_order->owner = $input['owner'];$gmz_order->payment_type = $input['payment_type'];$gmz_order->checkout_data = $input['checkout_data'];$gmz_order->token_code = $input['token_code'];$gmz_order->currency = $input['currency'];$gmz_order->commission = $input['commission'];$gmz_order->start_date = $input['start_date'];$gmz_order->end_date = $input['end_date'];$gmz_order->start_time = $input['start_time'];$gmz_order->end_time = $input['end_time'];$gmz_order->post_type = $input['post_type'];$gmz_order->payment_status = $input['payment_status'];$gmz_order->transaction_id = $input['transaction_id'];$gmz_order->status = $input['status'];$gmz_order->money_to_wallet = $input['money_to_wallet'];$gmz_order->first_name = $input['first_name'];$gmz_order->last_name = $input['last_name'];$gmz_order->email = $input['email'];$gmz_order->phone = $input['phone'];$gmz_order->address = $input['address'];$gmz_order->city = $input['city'];$gmz_order->country = $input['country'];$gmz_order->postcode = $input['postcode'];$gmz_order->note = $input['note'];$gmz_order->change_log = $input['change_log'];$gmz_order->created_at = $input['created_at'];$gmz_order->updated_at = $input['updated_at'];

            $res = $gmz_order->update();
            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $gmz_order
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update gmz_order"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update gmz_order, please try again. {$exception->getMessage()}"
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
            $res = GmzOrder::find($id)->delete();
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
                    'data' => "Failed to delete gmz_order"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete gmz_order, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

