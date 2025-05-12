<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\OurServices;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $service_sections = ServiceSection::all();
        $ourservices = OurServices::all();

        return view('pages.services.index', compact('services', 'service_sections', 'ourservices'));
    }
}
