
@extends('layouts.app')
@section('header', 'Item Details')
@section('content')
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="mb-6">
            <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Name</p>
            <p class="text-lg text-gray-900">{{ $item->name }}</p>
        </div>
        <div class="mb-6">
            <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Description</p>
            <p class="text-lg text-gray-900">{{ $item->description ?? 'No description' }}</p>
        </div>
        <div class="flex justify-start">
            <a href="{{ route('items.index') }}" class="text-gray-600 hover:text-gray-900 py-2 px-4 mr-4">Back to List</a>
            <a href="{{ route('items.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Item</a>
        </div>
    </div>
@endsection
