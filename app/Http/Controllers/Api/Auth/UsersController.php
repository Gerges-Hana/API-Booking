<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $users = Users::paginate($request->paginator, ['*'], 'page', $request->page);
            if ($users) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $users
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
                'message' => "Failed to get users, please try again. {$exception->getMessage()}"
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
            $users = Users::create($request->all());
            $users->save();

            return response([
                'status' => 'success',
                'code' => 1,
                'data' => $users
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to store users, please try again. {$exception->getMessage()}"
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
            $requestData = ['id','first_name','last_name','email','email_verified_at','phone','password','address','request','request_date','avatar','provider','provider_id','payout','remember_token','last_check_notification','created_at','updated_at','description'];
            $users = Users::where(function ($q) use ($requestData, $searchQuery) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$searchQuery}%");
            })->paginate($request->paginator, ['*'], 'page', $request->page);
            if ($users) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $users
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
                'message' => "Failed to get users, please try again. {$exception->getMessage()}"
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
            $users = Users::where('id', '=', $id)->first();
            if ($users) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $users
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
                'message' => "Failed to get users data, please try again. {$exception->getMessage()}"
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

            $users = Users::find($id);

           $users->first_name = $input['first_name'];
           $users->last_name = $input['last_name'];
           $users->email = $input['email'];
           $users->email_verified_at = $input['email_verified_at'];
           $users->phone = $input['phone'];
           $users->password = $input['password'];
           $users->address = $input['address'];
           $users->request = $input['request'];
           $users->request_date = $input['request_date'];
           $users->avatar = $input['avatar'];
           $users->provider = $input['provider'];
           $users->provider_id = $input['provider_id'];
           $users->payout = $input['payout'];
           $users->remember_token = $input['remember_token'];
           $users->last_check_notification = $input['last_check_notification'];
           $users->created_at = $input['created_at'];
           $users->updated_at = $input['updated_at'];
           $users->description = $input['description'];


            $res = $users->update();

            if ($res) {
                return response([
                    'status' => 'success',
                    'code' => 1,
                    'data' => $users
                ], 200);
            }
            return response([
                'status' => 'error',
                'code' => 0,
                'data' => "Failed to update users"
            ], 500);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to update users, please try again. {$exception->getMessage()}"
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
            $res = Users::find($id)->delete();
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
                    'data' => "Failed to delete users"
                ], 500);
            }
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'code' => 0,
                'message' => "Failed to delete users, please try again. {$exception->getMessage()}"
            ], 500);
        }
    }
}

