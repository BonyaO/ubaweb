<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammeResource\Pages;
use App\Filament\Resources\ProgrammeResource\RelationManagers;
use App\Models\Programme;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgrammeResource extends Resource
{
    protected static ?string $model = Programme::class;

    protected static string|\UnitEnum|null $navigationGroup = 'School management';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('department_id')
                ->relationship('department', 'name')
                ->searchable()
                ->preload()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('short_name')
                    ->required()
                    ->maxLength(20),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->required(),
                Forms\Components\Textarea::make('prerequisite')
                    ->required(),
                Forms\Components\TextInput::make('fee')
                    ->numeric()
                    ->required(),
                Forms\Components\Toggle::make('show_fee')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('short_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(30),
                Tables\Columns\TextColumn::make('duration')->sortable(),
                Tables\Columns\TextColumn::make('fee')->sortable(),
                Tables\Columns\IconColumn::make('show_fee')
                    ->boolean(),
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
            'index' => Pages\ListProgrammes::route('/'),
            'create' => Pages\CreateProgramme::route('/create'),
            'edit' => Pages\EditProgramme::route('/{record}/edit'),
        ];
    }    
}
