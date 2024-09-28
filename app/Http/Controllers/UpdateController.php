<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function edit($id)
    {
        $updates = DB::table('updates')->where('id' , '=' , 1)->first();

        return view('updates.edit' ,compact('updates'));
    }

    public function update(Request $request, $id)
    {
        $updates = Update::find($id);
        $updates->twitter = $request->get('twitter');
        $updates->facebook = $request->get('facebook');
        $updates->instagram = $request->get('instagram');
        $updates->google = $request->get('google');



        $updates->update();

        return redirect('updates/{1}/edit')->with('success','Socials updated successfully');
    }


}
