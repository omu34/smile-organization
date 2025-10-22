@extends('components.layouts.pages-layout')

@section('content')
    <div class="">
        <livewire:dynamic-navbar />
        <livewire:hero-section />
        <livewire:directives-section />
        <livewire:activities-section />
        <livewire:resource-section />
        <livewire:impact-video /> <!-- from earlier step -->
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:social-links-component />
        <livewire:beneficiary-section />
        <livewire:footer-section />

    </div>
@endsection
