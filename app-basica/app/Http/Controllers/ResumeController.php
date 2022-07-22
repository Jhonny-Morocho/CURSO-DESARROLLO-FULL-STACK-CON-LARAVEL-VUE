<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
//personalizar validacion
//use Illuminate\Validation\Rule;¿
use Illuminate\Validation\Rule;
//use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;
class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // para la autenticacion
    //tambien puedo crear un contructor asi// si no esta atuenticado no pude realizar las demas operaciones
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $resumes=auth()->user()->resumes;
        return view('resumes.index',compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //enviar informacion desde el controladro a la vista
        //$data=120;
        //return view('resumes.create',['data'=>$data]);
        return view('resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            //code...
            $user=auth()->user();
            $resume=$user->resumes()->where('title',$request->title)->first();
            if($resume){
                return back()
                        ->withErrors(['title'=>'Yo already a resumes whit this title'])
                        ->withInput(['title'=>$request->title]);
            }
            $resume= $user->resumes()->create([
                'title'=>$request['title'],
                'name'=>$user->name,
                'email'=>$user->email,
            ]);
            return redirect()->route('resumes.index')->with('alert',['type'=>'success','message'=>'Resume guardado']);
        } catch (\Throwable $th) {
            return redirect()->route('resumes.index')->with('alert',['type'=>'success','message'=>'Error al guardar resume']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        //
        return view('resumes.edit',compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
/*         return  (    Rule::unique('users')->ignore($resume->user_id));
        return (Rule::unique('resumes'));
        return (Resume::get()->where('user_id',1))->ignore();
        return (Rule::unique('resume')->where(fn($query)=>$query->where('user_id'),1)); */
        try {
            //code...
            $data=$request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'website'=>'nullable|url',
                'picture'=>'nullable|image',
                'about'=>'nullable|string',
                'title'=> ['required',Rule::unique('resumes')
                            ->where(fn($query)=>$query->where('user_id',$resume->user_id)
                            )->ignore($resume->id)]
            ]);
            if(array_key_exists('picture', $data)){
             $picture=$data['picture']->store('pictures','public');
             Image::make(public_path("storage/$picture"))->fit(800,800)->save();
             $data['picture']=$picture;
            }
            $resume->update($data);
            return redirect()->route('resumes.index')->with('alert',['type'=>'success','message'=>'Resume actulizado']);
        } catch (\Throwable $th) {
            return redirect()->route('resumes.index')->with('alert',['type'=>'danger','message'=>'Error al actulizar resume']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
