<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Columns\TextColumn;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    // protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-scale';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make("name"),
                FileUpload::make("logo")->image()->required(),
                TextInput::make("address"),
                TextInput::make("email"),
                TextInput::make("telephone"),
                RichEditor::make("about")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->sortable()->searchable(),
                TextColumn::make("address")->sortable()->searchable(),
                TextColumn::make("email")->sortable()->searchable(),
                TextColumn::make("telephone")->sortable()->searchable(),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
