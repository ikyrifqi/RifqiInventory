<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jurusan;



class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Jurusan::paginate(5);
        // $fakultas = Fakultas::all();

        // return view('jurusan.index', compact('data','fakultas'));


        $data = Jurusan::when($request->search, function($query) use($request){
            $query->where('nama_jurusan', 'LIKE', '%'.$request->search.'%')
             ->orWhere('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'id_fakultas', '=', 'jurusan.fakultas_id')->orderBy('id', 'asc')->paginate(5);

        return view('jurusan.index', compact('data'));

    }


    // public function search(Request $request)
    // {
    //     $fakultas = Fakultas::all();
    //     $srch = $request->search;
    //     $srchFakultas = DB::table('Fakultas')
    //                         ->select('id')
    //                         ->where('name', 'LIKE', '%'.$srch.'%')
    //                         ->first();

    //     if(is_object($srchFakultas)){
    //         $src = get_object_vars($srchFakultas);
    //         $data = DB::table('Jurusan')->where('fakultas_id', '=', $src)->paginate(10);

    //         return view('jurusan.index', compact('data','fakultas'));
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);

      
        $form_data = array(
            'nama_jurusan'    =>  $request->nama_jurusan,
            'fakultas_id'     =>  $request->fakultas_id,
           
        );

        Jurusan::create($form_data);

        return redirect()->route('jurusan.index')->with('success', 'Data Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);

        return view('jurusan.edit', compact('data'));
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
        $request->validate([
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);

        $data = Jurusan::find($id);
        $data->nama_jurusan = $request->input('nama_jurusan');
        $data->fakultas_id = $request->input('fakultas_id');
        $data->save();
        return redirect()->route('jurusan.index')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Jurusan::whereId($id)->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data is successfully deleted ');

        
    }
}
