@extends('layouts.app')

@section('title', config('portfolio.name') . ' — ' . config('portfolio.headline'))

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.education')
    @include('sections.skills')
    @include('sections.projects')
    @include('sections.contact')
@endsection