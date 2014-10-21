<ul class="sidebar-menu">
    <li class="{{ HTML::sub('dashboard') }}">
        <a href="{{ URL::to('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/quotes') }}">
        <a href="{{ URL::to('dashboard/quotes') }}">
            <i class="fa fa-comment"></i> <span>Quotes</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/authors') }}">
        <a href="{{ URL::to('dashboard/authors') }}">
            <i class="fa fa-pencil"></i> <span>Authors</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/professions') }}">
        <a href="{{ URL::to('dashboard/professions') }}">
            <i class="fa fa-paint-brush"></i> <span>Professions</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/topics') }}">
        <a href="{{ URL::to('dashboard/topics') }}">
            <i class="fa fa-comments"></i> <span>Topics</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/tags') }}">
        <a href="{{ URL::to('dashboard/tags') }}">
            <i class="fa fa-tags"></i> <span>Tags</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/nationalities') }}">
        <a href="{{ URL::to('dashboard/nationalities') }}">
            <i class="fa fa-flag"></i> <span>Nationalities</span>
        </a>
    </li>

    <li class="{{ HTML::nav('dashboard/qotd') }}">
        <a href="{{ URL::to('dashboard/qotd') }}">
            <i class="fa fa-quote-left"></i> <span>Quote of the Day</span>
        </a>
    </li>
</ul>