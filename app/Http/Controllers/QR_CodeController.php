<?php

namespace App\Http\Controllers;

use App\QR_Code;
use Illuminate\Http\Request;

class QR_CodeController extends Controller
{
    public function index()
    {
        return QR_Code::all();
    }

    public function show(QR_Code $QR_Code)
    {
        return $QR_Code;
    }

    public function store(Request $request)
    {
        $QR_Code = QR_Code::create($request->all());

        return response()->json($QR_Code, 201);
    }

    public function update(Request $request, QR_Code $QR_Code)
    {
        $QR_Code->update($request->all());

        return response()->json($QR_Code, 200);
    }

    public function delete(QR_Code $QR_Code)
    {
        $QR_Code->delete();

        return response()->json(null, 204);
    }

}
