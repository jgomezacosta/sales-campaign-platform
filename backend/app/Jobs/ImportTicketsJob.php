<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\TicketImporter;

class ImportTicketsJob implements ShouldQueue
{
    protected $path;

    //use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $fullPath = storage_path('app/'.$this->path);

        $rows = Excel::toArray([], $fullPath);

        $rows = $rows[0];

        foreach ($rows as $index => $row) {

            if ($index === 0) {
                continue;
            }

            TicketImporter::importRow($row);
        }
    }
}
