@extends('components.layouts.about-layout')

@section('content')
    <div class="">
        {{-- <livewire:hero-section /> --}}
        <livewire:dynamic-navbar />
        {{-- <livewire:directives-section />
        {{-- <livewire:activities-section /> --}}
        <livewire:about-page />
        {{-- <livewire:impact-video /> <!-- from earlier step -->
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:about-page />
        <livewire:beneficiary-section /> --}}
        <livewire:footer-section />
    </div>
@endsection
