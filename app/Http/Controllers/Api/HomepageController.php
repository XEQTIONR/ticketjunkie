<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\ShowSlot;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $venues = DB::table('venues')
            ->select('city')
            ->distinct()
            ->get();


        // upcoming shows ordered by the slot dates.
        $shows = Show::with(['showSlots' => function ($query) {
            $query->where('starts_at', '>', Carbon::now())
                ->orderBy('starts_at');
        }, 'showSlots.venue'])->whereHas('showSlots', function (Builder $query) {
                $query->where('starts_at', '>', Carbon::now());
        })
            ->orderBy(
                ShowSlot::select('starts_at')
                    ->whereColumn('show_id', 'shows.id')
                    ->orderBy('starts_at')
                    ->limit(1)
            )
            ->get();

        return compact('shows', 'venues');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
