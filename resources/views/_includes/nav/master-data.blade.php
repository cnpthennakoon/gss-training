<div class="side-menu p-l-10 p-t-10 p-r-2">
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            {{--<li><a href="{{ route('training-dashboard') }}">Training Module</a></li>--}}
        </ul>

        <p class="menu-label">
            Master Data
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('region.index') }}">Regions</a></li>
            <li><a href="{{ route('country.index') }}">Countries</a></li>
            <li><a href="{{ route('global-project.index') }}">Global Projects</a></li>
            <li><a href="{{ route('project.index') }}">Projects</a></li>
            <li><a href="{{ route('manufacturer.index') }}">Manufacturers</a></li>
            <li><a href="{{ route('image-flaw.index') }}">Image Flaws</a></li>
            <li><a href="{{ route('error-type.index') }}">Error Types</a></li>
            <li><a href="{{ route('responsibility.index') }}">Responsibilities</a></li>
            <li><a href="{{ route('training-project-status.index') }}">Training Project Status</a></li>
            <li><a href="{{ route('training-center.index') }}">Training Center</a></li>
            <li><a href="{{ route('training-batch-status.index') }}">Training Batch Status</a></li>
            <li><a href="{{ route('training-batch-type.index') }}">Training Batch Types</a></li>
            <li><a href="{{ route('training-nature.index') }}">Training Batch Nature</a></li>
            <li><a href="{{ route('attrition-type.index') }}">Attrition Types</a></li>
            <li><a href="{{ route('attrition-reason.index') }}">Attrition Reasons</a></li>

        </ul>

    </aside>
</div>