<?php

namespace App\Http\Controllers;

use App\Company;
use App\Stand;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class StandController extends BaseController
{

    public function book(Request $request, $id)
    {
        $stand = Stand::find($id);

        if (!$stand) {
            return response()->json(['error' => 'Not Found'], 404);
        } elseif ($stand->company_id) {
            return response()->json(['error' => 'Is booked'], 400);
        }

        $this->validate($request, [
            'name'         => 'required|max:255',
            'email'        => 'required|email|max:255',
            'contact_name' => 'required|max:255',
            'contacts'     => 'required',
//            'logo'         => 'required|image',
        ]);

//        $path = $request->logo->store('images');
        //$company = Company::create(array_merge($request->all(), ['logo', $path]));
        $company = Company::create($request->all());


        $wasUpdated = Stand::where('id', $stand->id)
            ->whereNull('company_id')
            ->update(['company_id' => $company->id]);

        if (!$wasUpdated) {
            $company->delete();

            return response()->json(['error' => 'Try Again'], 400);
        }

        return response()->json([], 201);
    }
}
