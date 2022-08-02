<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Submission;
use App\Models\Tanda;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function sekretariat()
    {
        $submissions = Submission::select('status')->get()->groupBy(function ($q) {
            return $q->status;
        })->map(function ($q) {
            return $q->count();
        })->toArray();
        $total = 0;
        if(count($submissions) > 0)
        $total = array_sum($submissions);
        
        $users = User::orwhere('level', 'penilai')->orwhere('level', 'prakom')->get()->groupBy(function ($q) {
            return $q->level;
        })->map(function ($q) {
            return $q->count();
        })->toArray();
        // return $submissions;
        // return $users['prakom'];
        return view('sekretariat.dashboard', compact('submissions', 'total','users'));
    }
    public function penilai()
    {
        $submissions = Submission::select('status')->get()->groupBy(function ($q) {
            return $q->status;
        })->map(function ($q) {
            return $q->count();
        })->toArray();
        $total = 0;
        if(count($submissions) > 0)
        $total = array_sum($submissions);
        return view('penilai.dashboard', compact('submissions', 'total'));
    }
    public function prakom()
    {
        $submissions = Submission::select('status')->where('employee_id', auth()->user()->employee->id)->get()->groupBy(function ($q) {
            return $q->status;
        })->map(function ($q) {
            return $q->count();
        })->toArray();
        $total = 0;
        if(count($submissions) > 0)
        $total = array_sum($submissions);
        return view('prakom.dashboard', compact('submissions', 'total'));
    }

    public function getPeriode()
    {
        if ($periode = Periode::first()) {
            return view('sekretariat.periode.index', compact('periode'));
        }
        return view('sekretariat.periode.index', ['periode' => new Periode()]);
    }

    public function storePeriode(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "year" => ['required', 'numeric'],
            "semester" => ['required', "in:Semester 1,Semester 2"]
        ]);

        $year = date('Y-m-d', strtotime($validated['year'] . '-01-01'));
        $year1 = date('Y-m-d', strtotime(($validated['year'] + 1) . '-01-01'));
        $validated += $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:' . $year, 'before_or_equal:' . $year1],
        ]);
        $validated += $request->validate([
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        try {
            if ($request->id != null) {
                Periode::where('id', $request->id)->update($validated);
                return back()->with('success', 'Berhasil menyimpan data');
            } else {
                Periode::create($validated);
                return back()->with('success', 'Berhasil menyimpan data');
            }
        } catch (QueryException $qe) {
            return back()->withErrors(['message' => 'Gagal menyimpan data']);
        }
    }

    public function getTTD()
    {
        if ($tanda = Tanda::first()) {
            return view('sekretariat.tanda.index', compact('tanda'));
        }
        return view('sekretariat.tanda.index', ['tanda' => new Tanda()]);
    }

    public function storeTTD(Request $request)
    {
        $validated = $request->validate([
            "nip" => ['required', 'numeric', 'digits:18'],
            "name" => ['required', "string", 'max:100'],
            "jabatan" => ['required', "string", 'max:100']
        ]);
        try {
            if ($request->id != null) {
                Tanda::where('id', $request->id)->update($validated);
                return back()->with('success', 'Berhasil menyimpan data');
            } else {
                Tanda::create($validated);
                return back()->with('success', 'Berhasil menyimpan data');
            }
        } catch (QueryException $qe) {
            return back()->withErrors(['message' => 'Gagal menyimpan data']);
        }
    }
}
