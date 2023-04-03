<?php

namespace Kayise\Test\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kayise\Test\Models\Test;
use Kayise\Test\Mail\TestMailable;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index(){
        return view('test::test');
        
       }
    
       public function add(Request $request){

        Mail::to(config('test.send_email_to'))->send(new TestMailable($request->testimony));

        $request->validate([
            'icon' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '_' . $request->name . '.' . $request->icon->extension();

        $request->icon->move(public_path('images'), $newImageName);
        

        $test = new Test;
        $test->icon = $newImageName;
        $test->name = $request->name;
        $test->ratings = $request->ratings;
        $test->testimony = $request->testimony;
        $test->save();
        return redirect(route('test'));
       }
}
