<?php

namespace App\Http\Controllers;

use App\Contact as contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $data = request()->validate([
            'searchTerm' => 'required'
        ]);
        
      $contacts = contact::search(data['searchTerm'])->get();

      return ContactResource::collection($contacts);
    }
}
