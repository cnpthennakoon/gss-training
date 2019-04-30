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
            {{--<li><a href="{{ route('training-dashboard') }}"><small>Training Center Summary</small></a></li>--}}
            {{--<li><a href="{{ route('training-dashboard') }}"><small>QAT Attrition Summary</small></a></li>--}}
            {{--<li><a href="{{ route('training-summary') }}"><small>Training Center Summary</small></a></li>--}}
            {{--<li><a href="{{ route('training-dashboard') }}"><small>QAT Attrition Summary</small></a></li>--}}
        </ul>
        <p class="menu-label">
            QAT Details
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('qat-shortfall.index') }}"><small>QAT Shortfall</small></a></li>
            <li><a href="{{ route('training-batch.index') }}"><small>QAT Training Data</small></a></li>
            <li><a href="{{ route('attrition.index') }}"><small>QAT Attrition</small></a></li>
            {{--<li><a href="{{ route('daily-audits.create') }}">Import Excel</a></li>--}}
        </ul>
        <p class="menu-label">
            Master Data
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('master-data') }}"><small>Master Data</small></a></li>
        </ul>
    </aside>
</div>