<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = "name";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                FileUpload::make("image")
                    ->label("Project cover image")
                    ->required()
                    ->columnSpanFull(),
                TextInput::make("name")
                    ->reactive()
                    ->afterStateUpdated(
                        function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        }
                    )->required(),
                TextInput::make("slug")->disabled(),
                Textarea::make("description"),
                DatePicker::make("start_date"),
                DatePicker::make("end_date"),
                RichEditor::make("detail")->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('#')->getStateUsing(static function (stdClass $rowLoop): string {
                    return (string) $rowLoop->iteration;
                }),
                TextColumn::make("name")->sortable()->searchable(),
                TextColumn::make("description")->limit(30),
                TextColumn::make("status"),
                TextColumn::make("start_date")->sortable()->searchable(),
                TextColumn::make("end_date")->sortable()->searchable(),

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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
