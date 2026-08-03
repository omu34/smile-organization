@extends('components.layouts.pages-layout')

@section('content')
    <livewire:slider-show slug="contact-page-slider" />
    <div class="mx-auto ">
        <livewire:dynamic-navbar />  
        <livewire:visit-us-section />      
        <livewire:featured-articles-section />        
    </div>
    <livewire:footer-section />
@endsection
