<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cube-transparent';

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
                FileUpload::make("image")->image()->label("Service image"),
                Textarea::make("summary")->required(),
                RichEditor::make("description")->required()->columnSpanFull(),
                Select::make("category_id")->relationship("category", "name")
                ->preload()->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->limit(30)->sortable()->searchable(),
                TextColumn::make("summary")->limit(30)->sortable()->searchable(),
            ])->defaultSort("created_at", "desc")
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
