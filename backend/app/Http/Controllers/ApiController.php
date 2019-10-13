<?php

namespace App\Http\Controllers;

use App\JsonFile;
use App\XmlFile;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getData() {
        $csv = array_map('str_getcsv', file(base_path('venues.csv')));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv); // Remove header
        return collect($csv);
    }

    public function loadVenues(Request $request) {
        $data = $this->getData();
        $data = $this->applyFilters($data, $request->name, $request->discount);
        return response()->json($data);
    }

    protected function applyFilters($data, $name = null, $discount = null) {
        if ($name || $discount) {
            if ($name) {
                $data = $data->filter(function ($venue) use ($name) {
                    return stripos($venue['name'], $name) !== false;
                });                
            }
            if ($discount) {
                $data = $data->where('discount_percentage', '>=', $discount);
            }
        }
        return $data;     
    }

    public function generateFiles($name, $discount) {
        try {
            $request = new Request();
            $request->replace(['name' => $name, 'discount' => $discount]);
            $venues = json_decode($this->loadVenues($request)->content(), true);
            $json = new JsonFile($venues);
            $json->saveFile();
            $xml = new XmlFile($venues);
            $xml->saveFile();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
