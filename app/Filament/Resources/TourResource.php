<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Models\Tour;
use App\Models\TourCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TourResource extends Resource
{
    protected static ?string $model = Tour::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Tours';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Tour Details')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\Select::make('tour_category_id')
                    ->label('Category')->options(TourCategory::pluck('name', 'id'))->searchable(),
                Forms\Components\Select::make('difficulty')
                    ->options(['Easy' => 'Easy', 'Moderate' => 'Moderate', 'Challenging' => 'Challenging'])
                    ->default('Easy'),
                Forms\Components\TextInput::make('duration_days')->numeric()->required()->label('Duration (Days)'),
                Forms\Components\TextInput::make('max_group_size')->numeric()->default(20),
                Forms\Components\TextInput::make('price_per_person')->numeric()->prefix('$')->required(),
                Forms\Components\TextInput::make('start_location')->default('Colombo, Sri Lanka'),
                Forms\Components\TextInput::make('end_location')->default('Colombo, Sri Lanka'),
                Forms\Components\Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published'])->default('draft'),
                Forms\Components\Toggle::make('is_featured')->label('Featured Tour'),
            ])->columns(2),

            Forms\Components\Section::make('Description')->schema([
                Forms\Components\Textarea::make('short_description')->rows(3)->required()->columnSpanFull(),
                Forms\Components\RichEditor::make('description')->required()->columnSpanFull(),
            ]),

            Forms\Components\Section::make('What\'s Included / Excluded')->schema([
                Forms\Components\TagsInput::make('included')->label('Included')->columnSpanFull(),
                Forms\Components\TagsInput::make('excluded')->label('Excluded')->columnSpanFull(),
                Forms\Components\TagsInput::make('highlights')->label('Highlights')->columnSpanFull(),
            ]),

            Forms\Components\Section::make('Media')->schema([
                Forms\Components\FileUpload::make('featured_image')->image()->directory('tours')->columnSpanFull(),
            ]),

            Forms\Components\Section::make('Itinerary')->schema([
                Forms\Components\Repeater::make('itineraries')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('day_number')->numeric()->required()->label('Day'),
                        Forms\Components\TextInput::make('title')->required()->columnSpan(3),
                        Forms\Components\Textarea::make('description')->required()->rows(3)->columnSpanFull(),
                        Forms\Components\TextInput::make('accommodation')->label('Accommodation'),
                        Forms\Components\TextInput::make('meals')->label('Meals'),
                    ])->columns(4)->orderColumn('day_number')->columnSpanFull(),
            ]),

            Forms\Components\Section::make('SEO')->schema([
                Forms\Components\TextInput::make('meta_title'),
                Forms\Components\Textarea::make('meta_description')->rows(2),
            ])->columns(2)->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')->size(48),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable()->limit(45),
                Tables\Columns\TextColumn::make('category.name')->badge(),
                Tables\Columns\TextColumn::make('duration_days')->label('Days')->sortable(),
                Tables\Columns\TextColumn::make('price_per_person')->money('USD')->sortable(),
                Tables\Columns\IconColumn::make('is_featured')->boolean()->label('Featured'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['warning' => 'draft', 'success' => 'published']),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published']),
                Tables\Filters\TernaryFilter::make('is_featured')->label('Featured'),
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
            'index'  => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit'   => Pages\EditTour::route('/{record}/edit'),
        ];
    }
}
