<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|\UnitEnum|null $navigationGroup = "cms";

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make("question")->required(),
                Toggle::make("is_visible")->label("Visibility")->default(true),
                Textarea::make("response")->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("question")->sortable()->searchable(),
                TextColumn::make("response")->limit(30)->sortable()->searchable(),
                ToggleColumn::make("is_visible")->label("visibility")
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
