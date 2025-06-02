@extends('layouts.app')

@section('title', 'Personal Computers')

@section('content')
<h1 class="text-2xl font-bold mb-4">Personal Computers</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach ($pcs as $pc)
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-lg font-semibold">{{ $pc->name }}</h2>
            <p>{{ $pc->description }}</p>
            <p class="font-bold text-green-600">${{ $pc->price }}</p>
        </div>
    @endforeach
</div>
@endsection
