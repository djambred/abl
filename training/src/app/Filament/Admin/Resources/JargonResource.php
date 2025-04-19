<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JargonResource\Pages;
use App\Filament\Admin\Resources\JargonResource\RelationManagers;
use App\Models\Jargon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JargonResource extends Resource
{
    protected static ?string $model = Jargon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'JARGON Manager';
    protected static ?string $breadcrumb = 'JARGON Manager';
    protected static ?string $pluralLabel = 'JARGON Setting';
    public static function getNavigationSort(): ?int
    {
        // Auto-generate sort from navigation label
        return crc32(static::getNavigationLabel()) % 100;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slogan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slogan')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJargons::route('/'),
            //'create' => Pages\CreateJargon::route('/create'),
            'edit' => Pages\EditJargon::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return Jargon::count() === 0; // Only allow creation if no SEO record exists
    }

    // Disable deletion of SEO entry
    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false; // Disallow deletion of SEO records
    }

    public static function canDeleteAny(): bool
    {
        return false; // Disallow bulk deletion of SEO records
    }
}
