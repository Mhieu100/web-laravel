@extends('layouts.app')

@section('title')
{{ $category->name }}
@endsection

@section('content')

    <livewire:frontend.product.index :category="$category" />

@endsection
