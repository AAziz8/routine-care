<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class logoController extends Controller
{
    public function edit($id)
    {
        $logos = DB::table('logos')->where('id' , '=' , 1)->first();

        return view('logos.edit' ,compact('logos'));
    }

    public function update(Request $request, $id)
    {
        $logos = Logo::find($id);
        $logos->name = $request->get('name');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('image'), $filename);
            $logos->logo = $filename;
        }
        $logos->save();

        return redirect('logos/1/edit')->with('success', 'Logo updated successfully');
    }

}
