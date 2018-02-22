<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta </p>
</div>
<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        @foreach($archives as $stats)
        <li>
        <a href="/?month={{ $stats->month }}&year={{ $stats->year}}">
            {{ $stats->month . ' ' . $stats->year }}
            <span class="badge badge-primary">{{ $stats->published }}</span>
        </a>
        </li>
        @endforeach
    </ol>
</div>
<div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
        <li>
            <a href="#">GitHub</a>
        </li>
    </ol>
</div>