@extends('components.layouts.pages-layout')

@section('content')
    <div class="">
        <livewire:hero-section />
        <livewire:dynamic-navbar />
        <livewire:directives-section />
        <livewire:activities-section />
        <livewire:resource-section />
        <livewire:impact-video /> <!-- from earlier step -->
        <livewire:partners-section />
        <livewire:gallery-section />
        <livewire:beneficiary-section />
        <livewire:footer-section />
    </div>
@endsection
