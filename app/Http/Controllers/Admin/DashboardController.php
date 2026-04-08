<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\GuruStaff;
use App\Models\PpdbItem;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $totalBeritas = Berita::count();
        $publishedBeritas = Berita::where('status', 'published')->count();
        $totalGaleris = Galeri::count();
        $totalGuruStaff = GuruStaff::count();
        $totalPrograms = Program::count();
        $totalPpdbItems = PpdbItem::count();

        $recentActivities = collect()
            ->merge(
                Berita::latest()->limit(5)->get()->map(function ($item) {
                    return [
                        'icon' => 'bi-newspaper',
                        'color' => 'primary',
                        'title' => 'Berita diperbarui',
                        'description' => $item->judul,
                        'time' => $item->created_at,
                    ];
                })
            )
            ->merge(
                Galeri::latest()->limit(5)->get()->map(function ($item) {
                    return [
                        'icon' => 'bi-images',
                        'color' => 'info',
                        'title' => 'Galeri ditambahkan',
                        'description' => $item->judul,
                        'time' => $item->created_at,
                    ];
                })
            )
            ->merge(
                GuruStaff::latest()->limit(5)->get()->map(function ($item) {
                    return [
                        'icon' => 'bi-person-badge',
                        'color' => 'success',
                        'title' => 'Data guru/staff diperbarui',
                        'description' => $item->nama,
                        'time' => $item->created_at,
                    ];
                })
            )
            ->merge(
                Program::latest()->limit(5)->get()->map(function ($item) {
                    return [
                        'icon' => 'bi-star',
                        'color' => 'warning',
                        'title' => 'Program diperbarui',
                        'description' => $item->judul,
                        'time' => $item->created_at,
                    ];
                })
            )
            ->sortByDesc('time')
            ->take(8)
            ->values();

        $labels = collect(range(6, 0))->map(function ($offset) {
            return Carbon::today()->subDays($offset)->format('d M');
        })->values();

        $beritaSeries = collect(range(6, 0))->map(function ($offset) {
            return Berita::whereDate('created_at', Carbon::today()->subDays($offset))->count();
        })->values();

        $galeriSeries = collect(range(6, 0))->map(function ($offset) {
            return Galeri::whereDate('created_at', Carbon::today()->subDays($offset))->count();
        })->values();

        $userSeries = collect(range(6, 0))->map(function ($offset) {
            return User::whereDate('created_at', Carbon::today()->subDays($offset))->count();
        })->values();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'totalBeritas' => $totalBeritas,
            'publishedBeritas' => $publishedBeritas,
            'totalGaleris' => $totalGaleris,
            'totalGuruStaff' => $totalGuruStaff,
            'totalPrograms' => $totalPrograms,
            'totalPpdbItems' => $totalPpdbItems,
            'recentActivities' => $recentActivities,
            'chartLabels' => $labels,
            'chartBerita' => $beritaSeries,
            'chartGaleri' => $galeriSeries,
            'chartUsers' => $userSeries,
        ]);
    }
}
