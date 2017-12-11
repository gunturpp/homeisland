<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;
// use Intervention\Image\ImageManagerStatic as Image;

use Image;
use DB;
use App\Admin;
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
        // dd($request->all());
        
        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'required|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('nama_homestay', 'harga', 'lang', 'long', 'foto_1', 'foto_2', 'foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
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
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_2'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                // return $getPath;    
            }

            $photo3 = "";        
            if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_3;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                // return $getPath;    
            }

            Homestay::create($request->all());
            return redirect()->route('homestays.index')
                            ->with('success','Homestay has been created successfully');
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
        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'required|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('nama_homestay', 'harga', 'lang', 'long', 'foto_1', 'foto_2', 'foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
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
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_2'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                // return $getPath;    
            }

            $photo3 = "";        
            if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_3;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/homestay";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                // return $getPath;    
            }

            // $olddata = Homestay::find($id);
            // // $data = $request->only('nama_homestay', 'harga', 'kuota', 'lat', 'long', 'foto_1', 'foto_2', 'foto_3');
            // $data = $request->except(['image']);            
            // $photo1 = "";        
            // if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
            //     $ip = request()->ip();
            //     $file = $request->foto_1;
            //     $fileName = $file->getClientOriginalName();
            //     $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
            //     $destinationPath = "images/homestay";
            //     $data['foto_1'] = '../'. $destinationPath . '/' . $fileName;
            //     $file -> move($destinationPath, $getPath,$fileName);
            //     $photo1 = $fileName;
            //     // return $getPath;

            //     if($olddata->image !== '') $this->deletePhoto($olddata->image);
            // }
    
            // $photo2 = "";        
            // if ($request->hasFile('foto_2')){ //has file itu meminta nama databasenya bukan classnya
            //     $ip = request()->ip();
            //     $file = $request->foto_2;
            //     $fileName = $file->getClientOriginalName();
            //     $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
            //     $destinationPath = "images/homestay";
            //     $data['foto_2'] = '../'. $destinationPath . '/' . $fileName;
            //     $file -> move($destinationPath, $getPath,$fileName);
            //     $photo2 = $fileName;
            //     // return $getPath;

            //     if($olddata->image !== '') $this->deletePhoto($olddata->image);
            // }

            // $photo3 = "";        
            // if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
            //     $ip = request()->ip();
            //     $file = $request->foto_3;
            //     $fileName = $file->getClientOriginalName();
            //     $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
            //     $destinationPath = "images/homestay";
            //     $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
            //     $file -> move($destinationPath, $getPath,$fileName);
            //     $photo1 = $fileName;
            //     // return $getPath;

            //     if($olddata->image !== '') $this->deletePhoto($olddata->image);
            // }

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