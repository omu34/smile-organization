@extends('components.layouts.pages-layout')

@section('content')
    <div class="">
        <livewire:slider-show slug="home-page-slider" />
        <livewire:dynamic-navbar />
        <livewire:directives-section />
        <livewire:area-of-practice/>
        <livewire:activities-section />
        <livewire:featured-articles-section />
        <livewire:resource-section />
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:beneficiary-section />
        <livewire:ai-playground />
        <livewire:footer-section />
    </div>
@endsection
