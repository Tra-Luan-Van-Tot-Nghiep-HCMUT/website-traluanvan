<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luanvan;
use App\Http\Requests\StoreSearchRequest;


class LuanvanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Check Request
    // https://youtu.be/FJDQBkS1Fqw?t=9122
    public function search(StoreSearchRequest $req)
    {
            $numberPaging = 10;
            $searchQuery = Luanvan::where('ten_lv', 'like', '%' . $req->search . '%')
                                            ->orwhere('ten_gv1', 'like', '%' . $req->search . '%')
                                            ->orwhere('ten_gv2', 'like', '%' . $req->search . '%')
                                            ->paginate($numberPaging);
            $searchQuery->appends($req->all());
            return view('luanvan.luanvan-list', ['resultSearchQuery' => $searchQuery]);
    }
}