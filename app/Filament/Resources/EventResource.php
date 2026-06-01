<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\DatePicker;
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

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

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
                RichEditor::make("detail"),
                DatePicker::make("start_date")->label("Start date"),
                DatePicker::make("end_date")->label("End date"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->getStateUsing(static function (stdClass $rowLoop): string {
                    return (string) $rowLoop->iteration;
                }),
                TextColumn::make("name")->sortable()->searchable(),
                TextColumn::make("description")->limit(30),
                TextColumn::make("start_date")->sortable(),
                TextColumn::make("end_date")->sortable(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
