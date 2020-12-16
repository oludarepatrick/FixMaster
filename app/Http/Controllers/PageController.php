<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class PageController extends Controller
{
    public function services(){

        $categories = Service::ActiveServices()->get();

        $services = Service::select('id', 'name')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC')
        ->with(['categories'    =>  function($query){
            return $query->select('name', 'url', 'image', 'service_id');
        }])
        ->has('categories')->get();

        $data = [
            'services'      =>  $services,
            'categories'    =>  $categories,
        ];

        return view('page.services', $data);
    }
}
