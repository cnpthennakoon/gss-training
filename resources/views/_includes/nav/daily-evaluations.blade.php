<div class="side-menu p-l-10 p-t-10 p-r-2">
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('home') }}">Home</a></li>
        </ul>
        <p class="menu-label">
            Summary Viewer
        </p>
        <ul class="menu-list">
            {{--<li>--}}
                {{--<a>Roles & Permissions</a>--}}
                {{--<ul>--}}
                    {{--<li><a>Roles</a></li>--}}
                    {{--<li><a>Permissions</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li><a href="{{ route('daily-evaluations') }}">View Summary</a></li>
        </ul>
        <p class="menu-label">
            New Daily Evaluation
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('audits.index') }}">New Audits</a></li>
            <li><a href="#">Audit Form</a></li>
            <li><a href="{{ route('daily-audits.create') }}">Import Excel</a></li>
        </ul>
    </aside>
</div>