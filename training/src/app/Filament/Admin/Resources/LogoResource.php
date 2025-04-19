<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LogoResource\Pages;
use App\Filament\Admin\Resources\LogoResource\RelationManagers;
use App\Models\Logo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogoResource extends Resource
{
    protected static ?string $model = Logo::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Logo Manager';
    protected static ?string $breadcrumb = 'Logo Manager';
    protected static ?string $pluralLabel = 'Logo Setting';
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
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->directory('seo')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(1024),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->label('Thumbnail')
                ->circular()
                ->height(60),
                Tables\Columns\TextColumn::make('title')->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
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
            'index' => Pages\ListLogos::route('/'),
            //'create' => Pages\CreateLogo::route('/create'),
            'edit' => Pages\EditLogo::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return Logo::count() === 0; // Only allow creation if no SEO record exists
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
