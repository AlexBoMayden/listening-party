<?php

use App\Models\ListeningParty;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    ListeningParty::whereDate('end_time', '<=', now())->update(['is_active' => false]);
})->everyMinute();
