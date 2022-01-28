<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Services\Shortener;
use App\Services\TitleCrawler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('index', [
            'sites' => Site::all(),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }

    public function shortUrls()
    {
        $sites = Site::all();
        $short = new Shortener();
        foreach ($sites as $site) {
            $site->short = 'https://short.url/' . $short->encode($site->id);
            $site->save();
        }

        return redirect()->back();
    }

    public function crawlTitles()
    {
        $sites = Site::all();
        $crawler = new TitleCrawler();
        foreach ($sites as $site) {
            $site->title = $crawler->getUrlTitle($site->url);
            $site->save();
        }

        return redirect()->back();
    }

    public function resetShortUrls()
    {
        DB::table('sites')->update(['short' => '']);

        return redirect()->back();
    }

}
