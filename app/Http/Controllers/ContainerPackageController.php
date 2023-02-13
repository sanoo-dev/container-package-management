<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContainerPackageRequest;
use App\Jobs\PingJob;
use App\Jobs\StoreContainerPackage;
use App\Jobs\UpdateContainerPackage;
use App\Models\Container;
use App\Models\Package;
use Illuminate\Http\Request;

class ContainerPackageController extends Controller
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function index()
    {
        // Get list of existing products from database
        $containers = $this->container->all();

        return view('container-packages.index', compact('containers'));
    }

    public function show($id)
    {
        // Get container
        $container = $this->container->find($id);

        return view('container-packages.show', compact('container'));
    }

    public function create()
    {
        return view('container-packages.create');
    }

    public function store(Request $request)
    {
        // Add new container into database
        $container = $this->container->create($request->all());

        // Send to queue handle insert multi container package into database
        StoreContainerPackage::dispatch($request->all(), $container);

        return redirect()->route('container-packages.index');
    }

    public function edit($id)
    {
        $container = $this->container->find($id);
        return view('container-packages.edit', compact('container'));
    }

    public function update(Request $request, $id)
    {
        // Get container from id
        $container = $this->container->find($id);

        // Update container into database
        $container->update($request->all());

        // Send to queue handle update multi container package
        UpdateContainerPackage::dispatch($request->all(), $container);

        return redirect()->route('container-packages.index');
    }

    public function destroy($id)
    {
        // Remove container and package of this container
        $this->container->find($id)->delete();
        return back();
    }
}
