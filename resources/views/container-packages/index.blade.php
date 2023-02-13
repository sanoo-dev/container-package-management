@extends('master')

@push('css')
    <style>
        input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
@endpush

@section('main-content')
    <a href="{{ route('container-packages.create') }}" class="button">Add new container package</a>
    <table style="margin-top: 8px">
        <tr>
            <th>Container #</th>
            <th>Vendor</th>
            <th>Measurement System</th>
            <th>Receiving #</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        @foreach($containers as $container)
            <tr>
                <td>{{ $container->container_no }}</td>
                <td>{{ $container->vendor }}</td>
                <td>{{ $container->measurement_system }}</td>
                <td>{{ $container->receiving }}</td>
                <td>{{ $container->datetime }}</td>
                <td>
                    <a href="{{ route('container-packages.show', $container->id) }}" class="button">Show</a>
                    <a href="{{ route('container-packages.edit', $container->id) }}" class="button">Edit</a>
                    <form action="{{ route('container-packages.destroy', $container->id) }}"
                          method="post"
                          style="display: inline">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div style="margin-top: 24px">
        <a href="/">Main Menu</a>
    </div>
@endsection

@push('js')
@endpush
