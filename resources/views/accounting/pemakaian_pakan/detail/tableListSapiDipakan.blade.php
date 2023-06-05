<h5>Sapi dipakan</h5>

<table id="example2" class="display " style="width:100%">
    <thead>
        <tr>
            <th scope="col" style="width: 3em">#</th>
            <th scope="col">Eartag</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listMarkup as $markup)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $markup->sapi->eartag }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
