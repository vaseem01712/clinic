<?php
namespace App\Filament\Resources;

use App\Models\BlogPost;
use Filament\Forms; use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('blog_category_id')->relationship('category', 'name')->required(),
            Forms\Components\TextInput::make('author'),
            Forms\Components\TextInput::make('title')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state).'-'.Str::random(4))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\FileUpload::make('featured_image')->image()->directory('blog'),
            Forms\Components\Textarea::make('excerpt')->columnSpanFull(),
            Forms\Components\RichEditor::make('content')->required()->columnSpanFull(),
            Forms\Components\TextInput::make('seo_title'),
            Forms\Components\TextInput::make('seo_description'),
            Forms\Components\Toggle::make('is_published')->default(true),
            Forms\Components\DateTimePicker::make('published_at')->default(now()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('category.name'),
            Tables\Columns\IconColumn::make('is_published')->boolean(),
            Tables\Columns\TextColumn::make('published_at')->date(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\BlogPostResource\Pages\ListBlogPosts::route('/'),
            'create' => \App\Filament\Resources\BlogPostResource\Pages\CreateBlogPost::route('/create'),
            'edit' => \App\Filament\Resources\BlogPostResource\Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
