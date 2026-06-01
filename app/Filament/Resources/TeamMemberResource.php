<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Columns\TextColumn;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static string|\UnitEnum|null $navigationGroup = "cms";

    protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                FileUpload::make("image")
                    ->label("Profile image")
                    ->image()
                    ->avatar()
                    ->columnSpanFull(),
                TextInput::make("name")->required(),
                TextInput::make("nickname"),
                TextInput::make("position"),
                TextInput::make("address"),
                TextInput::make("email")->email(),
                TextInput::make("telephone")->tel(),
                TextInput::make("gender"),
                DatePicker::make("dob")->label("Date of birth"),
                RichEditor::make("about")->label("About info")->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->sortable()->searchable(),
                TextColumn::make("nickname")->sortable()->searchable(),
                TextColumn::make("position")->sortable()->searchable(),
                TextColumn::make("address")->sortable()->searchable(),
                TextColumn::make("email")->sortable()->searchable(),
                TextColumn::make("telephone")->sortable()->searchable(),
                TextColumn::make("gender")->sortable(),
                TextColumn::make("dob")->label("Date of birth")->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Actions\EditAction::make(),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
