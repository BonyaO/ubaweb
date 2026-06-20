<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteAlertResource\Pages;
use App\Models\SiteAlert;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions;

class SiteAlertResource extends Resource
{
    protected static ?string $model = SiteAlert::class;

    protected static string|\UnitEnum|null $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')->required(),
                FileUpload::make('image')->image(),
                RichEditor::make('description')->required()->columnSpanFull(),
                TextInput::make('link_url')
                    ->label('Link URL')
                    ->url()
                    ->helperText('Optional. Leave blank to show the popup with no button.'),
                TextInput::make('link_text')
                    ->label('Link text')
                    ->helperText('e.g. "Apply now". Defaults to "Learn more" if left blank.'),
                DateTimePicker::make('starts_at')
                    ->helperText('Optional. Leave blank to start showing immediately.'),
                DateTimePicker::make('ends_at')
                    ->helperText('Optional. Leave blank to keep showing until turned off.'),
                Toggle::make('is_active')
                    ->label('Active')
                    ->helperText('Only one active, in-window alert is shown at a time (the most recent).')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('starts_at')->dateTime()->sortable(),
                TextColumn::make('ends_at')->dateTime()->sortable(),
                ToggleColumn::make('is_active'),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListSiteAlerts::route('/'),
            'create' => Pages\CreateSiteAlert::route('/create'),
            'edit' => Pages\EditSiteAlert::route('/{record}/edit'),
        ];
    }
}
