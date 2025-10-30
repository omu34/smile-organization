@extends('components.layouts.pages-layout')

@section('content')
 <livewire:slider-show slug="home-page-slider" />
    <div class="">
        <livewire:dynamic-navbar />
        <livewire:directives-section />
        <livewire:activities-section />
        <livewire:featured-articles-section />
        <livewire:resource-section />
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:beneficiary-section />
    </div>
    <livewire:footer-section />
@endsection
