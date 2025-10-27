<?php

namespace App\Filament\Resources\Sliders\Schemas;

use App\Models\Slider;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Slider Name')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(Slider::class, 'slug', ignoreRecord: true)
                    ->required(),

                Select::make('page_slug')
                    ->label('Attach To Page')
                    ->options([
                        'home' => 'Home',
                        'about' => 'About',
                        'contact' => 'Contact',
                        'gallery' => 'Gallery',
                    ])
                    ->required(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                Repeater::make('slides')
                    ->label('Slides')
                    ->relationship('slides') // this binds to hasMany Slide model
                    ->schema([
                        TextInput::make('title')
                            ->label('Slide Title'),

                        FileUpload::make('image_url')
                            ->label('Slide Image')
                            ->image()
                            ->directory('slides')
                            ->disk('public')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->required(),

                        Textarea::make('description')
                            ->label('Description'),

                        TextInput::make('button_text')
                            ->label('Button Text'),

                        TextInput::make('button_link')
                            ->label('Button Link (URL)'),

                        TextInput::make('position')
                            ->label('Order Position')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_active')
                            ->label('Visible')
                            ->default(true),
                    ])
                    ->orderable('position')
                    ->collapsed(),
            ]);
    }
}
