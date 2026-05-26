<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatLeadResource\Pages;
use App\Models\ChatLead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChatLeadResource extends Resource
{
    protected static ?string $model = ChatLead::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Chat Leads';

    public static function getNavigationBadge(): ?string
    {
        // Badge for leads captured today
        $todayCount = static::getModel()::whereDate('created_at', today())->count();
        return $todayCount > 0 ? (string) $todayCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Lead Information')->schema([
                Forms\Components\TextInput::make('name')->required()->disabled(),
                Forms\Components\TextInput::make('email')->email()->required()->disabled(),
                Forms\Components\TextInput::make('source')->disabled(),
                Forms\Components\TextInput::make('ip_address')->label('IP Address')->disabled(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('source')
                    ->color('info'),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Captured')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('today')
                    ->label('Today')
                    ->query(fn($query) => $query->whereDate('created_at', today())),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChatLeads::route('/'),
            'view'  => Pages\ViewChatLead::route('/{record}'),
        ];
    }
}
