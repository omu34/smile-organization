<?php

namespace App\Filament\Resources\Conversations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;

class ConversationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('User'),
                TextColumn::make('title')->limit(30),
                TextColumn::make('total_tokens')->label('Tokens'),
                TextColumn::make('created_at')->label('Started')->dateTime(),
                BadgeColumn::make('messages_count')->counts('messages')->label('Messages'),
            ])->actions([
                ViewAction::make()
                    ->modalWidth('7xl')
                    ->form(fn($form) => $form->schema([
                        Section::make('Chat History')
                            ->view('filament.forms.components.chat-history'),
                    ])),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
