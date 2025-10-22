<?php

namespace App\Filament\Resources\Directives\Pages;

use App\Filament\Resources\Directives\DirectiveResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDirective extends CreateRecord
{
    protected static string $resource = DirectiveResource::class;
}
