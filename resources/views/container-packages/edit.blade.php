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
    <form action="{{ route('container-packages.update', $container->id) }}" method="post">
        @method('patch')
        @csrf
        <div>
            <label for="vendor">Vendor:</label>
            <select name="vendor" id="vendor">
                <option value="Victory Aircraft" {{ $container->vendor == 'Defeat Aircraft' ? 'selected' : '' }}>Victory Aircraft</option>
                <option value="Defeat Aircraft" {{ $container->vendor == 'Defeat Aircraft' ? 'selected' : '' }}>Defeat Aircraft</option>
            </select>

            <label for="measurement_system" style="margin-left: 32px">Measurement System:</label>
            <select name="measurement_system" id="measurement_system">
                <option value="US-Imperial" {{ $container->vendor == 'US-Imperial' ? 'selected' : '' }}>US-Imperial</option>
                <option value="VN-Imperial" {{ $container->vendor == 'VN-Imperial' ? 'selected' : '' }}>VN-Imperial</option>
            </select>

            <label for="datetime" style="margin-left: 32px">Date:</label>
            <input type="datetime-local" id="datetime" name="datetime" value="{{ $container->datetime }}">
        </div>

        <div style="margin-top: 8px">
            <label for="container_no" style="color: red">Container #:</label>
            <input type="text" id="container_no" name="container_no" value="{{ $container->container_no }}" readonly>

        </div>
        <div style="margin-top: 8px">
            <label for="receiving">Receiving #:</label>
            <input type="text" id="receiving" name="receiving" value="{{ $container->receiving }}" required>
        </div>

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
                    <input type="hidden" name="package_ids[]" value="{{ $package->id }}">
                    <td><input type="text" name="style_noes[]" value="{{ $package->style_no }}" required></td>
                    <td><input type="text" name="uoms[]" value="{{ $package->uom }}" required></td>
                    <td><input type="text" name="prefixes[]" value="{{ $package->prefix }}" required></td>
                    <td><input type="text" name="suffixes[]" value="{{ $package->suffix }}" required></td>
                    <td><input type="text" name="heights[]" value="{{ $package->height }}" required></td>
                    <td><input type="text" name="widths[]" value="{{ $package->width }}" required></td>
                    <td><input type="text" name="lengths[]" value="{{ $package->length }}" required></td>
                    <td><input type="text" name="weights[]" value="{{ $package->weight }}" required></td>
                    <td><input type="text" name="upcs[]" value="{{ $package->upc }}" required></td>
                    <td><input type="text" name="size1s[]" value="{{ $package->size1 }}" required></td>
                    <td><input type="text" name="color1s[]" value="{{ $package->color1 }}" required></td>
                    <td><input type="text" name="size2s[]" value="{{ $package->size2 }}"></td>
                    <td><input type="text" name="color2s[]" value="{{ $package->color2 }}"></td>
                    <td><input type="text" name="size3s[]" value="{{ $package->size3 }}"></td>
                    <td><input type="text" name="color3s[]" value="{{ $package->color3 }}"></td>
                    <td><input type="text" name="cartons[]" value="{{ $package->carton }}" required></td>
                </tr>
            @endforeach

            </tbody>

        </table>

        <div style="margin-top: 48px">
            <button id="btn_add_row">Add</button>
            <input id="row_num" type="number" min="1" value="1" style="width: 48px">
            <span>#row</span>
        </div>

        <div style="margin-top: 24px">
            <button type="submit">Submit</button>
            <button onclick="window.history.back()">Cancel</button>
        </div>
    </form>

    <div style="margin-top: 24px">
        <a href="/">Main Menu</a>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert('Error!');
            </script>
        @endforeach
    @endif
@endsection

@push('js')

    <script>
        // Get now for datetime input
        let now = new Date();
        document.getElementById("datetime").value = now.toISOString().substring(0, 16);
    </script>

    <script>
        const table = document.getElementById("table");
        const btnAddRow = document.getElementById("btn_add_row");

        btnAddRow.addEventListener("click", function(event) {
            event.preventDefault();
            const rowNum = document.getElementById("row_num").value;
            addRows(rowNum);
        });

        // Add new row
        const addRow = () => {
            const newRow = table.insertRow();
            const cell1 = newRow.insertCell(0).innerHTML = `<input type="text" name="style_noes[]" required>`;
            const cell2 = newRow.insertCell(1).innerHTML = `<input type="text" name="uoms[]" required>`;
            const cell3 = newRow.insertCell(2).innerHTML = `<input type="text" name="prefixes[]" required>`;
            const cell4 = newRow.insertCell(3).innerHTML = `<input type="text" name="suffixes[]" required>`;
            const cell5 = newRow.insertCell(4).innerHTML = `<input type="text" name="heights[]" required>`;
            const cell6 = newRow.insertCell(5).innerHTML = `<input type="text" name="widths[]" required>`;
            const cell7 = newRow.insertCell(6).innerHTML = `<input type="text" name="lengths[]" required>`;
            const cell8 = newRow.insertCell(7).innerHTML = `<input type="text" name="weights[]" required>`;
            const cell9 = newRow.insertCell(8).innerHTML = `<input type="text" name="upcs[]" required>`;
            const cell10 = newRow.insertCell(9).innerHTML = `<input type="text" name="size1s[]" required>`;
            const cell11 = newRow.insertCell(10).innerHTML = `<input type="text" name="color1s[]" required>`;
            const cell12 = newRow.insertCell(11).innerHTML = `<input type="text" name="size2s[]">`;
            const cell13 = newRow.insertCell(12).innerHTML = `<input type="text" name="color2s[]">`;
            const cell14 = newRow.insertCell(13).innerHTML = `<input type="text" name="size3s[]">`;
            const cell15 = newRow.insertCell(14).innerHTML = `<input type="text" name="color3s[]">`;
            const cell16 = newRow.insertCell(15).innerHTML = `<input type="text" name="cartons[]" required>`;
        }

        // Add multi row
        const addRows = (rowNum) => {
            console.log(rowNum)
            for (let i = 0; i < rowNum; i++) {
                addRow();
            }
        }
    </script>

@endpush
