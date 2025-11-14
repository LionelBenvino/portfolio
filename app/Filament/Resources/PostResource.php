<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = 'Posts';
    protected static ?string $pluralModelLabel = 'Posts';
    protected static ?string $modelLabel = 'Post';

    protected static ?string $navigationGroup = 'Contenido';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
	{
	    return $form
	        ->schema([
	            TextInput::make('title')
	                ->required()
	                ->reactive()
	                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

	            TextInput::make('slug')
	                ->required()
	                ->unique(ignoreRecord: true),

	            MarkdownEditor::make('content')
	                ->label('Contenido (Markdown)')
	                ->columnSpanFull(),

	            DateTimePicker::make('published_at')->label('Fecha publicación'),

	            Toggle::make('is_published')->label('Publicado'),
	        ]);
	}


    public static function table(Table $table): Table
	{
	    return $table
	        ->columns([
	            TextColumn::make('title')->searchable(),
	            TextColumn::make('published_at')->dateTime(),
	            IconColumn::make('is_published')->boolean(),
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
