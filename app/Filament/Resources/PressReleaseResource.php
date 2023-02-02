<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PressReleaseResource\Pages;
use App\Models\PressRelease;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class PressReleaseResource extends Resource
{
    protected static ?string $model = PressRelease::class;

    protected static ?string $navigationGroup = 'School management';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')->image(),
                Forms\Components\DatePicker::make('signed_on')
                    ->required(),
                FileUpload::make('file')
                    ->enableDownload()
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Toggle::make('is_publshed')->label("Publish")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                ImageColumn::make('image')->height(60)->width(100),
                Tables\Columns\TextColumn::make('signed_on')->date()->sortable(),
                Tables\Columns\TextColumn::make('file'),
                ToggleColumn::make('is_published'),
            ])->defaultSort("created_at", "desc")
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPressReleases::route('/'),
            'create' => Pages\CreatePressRelease::route('/create'),
            'edit' => Pages\EditPressRelease::route('/{record}/edit'),
        ];
    }    
}
