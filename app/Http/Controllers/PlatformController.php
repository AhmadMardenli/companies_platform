<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    //show all companies
    public function index(){
        return  response()->json(Company::all());
    }
    //show all company's branches
    public function show($id){
        return response()->json(
            Branch::all()
        ->where('company_id',$id));
    }
    //add a new company
    public function addCompany(Request $request){
        $request->validate([
            'name'=>'required',
            'date'=>['required','date'],
            'location'=>'required',
            'activity'=>'required'
        ]);
        Company::create([
            'name'=>$request->name,
            'establishment_date'=>$request->date,
            'location'=>$request->location,
            'activity'=>$request->activity
        ]);
        return 'success';
    }
}