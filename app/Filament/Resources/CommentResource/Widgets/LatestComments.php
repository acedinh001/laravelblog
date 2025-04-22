<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Models\Comment;
use Filament\Tables\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestComments extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Comment::query()->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('post.title'),
                Tables\Columns\TextColumn::make('content'),
            ])
            ->actions([
                Action::make('View')
                    ->url(fn (Comment $record): string => route('filament.admin.resources.comments.edit', $record))
                ->icon('heroicon-o-pencil')
            ]);
    }
}
