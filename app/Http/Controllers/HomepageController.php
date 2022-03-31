<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\HomepageController as Controller;
use App\Models\Show;
use App\Models\ShowSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class HomepageController extends Controller
{
    public function index()
    {
        return parent::index();
    }
}
// phpcs:ignoreFile
