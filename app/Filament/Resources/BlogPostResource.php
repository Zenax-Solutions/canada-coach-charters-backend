<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Post Details')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\Select::make('blog_category_id')
                    ->label('Category')
                    ->options(BlogCategory::pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('author')->default('Admin'),
                Forms\Components\Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published'])
                    ->default('draft')->required(),
                Forms\Components\DateTimePicker::make('published_at')->label('Publish At'),
            ])->columns(2),

            Forms\Components\Section::make('Content')->schema([
                Forms\Components\Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                Forms\Components\RichEditor::make('content')->required()->columnSpanFull(),
            ]),

            Forms\Components\Section::make('Media')->schema([
                Forms\Components\FileUpload::make('featured_image')
                    ->image()->directory('blog')->columnSpanFull(),
                Forms\Components\TextInput::make('image_title')
                    ->label('Image Title'),
                Forms\Components\TextInput::make('alt_text')
                    ->label('Alt Text'),
            ])->columns(2),

            Forms\Components\Section::make('SEO')->schema([
                Forms\Components\TextInput::make('meta_title')
                    ->label('Meta Title (title tag)'),
                Forms\Components\Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(2),
                Forms\Components\Textarea::make('schema')
                    ->label('Schema (JSON-LD)')
                    ->rows(5)
                    ->helperText('Optional structured data in JSON-LD format.'),
            ])->columns(1)->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')->size(48),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable()->limit(50),
                Tables\Columns\TextColumn::make('category.name')->badge(),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['warning' => 'draft', 'success' => 'published']),
                Tables\Columns\TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published']),
                Tables\Filters\SelectFilter::make('blog_category_id')
                    ->label('Category')->options(BlogCategory::pluck('name', 'id')),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit'   => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
