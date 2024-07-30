<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryFlag;
use App\Models\Trainer;


class TrainerController extends Controller
{
    public function CountryFlag(){
        $countries = CountryFlag::all();
        $trainers = Trainer::latest()->get();

        return view('country.country', compact('countries','trainers'));
    }

    public function StoreTrainer(Request $request){
        Trainer::create([
            'trainer_name' => $request->trainer_name,
            'country_name' => $request->country_name,
            'flag' => $request->flag,
        ]);
        return back();
    }

}
