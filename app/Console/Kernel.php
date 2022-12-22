<?php

namespace App\Console;

use App\Models\Newsletter;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {


            $oldest = DB::table('newsletters')->where('deleted_at', NULL)->first();
            $newest = DB::table('newsletters')->where('deleted_at', NULL)->orderBy('id', 'desc')->first();
            $oldest_id = (int)$oldest->id;
            $newest_id = (int)$newest->id + 1;

            info((int)$oldest_id);

            $delete = Newsletter::find($oldest_id)->delete();
            DB::table('newsletters')
                ->where('id', $oldest_id)
                ->update(['id' => $newest_id]);

            $delete = Newsletter::find($oldest_id)->delete();
            $update = Newsletter::find($oldest_id)->update([
                'id' => 124,
            ]);
            $update = Newsletter::find($oldest_id)->update([
                'id' => $newest_id,
            ]);
        })->everyTwoMinutes();
        /* $schedule->call('\App\Http\Controllers\AuthController@dashboard')->everyMinute(); */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
