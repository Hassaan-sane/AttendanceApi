<?php

namespace App\Http\Controllers;

use App\Org_Code;
use Illuminate\Http\Request;

class Org_CodeController extends Controller
{
    public function index()
    {
        return Org_Code::all();
    }

    public function show(Org_Code $org_Code)
    {
        return $org_Code;
    }

    public function store(Request $request)
    {
        $org_code = Org_Code::create($request->all());

        return response()->json($org_code, 201);
    }

    public function update(Request $request, Org_Code $org_Code)
    {
        $org_Code->update($request->all());

        return response()->json($org_Code, 200);
    }

    public function delete(Org_Code $org_Code)
    {
        $org_Code->delete();

        return response()->json(null, 204);
    }

}
