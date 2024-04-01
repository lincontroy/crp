<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use Illuminate\Support\Facades\Validator;

class GlobalController extends Controller
{

    /**
     * Funtion for get state under a country
     * @param country_id
     * @return json $state list
     */
    public function getStates(Request $request) {
        $request->validate([
            'country_id' => 'required|integer',
        ]);
        $country_id = $request->country_id;
        // Get All States From Country
        $country_states = get_country_states($country_id);
        return response()->json($country_states,200);
    }


    public function getCities(Request $request) {
        $request->validate([
            'state_id' => 'required|integer',
        ]);

        $state_id = $request->state_id;
        $state_cities = get_state_cities($state_id);

        return response()->json($state_cities,200);
        // return $state_id;
    }


    public function getCountries(Request $request) {
        $countries = get_all_countries();

        return response()->json($countries,200);
    }


    public function getTimezones(Request $request) {
        $timeZones = get_all_timezones();

        return response()->json($timeZones,200);
    }

    public function userInfo(Request $request) {
        $validator = Validator::make($request->all(),[
            'text'      => "required|string",
        ]);

        if($validator->fails()) {
            return Response::error($validator->errors(),null,400);
        }

        $validated = $validator->validate();

        $field_name = "username";
        if(check_email($validated['text'])) {
            $field_name = "email";
        }

        try{
            $user = User::notAuth()->where($field_name,$validated['text'])->first();
        }catch(Exception $e) {
            dd($e);
            $error = ['error' => ['Something went wrong!. Please try again.']];
            return Response::error($error,null,500);
        }

        $success = ['success' => ['User available']];
        return Response::success($success,$user,200);
    }
}
