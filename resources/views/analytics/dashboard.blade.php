<h2>Visits Per Year</h2>
<ul>
    @foreach ($visitFacets as $year => $count)
        <li>{{ $year }}: {{ $count }} visits</li>
    @endforeach
</ul>