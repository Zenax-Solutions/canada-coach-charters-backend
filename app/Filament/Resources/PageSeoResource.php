<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSeoResource\Pages;
use App\Models\PageSeo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('page')
                ->required()
                ->unique(ignoreRecord: true)
                ->disabled()
                ->helperText('Page identifier (auto-generated).'),
            Forms\Components\TextInput::make('meta_title')
                ->label('Meta Title (title tag)')
                ->maxLength(70),
            Forms\Components\Textarea::make('meta_description')
                ->label('Meta Description')
                ->rows(3)
                ->maxLength(160),
            Forms\Components\Textarea::make('keywords')
                ->label('Keywords')
                ->rows(2)
                ->helperText('Comma-separated keywords.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->limit(60),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('page')
            ->actions([Tables\Actions\EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSeos::route('/'),
            'edit'  => Pages\EditPageSeo::route('/{record}/edit'),
        ];
    }
}
