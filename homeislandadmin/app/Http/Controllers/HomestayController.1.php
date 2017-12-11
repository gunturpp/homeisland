<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;
use App\User;
use Session;
use Validator;
use File;
use Html;
use App\Homestay;

class HomestayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
		// if($user->cakupan=='daerah' || $user->cakupan=='pusat' ){
		// 	$newsss = DB::table('newss')
		// 	->count();
        // }
        // else {
        //     return 'salah';
        // }
        $homestays = Homestay::latest()->paginate(5);
        return view('homestays.index',compact('homestays'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homestays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'required|image|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only(
                'nama_homestay','harga', 'kuota', 'admin','lang','long','foto_1','foto_2','foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_1'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
            $photo2 = "";
            if ($request->hasFile('foto_2')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_2;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_2'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo2 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
            $photo3 = "";
            if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_3;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo3 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
    
        Homestay::create($data);
        return redirect()->route('homestays.index')
            ->with('success','New homestay has been created successfully');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.show',compact('homestay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.edit',compact('homestay'));
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
        // dd($request -> all());
        $user = Auth::user();
        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'required|image|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only(
                'nama_homestay','harga', 'kuota', 'admin','lang','long','foto_1','foto_2','foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_1'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
            $photo2 = "";
            if ($request->hasFile('foto_2')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_2;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_2'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo2 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
            $photo3 = "";
            if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_3;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://172.18.16.36/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo3 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;    
            }
        Homestay::find($id)->update($data);
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homestay::find($id)->delete();
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been deleted successfully');
    }

    // public function deletePhoto($filename){
    //     $path = public_path() . DIRECTORY_SEPARATOR . 'images/homestay'.$filename;
    //     return File::delete($path);
    // }
}