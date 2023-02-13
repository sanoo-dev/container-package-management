@extends('master')

@push('css')
@endpush

@section('main-content')

    <a href="{{ route('container-packages.index') }}" class="button">List Container Package</a>
    <a href="{{ route('container-packages.create') }}" class="button">Add New Container Package</a>

@endsection

@push('js')
@endpush
