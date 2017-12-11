<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Admin;
use App\Explore;

class ExploreController extends Controller
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
		if($user->cakupan=='daerah'){
			$newss = DB::table('explores')->count();
        }
        else {
            return 'salah';
        }
        // $newss = News::latest()->paginate(5);
        $explores = DB::table('explores')->where('admin', $user->email)->latest()->paginate(5);
        return view('explore.index',compact('explores', 'admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('explore.create');
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
            'nama_wisata' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg|max:15000',
            'alamat' => 'required',
            'lang' => 'required',
            'long' => 'required',
            ]);
            $data = $request->only('nama_wisata', 'foto', 'alamat', 'lang', 'long');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/explore";
                $data['foto'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;

    
            }

        Explore::create($data);
        return redirect()->route('explore.index')
            ->with('success','New Recreation Spot has been created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $explores = Explore::find($id);
        return view('explore.show',compact('explores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $explores = Explore::find($id);
        return view('explore.edit',compact('explores'));
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
        $user = Auth::user();
        request()->validate([
            'nama_wisata' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg|max:15000',
            'alamat' => 'required',
            'lang' => 'required',
            'long' => 'required',
            ]);
            $data = $request->only('nama_wisata', 'foto', 'alamat', 'lang', 'long');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/explore";
                $data['foto'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;

    
            }

        Explore::find($id)->update($data);
        return redirect()->route('explore.index')
            ->with('success','New Recreation Spot been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Explore::find($id)->delete();
        return redirect()->route('explore.index')
                        ->with('success','Recreation Spot has been deleted successfully');
    }
}