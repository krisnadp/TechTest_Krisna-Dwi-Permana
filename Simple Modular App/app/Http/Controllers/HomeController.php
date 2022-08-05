<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Institute $institute)
    {

        $institute = Institute::all();
        return view('home', compact('institute'));
    }

    public function store(Request $request) 
    {

        $institute = new Institute;
        $institute->name = $request->name;
        $institute->description = $request->description;
        $institute->save();
        return redirect( route('home') );

    }

    public function update(Request $request, Institute $institute)
    {
        Institute::where('id', $request->id)
            ->update([
        'name' => $request->name,
        'description' => $request->description,
        ]);
        $institute->update($request->all());
        return redirect( route('home') );
    }

    public function destroy(Request $request) 
    {

        $institute = Institute::where('id', $request->id)->first();
        if($institute) {
            $institute->delete();
        }
        return redirect( route('home') );

    }

}
