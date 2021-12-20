<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portainer;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PortainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->level !=3) return view('home');
        $portainers = Portainer::all();
        return view('portainers.index',compact('portainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortainerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortainerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portainer  $portainer
     * @return \Illuminate\Http\Response
     */
    public function show(Portainer $portainer)
    {
        //
        if (Auth::user()->level !=3) return view('home');
        $url = $portainer->url.'api/auth';
        $response = Http::post($url, [
            'username' => $portainer->usr,
            'password' => $portainer->pwd,
        ]);
        $token = $response['jwt'];

        $url = $portainer->url.'api/status';
        $response = Http::withToken($token)->get($url);
        $status = $response;

        $url = $portainer->url.'api/stacks';
        $response = Http::withToken($token)->get($url);
        $stacks = $response->collect();

        $generator = new \Nubs\RandomNameGenerator\Vgng();
        $words = str_word_count(strtolower($generator->getName()), 1);
        $wkname = $words[0].'-';
        $generator = new \Nubs\RandomNameGenerator\Alliteration();
        $words = str_word_count(strtolower($generator->getName()), 1);
        $wkname .= $words[0].'-'.$words[1];
        $wkname = preg_replace('/[^A-Za-z0-9\-]/', '', $wkname);

        return view('portainers.show',compact('status','stacks','wkname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portainer  $portainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Portainer $portainer)
    {
        //
        if (Auth::user()->level !=3) return view('home');
        return view('portainers.edit',compact('portainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortainerRequest  $request
     * @param  \App\Models\Portainer  $portainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portainer $portainer)
    {
        //
        if (Auth::user()->level !=3) return view('home');
        $request->validate([
            'url' => 'required',
            'usr' => 'required',
            'pwd' => 'required',
            'end' => 'required',
        ]);
        $portainer->url = $request->url;
        $portainer->usr = $request->usr;
        $portainer->pwd = $request->pwd;
        $portainer->end = $request->end;
        $portainer->save();
        return redirect()->route('portainers.index')->with('success','Server updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portainer  $portainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portainer $portainer)
    {
        //
    }
}
