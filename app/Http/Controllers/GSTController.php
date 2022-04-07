<?php

namespace App\Http\Controllers;

use App\Models\GST;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GSTController extends Controller
{
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'date' => 'required',
            'bill_number' => 'required',
            'party_name_and_address' => 'required',
            'hsnsac' => 'required',
            'gstin' => 'required',
            'gross_total' => 'required',
            'gst_percentage' => 'required',
            'gst_value' => 'required',
            'user_id'=>'string',
            'total' => 'required'
        ]);
        $attributes['user_id'] = Auth::user()->id;
        GST::create($attributes);
        return back()->with('success', 'Data added successfully!');
    }

    public function show(Request $request)
    {
        $user = Auth::user();

        $gst_data = collect($user->gst->all());
        if ($request->from && $request->to) {
            $gst_data = $gst_data->whereBetween('date', [$request->from, $request->to]);
        }

        return view('data', [
            'data' => $gst_data,
            'user' => $user
        ]);

    }

    public function edit(GST $gst)
    {
        return view('edit',['gst'=>$gst]);
    }

    public function update(GST $gst)
    {
        $attributes = request()->validate([
            'date' => 'required',
            'bill_number' => 'required',
            'party_name_and_address' => 'required',
            'hsnsac' => 'required',
            'gstin' => 'required',
            'gross_total' => 'required',
            'gst_percentage' => 'required',
            'gst_value' => 'required',
            'total' => 'required'
        ]);
        $gst->update($attributes);

        return back()->with('success','Data updated');
    }

    public function destroy(GST $gst)
    {
        $gst->delete();

        return back()->with('success','Data Deleted');
    }
}
