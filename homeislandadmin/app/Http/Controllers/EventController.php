<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Admin;
use App\Event;

class EventController extends Controller
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
			$events = DB::table('events')->count();
        }
        else {
            return 'salah';
        }
        // $newss = News::latest()->paginate(5);
        $events = DB::table('events')->where('admin', $user->email)->latest()->paginate(5);
        return view('event.index',compact('events', 'admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'judul' => 'required',
<<<<<<< HEAD
            'foto_1' => 'required|mimes:jpeg,png,jpg|max:15000',
            'deskripsi' => 'required',
=======
            'date_start' => 'required',
            'date_end' => 'required',
            'deskripsi' => 'required',
            'id_line' => 'nullable',
            'id_ig' => 'nullable',
            'web' => 'nullable',
>>>>>>> 4c12a8ef7168df329a9fbac486402605aaf02d4f
            'lat' => 'required',
            'long' => 'required',
            'foto_1' => 'required|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('judul', 'date_start', 'date_end', 'deskripsi', 'id_line', 'id_ig', 'web', 'lat', 'long', 'foto_1', 'foto_2', 'foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/event";
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
                $destinationPath = "images/event";
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
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/event";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo3 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;

    
            }

        Event::create($data);
        return redirect()->route('event.index')
            ->with('success','New Event has been created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::find($id);
        return view('event.show',compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('event.edit',compact('events'));
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
            'judul' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'deskripsi' => 'required',
            'id_line' => 'nullable',
            'id_ig' => 'nullable',
            'web' => 'nullable',
            'lat' => 'required',
            'long' => 'required',
            'foto_1' => 'required|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('judul', 'date_start', 'date_end', 'deskripsi', 'id_line', 'id_ig', 'web', 'lat', 'long', 'foto_1', 'foto_2', 'foto_3');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto_1;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/event";
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
                $destinationPath = "images/event";
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
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/event";
                $data['foto_3'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo3 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;

    
            }

        Event::find($id)->update($data);
        return redirect()->route('event.index')
            ->with('success','New Event has been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('event.index')
                        ->with('success','Event has been deleted successfully');
    }
}
