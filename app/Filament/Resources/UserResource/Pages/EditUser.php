<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Action::make("delete")->action("delete")->color("danger")->icon("heroicon-o-trash")->size("sm"),
            Action::make("changePassword")
            ->form([
                TextInput::make("new_password")->password()->minLength(6)->rule(Password::default())->label("New password")->required(),
                TextInput::make("new_password_confirm")->password()->required()->rule(Password::default())->same("new_password")->label("Confirm new password")
            ])
            ->icon("heroicon-o-key")
            ->size("sm")
            ->color("secondary")
            ->action(function (array $data) {
                $this->record->update([
                    "password" => Hash::make($data['new_password'])
                ]);
                $this->notify("success", "Password updated successfully");
            })
        ];
    }

    
}
