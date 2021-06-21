<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class RegionController extends Controller
{
    // Get semua data
    public function getProvincesById($id)
    {
        $provinces = Province::all();
        $htmlData = "";
        foreach ($provinces as $data)
        {
            $htmlData .= '<option value="'.$data->id.'">'.$data->name.'</option>';
        }
        return $htmlData;
    }

    public function getRegenciesById(Request $request)
    {
        $idProvince = $request->input('provinsi');
        $idRegency = $request->input('regency_id');
        $regencies = Regency::where("province_id", $idProvince)->get();
        $htmlData = "";
        foreach ($regencies as $data)
        {
            $selected = ($idRegency == $data->province_id) ? print("selected") : "";
            $htmlData .= '<option value="'.$data->id.'" '.$selected.'>'.$data->name.'</option>';
        }
        return $htmlData;
    }

    public function getDistrictsById(Request $request)
    {
        $idRegency = $request->input('kabupaten');
        $idDistrict = $request->input('district_id');
        $districts = District::where("regency_id", $idRegency)->get();
        $htmlData = "";
        foreach ($districts as $data)
        {
            $selected = ($idDistrict == $data->district_id) ? print("selected") : "";
            $htmlData .= '<option value="'.$data->id.'" '.$selected.'>'.$data->name.'</option>';
        }
        return $htmlData;
    }

    public function getVillagesById(Request $request)
    {
        $idDistrict = $request->input('kecamatan');
        $idVillage = $request->input('village_id');
        $villages = Village::where("district_id", $idDistrict)->get();
        $htmlData = "";
        foreach ($villages as $data)
        {
            $selected = ($idVillage == $data->village_id) ? print("selected") : "";
            $htmlData .= '<option value="'.$data->id.'" '.$selected.'>'.$data->name.'</option>';
        }
        return $htmlData;
    }
}
