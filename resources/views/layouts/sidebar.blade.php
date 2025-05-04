<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name">SmartHire</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>

            
            @if(Auth::user()->role === 'admin')
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i data-feather="users"></i><span>Users</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <a href="{{ route('admin.jobs.index') }}" class="nav-link">
                    <i data-feather="briefcase"></i><span>Jobs</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <a href="{{ route('admin.applications.index') }}" class="nav-link">
                    <i data-feather="file-text"></i><span>Applications</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.interviews.*') ? 'active' : '' }}">
                <a href="{{ route('admin.interviews.index') }}" class="nav-link">
                    <i data-feather="calendar"></i><span>Interviews</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <a href="{{ route('admin.messages.index') }}" class="nav-link">
                    <i data-feather="message-circle"></i><span>Messages</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                <a href="{{ route('admin.notifications.index') }}" class="nav-link">
                    <i data-feather="bell"></i><span>Notifications</span>
                </a>
            </li>

            @elseif(Auth::user()->role === 'recruiter')
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('recruiter.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('recruiter.jobs.*') ? 'active' : '' }}">
                <a href="{{ route('recruiter.jobs.index') }}" class="nav-link">
                    <i data-feather="briefcase"></i><span>Jobs</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('recruiter.applications.*') ? 'active' : '' }}">
                <a href="{{ route('recruiter.applications.index') }}" class="nav-link">
                    <i data-feather="file-text"></i><span>Applications</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('recruiter.messages.*') ? 'active' : '' }}">
                <a href="{{ route('recruiter.messages.index') }}" class="nav-link">
                    <i data-feather="message-circle"></i><span>Messages</span>
                </a>
            </li>

            @elseif(Auth::user()->role === 'user')
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('candidat.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('candidat.applications.*') ? 'active' : '' }}">
                <a href="{{ route('candidat.applications.index') }}" class="nav-link">
                    <i data-feather="file-text"></i><span>My Applications</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('candidat.messages.*') ? 'active' : '' }}">
                <a href="{{ route('candidat.messages.index') }}" class="nav-link">
                    <i data-feather="message-circle"></i><span>Messages</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('candidat.profile.*') ? 'active' : '' }}">
                <a href="{{ route('candidat.profile.index') }}" class="nav-link">
                    <i data-feather="user"></i><span>Profile</span>
                </a>
            </li>
            @endif
        </ul>

    </aside>
</div>