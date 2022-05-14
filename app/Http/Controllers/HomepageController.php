<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\HomepageController as Controller;
use App\Models\Show;
use App\Models\ShowSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Inertia\Inertia;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        //return parent::index();
        return Inertia::render('Home', parent::index());
    }
}
// phpcs:ignoreFile
