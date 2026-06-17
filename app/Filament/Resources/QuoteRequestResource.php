<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteRequestResource\Pages;
use App\Models\QuoteRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Collection;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Quote Requests';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('status', 'new')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Contact Information')->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\Select::make('service_type')
                    ->options(['charter' => 'Charter', 'transfer' => 'Transfer', 'tour' => 'Tour', 'pricing' => 'Pricing Request'])
                    ->required(),
            ])->columns(2),

            Forms\Components\Section::make('Trip Details')->schema([
                Forms\Components\TextInput::make('quote_reference')
                    ->label('Quote Ref')
                    ->formatStateUsing(fn($state) => $state ? $state : 'Auto')
                    ->disabled()
                    ->dehydrated(false),
                Forms\Components\TextInput::make('pickup_location'),
                Forms\Components\TextInput::make('dropoff_location'),
                Forms\Components\DatePicker::make('trip_date'),
                Forms\Components\TextInput::make('passengers')->numeric(),
                Forms\Components\Select::make('transfer_trip_type')
                    ->options(['round-trip' => 'Round Trip', 'one-way' => 'One Way'])
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\Toggle::make('use_vehicle_at_destination')
                    ->label('Use vehicle at destination')
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\TextInput::make('pickup_time')
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\DatePicker::make('departure_date')
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\TextInput::make('departure_time')
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\TextInput::make('transfer_option')
                    ->label('Transfer Service')
                    ->visible(fn($get) => $get('service_type') === 'transfer'),
                Forms\Components\TextInput::make('budget')->numeric()->prefix('$'),
                Forms\Components\TextInput::make('distance_km')->numeric()->suffix('km')->label('Distance')->readonly(),
                Forms\Components\TextInput::make('duration_minutes')->numeric()->suffix('min')->label('Est. Duration')->readonly(),
                Forms\Components\Textarea::make('message')->rows(4)->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('🚌 Canadian Driving Regulations')
                ->description('Commercial Vehicle Driving Hours Requirements')
                ->schema([
                    Forms\Components\Group::make()->schema([
                        Forms\Components\TextInput::make('reg_max_continuous')
                            ->label('Max Continuous Driving')
                            ->default('13 hours per day')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Per day limit'),
                        Forms\Components\TextInput::make('reg_max_cycle')
                            ->label('Max Driving per Cycle')
                            ->default('120 hours over 14 days')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('14-day cycle'),
                        Forms\Components\TextInput::make('reg_mandatory_break')
                            ->label('Mandatory Break')
                            ->default('8-10 hours')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Between driving periods'),
                    ])->columns(3),

                    Forms\Components\Group::make()->schema([
                        Forms\Components\TextInput::make('trip_distance_display')
                            ->label('Distance')
                            ->formatStateUsing(fn($get) => $get('distance_km') ? $get('distance_km') . ' km' : '–')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Calculated route'),
                        Forms\Components\TextInput::make('trip_duration_display')
                            ->label('Duration')
                            ->formatStateUsing(
                                fn($get) => $get('duration_minutes')
                                    ? (floor($get('duration_minutes') / 60) . 'h ' . ($get('duration_minutes') % 60) . 'min')
                                    : '–'
                            )
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Estimated time'),
                        Forms\Components\TextInput::make('trip_avg_speed_display')
                            ->label('Avg Speed')
                            ->formatStateUsing(
                                fn($get) => $get('duration_minutes') && $get('distance_km')
                                    ? number_format(($get('distance_km') / $get('duration_minutes') * 60), 1) . ' km/h'
                                    : '–'
                            )
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Average speed'),
                    ])->columns(3)->columnSpanFull()->visible(fn($get) => (bool)$get('duration_minutes')),

                    Forms\Components\Placeholder::make('compliance_status')
                        ->columnSpanFull()
                        ->visible(fn($get) => (bool)$get('duration_minutes'))
                        ->content(function ($get) {
                            $duration = $get('duration_minutes');
                            if (!$duration) return '';

                            $durationHours = floor($duration / 60);
                            $durationMinutes = $duration % 60;
                            $exceedsLimit = $duration > 1800;

                            if ($exceedsLimit) {
                                $hoursOver = $durationHours - 13;
                                $minutesOver = $durationMinutes;
                                return \Illuminate\Support\HtmlString::class ? new \Illuminate\Support\HtmlString(
                                    "<div class='rounded-lg border-l-4 border-amber-400 bg-amber-50 p-4'>" .
                                        "<div class='flex items-start gap-3'>" .
                                        "<div class='pt-0.5'><svg class='h-5 w-5 text-amber-600' fill='currentColor' viewBox='0 0 20 20'><path fill-rule='evenodd' d='M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z' clip-rule='evenodd' /></svg></div>" .
                                        "<div><p class='font-semibold text-amber-900'>⚠️ Exceeds 13-Hour Driving Limit</p>" .
                                        "<p class='mt-1 text-sm text-amber-800'>This trip is <strong>{$hoursOver}h {$minutesOver}min over</strong> maximum continuous driving time.</p>" .
                                        "<p class='mt-2 text-sm font-medium text-amber-900'>✓ Recommendation: Use multiple drivers or plan overnight stops</p>" .
                                        "</div></div></div>"
                                ) : "<div>Exceeds limit</div>";
                            } else {
                                return \Illuminate\Support\HtmlString::class ? new \Illuminate\Support\HtmlString(
                                    "<div class='rounded-lg border-l-4 border-green-400 bg-green-50 p-4'>" .
                                        "<div class='flex items-start gap-3'>" .
                                        "<div class='pt-0.5'><svg class='h-5 w-5 text-green-600' fill='currentColor' viewBox='0 0 20 20'><path fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' clip-rule='evenodd' /></svg></div>" .
                                        "<div><p class='font-semibold text-green-900'>✓ Within Driving Limits</p>" .
                                        "<p class='mt-1 text-sm text-green-800'>This trip complies with Canadian regulations (max 13 hours continuous).</p>" .
                                        "</div></div></div>"
                                ) : "<div>Within limits</div>";
                            }
                        }),
                ])
                ->collapsed(fn($get) => !$get('duration_minutes')),

            Forms\Components\Section::make('Admin')->schema([
                Forms\Components\Select::make('status')
                    ->options(['new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'closed' => 'Closed'])
                    ->default('new'),
                Forms\Components\Textarea::make('admin_notes')->rows(4)->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Ref')
                    ->formatStateUsing(fn($state) => 'Q-' . str_pad((string) $state, 5, '0', STR_PAD_LEFT))
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\BadgeColumn::make('service_type')
                    ->colors(['primary' => 'charter', 'success' => 'transfer', 'warning' => 'tour', 'info' => 'pricing']),
                Tables\Columns\TextColumn::make('pickup_location')
                    ->label('Pickup')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('dropoff_location')
                    ->label('Drop-off')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('passengers'),
                Tables\Columns\TextColumn::make('transfer_option')
                    ->label('Transfer Service')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('transfer_trip_type')
                    ->label('Trip Type')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('distance_km')
                    ->label('Distance')
                    ->formatStateUsing(fn($state) => $state ? "{$state} km" : '–')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('Duration')
                    ->formatStateUsing(
                        fn($state) => $state
                            ? (floor($state / 60) . 'h ' . ($state % 60) . 'min')
                            : '–'
                    )
                    ->sortable()
                    ->color(fn($state) => $state && $state > 1800 ? 'warning' : null), // Flag >30hrs in yellow
                Tables\Columns\TextColumn::make('pickup_time')
                    ->label('Pickup Time')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('trip_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('departure_date')
                    ->label('Departure Date')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('departure_time')
                    ->label('Departure Time')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('quote_summary')
                    ->label('Summary')
                    ->limit(34)
                    ->tooltip(fn(QuoteRequest $record) => $record->quote_summary)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['danger' => 'new', 'warning' => 'read', 'success' => 'replied', 'secondary' => 'closed']),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Received'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'closed' => 'Closed']),
                Tables\Filters\SelectFilter::make('service_type')
                    ->options(['charter' => 'Charter', 'transfer' => 'Transfer', 'tour' => 'Tour', 'pricing' => 'Pricing']),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('markAsRead')
                    ->label('Mark Read')
                    ->icon('heroicon-o-envelope-open')
                    ->color('warning')
                    ->visible(fn(QuoteRequest $record) => $record->status !== 'read')
                    ->action(fn(QuoteRequest $record) => $record->update(['status' => 'read'])),
                Action::make('markAsReplied')
                    ->label('Mark Replied')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->visible(fn(QuoteRequest $record) => $record->status !== 'replied')
                    ->action(fn(QuoteRequest $record) => $record->update(['status' => 'replied'])),
                Action::make('markAsNew')
                    ->label('Mark New')
                    ->icon('heroicon-o-envelope')
                    ->color('danger')
                    ->visible(fn(QuoteRequest $record) => $record->status !== 'new')
                    ->action(fn(QuoteRequest $record) => $record->update(['status' => 'new'])),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('markAsRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-envelope-open')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'read']))
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('markAsReplied')
                        ->label('Mark as Replied')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'replied']))
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('markAsNew')
                        ->label('Mark as New')
                        ->icon('heroicon-o-envelope')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'new']))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListQuoteRequests::route('/'),
            'create' => Pages\CreateQuoteRequest::route('/create'),
            'edit'   => Pages\EditQuoteRequest::route('/{record}/edit'),
        ];
    }
}
