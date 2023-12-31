 <!-- Sidebar Menu -->

@props([
'active' =>  Route::currentRouteName(),
'items' => config('items'),


])
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">

        <ul class="nav nav-treeview">
            @foreach ($items as $item)

            <li class="nav-item">
                <a href="{{ route($item['route'] )}}" class="nav-link {{ $active == $item['route'] ? "active" : "" }}">
                  <i class="{{ $item['icon'] }}"></i>
               <label hidden type="text">   {{$a= $item['title'] }}</label>
    
                  <p>@lang("site.$a")</p>
                </a>
              </li>
            @endforeach



        </ul>

      </li>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
