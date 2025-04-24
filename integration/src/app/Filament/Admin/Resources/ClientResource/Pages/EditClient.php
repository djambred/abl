<?php

namespace App\Filament\Admin\Resources\ClientResource\Pages;

use App\Filament\Admin\Resources\ClientResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('requestApiToken')
                ->label('Request New API Token')
                ->color('warning')
                ->icon('heroicon-m-key')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->api_token = Str::random(60);
                    $this->record->save();

                    $this->fillForm();

                    Notification::make()
                        ->title('New API token generated.')
                        ->success()
                        ->send();
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['api_token'])) {
            $data['api_token'] = Str::random(60);
        }

        return $data;
    }
}
