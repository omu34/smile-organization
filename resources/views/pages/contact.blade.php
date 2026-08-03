@extends('components.layouts.contact-layout')

@section('content')
    <livewire:slider-show slug="contact-page-slider" />
    <div class="mx-auto ">
        <livewire:dynamic-navbar />        
        <livewire:featured-articles-section />       
        <livewire:visit-us-section />
    </div>
    <livewire:footer-section />
@endsection
