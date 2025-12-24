<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title"><span>Main</span></li>

        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
        </li>

        <li class="menu-title"><span>Content</span></li>

        {{-- News --}}
        <li class="submenu">
          <a href="#"
             class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="la la-newspaper-o"></i> <span>News</span> <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a class="{{ request()->routeIs('admin.news.index') ? 'active' : '' }}"
                 href="{{ route('admin.news.index') }}">All News</a>
            </li>
            <li>
              <a class="{{ request()->routeIs('admin.news.create') ? 'active' : '' }}"
                 href="{{ route('admin.news.create') }}">Add News</a>
            </li>
          </ul>
        </li>

        {{-- Announcements --}}
        <li class="submenu">
          <a href="#"
             class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
            <i class="la la-bullhorn"></i> <span>Announcements</span> <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a class="{{ request()->routeIs('admin.announcements.index') ? 'active' : '' }}"
                 href="{{ route('admin.announcements.index') }}">All Announcements</a>
            </li>
            <li>
              <a class="{{ request()->routeIs('admin.announcements.create') ? 'active' : '' }}"
                 href="{{ route('admin.announcements.create') }}">Add Announcement</a>
            </li>
          </ul>
        </li>

                {{-- Shows --}}
        <li class="submenu">
          <a href="#"
             class="{{ request()->routeIs('admin.shows.*') ? 'active' : '' }}">
              <i class="la la-tv"></i> <span>Shows</span> <span class="menu-arrow"></span>
          </a>
          <ul style="display: none;">
            <li>
              <a class="{{ request()->routeIs('admin.shows.index') ? 'active' : '' }}"
                 href="{{ route('admin.shows.index') }}">All Shows</a>
            </li>
            <li>
              <a class="{{ request()->routeIs('admin.shows.create') ? 'active' : '' }}"
                 href="{{ route('admin.shows.create') }}">Add Show</a>
            </li>
          </ul>
        </li>

        {{-- Stats --}}
        <li class="{{ request()->routeIs('admin.stats.*') ? 'active' : '' }}">
          <a href="{{ route('admin.stats.index') }}"><i class="la la-signal"></i> <span>Stats</span></a>
        </li>

        {{-- Users (unchanged) --}}
        <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
          <a href="{{ route('users') }}"><i class="la la-user-plus"></i> <span>Users</span></a>
        </li>

        {{-- Settings (unchanged) --}}
        <li class="{{ request()->routeIs('settings.theme') ? 'active' : '' }}">
          <a href="{{ route('settings.theme') }}"><i class="la la-cog"></i> <span>Settings</span></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->
