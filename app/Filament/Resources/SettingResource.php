<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'System';

    protected static ?string $navigationLabel = 'Site Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('key')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Used in code as setting("your-key")'),

            TextInput::make('display_name')
                ->required()
                ->label('Display Name'),

            Select::make('type')
                ->options([
                    'text'     => 'Text',
                    'textarea' => 'Textarea',
                    'url'      => 'URL',
                    'email'    => 'Email',
                    'file'     => 'File',
                ])
                ->required()
                ->default('text'),

            TextInput::make('group')
                ->helperText('Optional grouping label'),

            TextInput::make('order')
                ->numeric()
                ->default(1),

            Textarea::make('value')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group')->sortable()->badge(),
                TextColumn::make('key')->sortable()->searchable()->copyable(),
                TextColumn::make('display_name')->label('Name')->searchable(),
                TextColumn::make('type')->badge(),
                TextColumn::make('value')->limit(40)->wrap(),
            ])
            ->defaultSort('group')
            ->filters([])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit'   => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
