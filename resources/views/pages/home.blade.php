@extends('components.layouts.pages-layout')

@section('content')
    <div class="">
        <livewire:slider-show slug="pages.home" />
        {{-- <livewire:hero-section /> --}}
        <livewire:dynamic-navbar />
        <livewire:directives-section />
        <livewire:activities-section />
        <livewire:resource-section />
        <livewire:impact-video />
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:beneficiary-section />
        <livewire:footer-section />
    </div>
@endsection
