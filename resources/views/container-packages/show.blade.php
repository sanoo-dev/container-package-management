@extends('master')

@push('css')
    <style>
        td > input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
@endpush

@section('main-content')
        <table style="width: auto;">
            <tr>
                <th>Container #:</th>
                <td>{{ $container->container_no }}</td>
            </tr>
            <tr>
                <th>Vendor:</th>
                <td>{{ $container->vendor }}</td>
            </tr>
            <tr>
                <th>Measurement System:</th>
                <td>{{ $container->measurement_system }}</td>
            </tr>
            <tr>
                <th>Receiving #:</th>
                <td>{{ $container->receiving }}</td>
            </tr>
            <tr>
                <th>Date:</th>
                <td>{{ $container->datetime }}</td>
            </tr>
        </table>

        <table id="table" style="margin-top: 80px">
            <thead>
            <tr>
                <th style="color: red">STYLE NO</th>
                <th style="color: red">UOM</th>
                <th style="color: red">PREFIX</th>
                <th style="color: red">SUFFIX</th>
                <th style="color: red">HEIGHT#</th>
                <th style="color: red">WIDTH</th>
                <th style="color: red">LENGTH</th>
                <th style="color: red">WEIGHT</th>
                <th style="color: red">UPC</th>
                <th style="color: red">SIZE 1</th>
                <th style="color: red">COLOR 1</th>
                <th>SIZE 2</th>
                <th>COLOR 2</th>
                <th>SIZE 3</th>
                <th>COLOR 3</th>
                <th style="color: red"># CARTON</th>
            </tr>
            </thead>
            <tbody>
            @foreach($container->packages as $package)
                <tr>
                    <td>{{ $package->style_no }}</td>
                    <td>{{ $package->uom }}</td>
                    <td>{{ $package->prefix }}</td>
                    <td>{{ $package->suffix }}</td>
                    <td>{{ $package->height }}</td>
                    <td>{{ $package->width }}</td>
                    <td>{{ $package->length }}</td>
                    <td>{{ $package->weight }}</td>
                    <td>{{ $package->upc }}</td>
                    <td>{{ $package->size1 }}</td>
                    <td>{{ $package->color1 }}</td>
                    <td>{{ $package->size2 }}</td>
                    <td>{{ $package->color2 }}</td>
                    <td>{{ $package->size3 }}</td>
                    <td>{{ $package->color3 }}</td>
                    <td>{{ $package->carton }}</td>

                </tr>
            @endforeach
            </tbody>

        </table>

        <div style="margin-top: 24px">
            <button onclick="window.history.back()">Back</button>
        </div>

    <div style="margin-top: 24px">
        <a href="/">Main Menu</a>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
@endsection

@push('js')
@endpush
