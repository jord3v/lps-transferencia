<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class LandingPageController extends Controller
{

    private $landingPage;
    private $setting;
    private $zip;

    public function __construct(LandingPage $landingPage, Setting $setting, ZipArchive $zip)
    {
        $this->landingPage = $landingPage;
        $this->setting = $setting;
        $this->zip = $zip;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingPages = $this->landingPage->get();
        return view('dashboard.landing-pages.index', compact('landingPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.landing-pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('file')->store('zip');
        $settings = $this->setting->first();
        $zip = $this->zip;

        if ($zip->open(storage_path('app/'.$file)) === TRUE) {
            $zip->extractTo($settings->DocumentRoot.$request->domain);
            $zip->close();
            $landingPage = auth()->user()->landingPages()->create($request->all());   
            return redirect()->route('landing-pages.edit', $landingPage->id)->with('success', 'Criado com sucesso');
        } else {
            return 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $landingPage = $this->landingPage->find($id);
        $settings = $this->setting->first();
        return view('dashboard.landing-pages.edit', compact('landingPage', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $landingPage = $this->landingPage->find($id);
        $landingPage->update($request->all());
        Storage::put('public/landing-pages/'.$landingPage->domain.'/index.php', $request->code);
        
        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landingPage = $this->landingPage->find($id);
        $landingPage->delete();
        $settings = $this->setting->first();
        File::deleteDirectory($settings->DocumentRoot.$landingPage->domain);
        return redirect()->back()->with('success', 'Excluído com sucesso');
    }
}
