<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topStudents = [];
        $topPai = [];
        $topPkn = [];
        $topMtk = [];
        $topBInd = [];
        $topBIng = [];
        $topIpa = [];
        $topIps = [];
        $topPjok = [];
        $topTik = [];
        $topPrakarya = [];

        for ($semester = 1; $semester <= 6; $semester++) {
            $topStudents[] = $this->getTopTotalNilai($semester, 3);
            $topPai[] = $this->getTopPai($semester, 2);
            $topPkn[] = $this->getTopPkn($semester, 2);
            $topMtk[] = $this->getTopMtk($semester, 2);
            $topBInd[] = $this->getTopBInd($semester, 2);
            $topBIng[] = $this->getTopBIng($semester, 2);
            $topIpa[] = $this->getTopIpa($semester, 2);
            $topIps[] = $this->getTopIps($semester, 2);
            $topPjok[] = $this->getTopPjok($semester, 2);
            $topTik[] = $this->getTopTik($semester, 2);
            $topPrakarya[] = $this->getTopPrakarya($semester, 2);
        }

        return Inertia::render('Welcome', [
            'semesters' => $topStudents,
            'pai' => $topPai,
            'pkn' => $topPkn,
            'mtk' => $topMtk,
            'bindo' => $topBInd,
            'bing' => $topBIng,
            'ips' => $topIps,
            'ipa' => $topIpa,
            'pjok' => $topPjok,
            'tik' => $topTik,
            'prakarya' => $topPrakarya,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    private function getTopTotalNilai(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.semester',
                DB::raw('(n1.pai + n1.pkn + n1.bindo + n1.matematika + n1.ipa + n1.ips + n1.bing + n1.pjok + n1.tik+n1.prakarya) as total_nilai')
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('total_nilai')
            ->limit($limit)
            ->get();
    }

    private function getTopPai(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.pai as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.pai')
            ->limit($limit)
            ->get();
    }


    private function getTopPkn(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.pkn as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.pkn')
            ->limit($limit)
            ->get();
    }
    private function getTopPrakarya(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.prakarya as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.prakarya')
            ->limit($limit)
            ->get();
    }
    private function getTopMtk(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.matematika as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.matematika')
            ->limit($limit)
            ->get();
    }
    private function getTopBIng(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.bing as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.bing')
            ->limit($limit)
            ->get();
    }
    private function getTopBInd(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.bindo as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.bindo')
            ->limit($limit)
            ->get();
    }
    private function getTopIpa(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.ipa as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.ipa')
            ->limit($limit)
            ->get();
    }
    private function getTopIps(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.ips as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.ips')
            ->limit($limit)
            ->get();
    }
    private function getTopTik(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.tik as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.tik')
            ->limit($limit)
            ->get();
    }
    private function getTopPjok(int $semester, int $limit)
    {
        return DB::table('nilai as n1')
            ->leftJoin('users as su', 'n1.nisn', '=', 'su.nisn')
            ->select(
                'su.name',
                'n1.nisn',
                'n1.pjok as study'
            )
            ->where('n1.semester', $semester)
            ->orderByDesc('n1.pjok')
            ->limit($limit)
            ->get();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
