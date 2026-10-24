
@extends('layouts.app')
@section('header', 'Create Item')
@section('content')
    <div class="bg-white shadow-sm rounded-lg p-6">
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('items.index') }}" class="text-gray-600 hover:text-gray-900 py-2 px-4">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Item</button>
            </div>
        </form>
    </div>
@endsection
