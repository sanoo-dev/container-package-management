<?php

namespace App\Jobs;

use App\Models\Container;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateContainerPackage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    private $container;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, Container $container)
    {
        $this->request = $request;
        $this->container = $container->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Update or create if have new container package have container_id = container->id into database
        for ($i = 0; $i < count($this->request['style_noes']); $i++) {

            $this->container->packages()->updateOrCreate([
                'id' => $this->request['package_ids'][$i] ?? null,
            ], [
                'style_no' => $this->request['style_noes'][$i],
                'uom' => $this->request['uoms'][$i],
                'prefix' => $this->request['prefixes'][$i],
                'suffix' => $this->request['suffixes'][$i],
                'height' => $this->request['heights'][$i],
                'width' => $this->request['widths'][$i],
                'length' => $this->request['lengths'][$i],
                'weight' => $this->request['weights'][$i],
                'upc' => $this->request['upcs'][$i],
                'size1' => $this->request['size1s'][$i],
                'color1' => $this->request['color1s'][$i],
                'size2' => $this->request['size2s'][$i],
                'color2' => $this->request['color2s'][$i],
                'size3' => $this->request['size3s'][$i],
                'color3' => $this->request['color3s'][$i],
                'carton' => $this->request['cartons'][$i],
            ]);
        }
    }
}
