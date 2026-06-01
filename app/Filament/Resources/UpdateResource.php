<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpdateResource\Pages;
use App\Models\Update;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use stdClass;

class UpdateResource extends Resource
{
    protected static ?string $model = Update::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make("name")
                    ->reactive()
                    ->afterStateUpdated(
                        function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        }
                    )->required(),
                TextInput::make("slug")->disabled(),
                Textarea::make("description"),
                RichEditor::make("detail")->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make("name")->limit(25)->sortable()->searchable(),
               TextColumn::make("description")->limit(30)->sortable()->searchable(),
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
            'index' => Pages\ListUpdates::route('/'),
            'create' => Pages\CreateUpdate::route('/create'),
            'edit' => Pages\EditUpdate::route('/{record}/edit'),
        ];
    }
}
