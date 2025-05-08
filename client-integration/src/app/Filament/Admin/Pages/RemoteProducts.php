<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Http;

class RemoteProducts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.admin.pages.remote-products';

    protected static ?string $title = 'Remote Products';
    protected static ?string $navigationGroup = 'External API';

    public array $products = [];

    public function mount(): void
    {
        $response = Http::withToken('U7poqJltxARO25qnjJcHXSRrmPjDavhzSAJ2vVPg3Jlws3uHnsw7y5yqiyjS') // Replace with your token
            ->get('http://172.18.0.1/api/products'); // Adjust URL if needed

        $this->products = $response->successful() ? $response->json() : [];
    }
}
