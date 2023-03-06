<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'cms';

    protected static ?string $recordTitleAttribute = "title";

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make("image")->image()->label("Post cover image")->columnSpanFull(),
                TextInput::make("title")
                    ->reactive()
                    ->afterStateUpdated(
                        function (Closure $set, $state) {
                            $set("slug", Str::slug($state));
                        }
                    )->required(),
                Select::make("user_id")->relationship("user", "name")->label("Author")->default(auth()->id()),
                TextInput::make("slug")->disabled(),
                Textarea::make("summary")->required(),
                RichEditor::make("detail")->required()->columnSpanFull(),
                Toggle::make("is_published")->default(false)->required(),

                /*TODO: Work on the category 1 - many morph relationship */
                Select::make("category_id")->relationship("category", "name")->preload()->searchable(),
                MultiSelect::make("tag")->label("Tags")->searchable()->relationship("tags", "name")->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("user.name")->label("author")->sortable()->searchable(),
                TextColumn::make("title")->limit(30)->sortable()->searchable(),
                TextColumn::make("summary")->limit(30)->sortable()->searchable(),
                ToggleColumn::make("is_published")->label("Published")
            ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
