<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $slug = '/';
    protected static ?int $navigationSort = 1;

    /**
     * Retrieve data for the dashboard view, including all user roles. 
     */
    public function getViewData(): array
    {
        $user = Auth::user();

        if (!$user) {
            return [
                'name' => 'Guest',
                'email' => 'N/A',
                'roles' => [],
                'joined' => 'N/A',
                'lastLogin' => 'Not available',
            ];
        }

        // Eager load roles to prevent N+1 queries
        $user->load('roles');

        return [
            'name' => $user->name ?? 'Unknown',
            'email' => $user->email ?? 'N/A',
            'roles' => $user->roles->pluck('name')->toArray() ?? [],
            'joined' => $user->created_at?->format('d M, Y') ?? 'N/A',
            'lastLogin' => $user->last_login_at?->format('d M, Y H:i') ?? 'Not available',
        ];
    }
}