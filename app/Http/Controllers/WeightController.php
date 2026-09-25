<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function index()
    {
        $weights = Weight::orderBy('recorded_at', 'asc')->get();
        return view('components.index', compact('weights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recorded_at' => 'required|date',
            'weight' => 'required|numeric|min:1|max:300',
        ]);

        Weight::create($request->only('recorded_at', 'weight'));

        return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ');
    }

    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'recorded_at' => 'required|date',
            'weight' => 'required|numeric|min:1|max:300',
        ]);

        $weight->update($request->only('recorded_at', 'weight'));

        return redirect()->back()->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function destroy(Weight $weight)
    {
        $weight->delete();
        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}