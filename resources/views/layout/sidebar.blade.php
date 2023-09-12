 <nav class="sidebar">
     <div class="sidebar-header">
         <a href="#" class="sidebar-brand">
             <img src="{{ asset('assets/images/logo.png') }}" alt="">
         </a>
         <div class="sidebar-toggler not-active">
             <span></span>
             <span></span>
             <span></span>
         </div>
     </div>
     <div class="sidebar-body">
         <ul class="nav">
             <li class="nav-item {{ active_class(['/']) }}">
                 <a href="{{ url('/') }}" class="nav-link">
                     <i class="link-icon" data-feather="box"></i>
                     <span class="link-title">{{ __('Dashboard') }}</span>
                 </a>
             </li>

             <li class="nav-item {{ active_class(route('services.index')) }}">
                 <a href="{{ route('services.index') }}" class="nav-link">
                     <i class="link-icon" data-feather="message-square"></i>
                     <span class="link-title">@lang('Services')</span>
                 </a>
             </li>
             <li class="nav-item {{ active_class(route('store.index')) }}">
                 <a href="{{ route('store.index') }}" class="nav-link">
                     <i class="link-icon" data-feather="message-square"></i>
                     <span class="link-title">@lang('Stores')</span>
                 </a>
             </li>
             <li class="nav-item {{ active_class(route('setting.index')) }}">
                 <a href="{{ route('setting.index') }}" class="nav-link">
                     <i class="link-icon" data-feather="message-square"></i>
                     <span class="link-title">@lang('Media Settings')</span>
                 </a>
             </li>
             <li class="nav-item {{ active_class(route('general_settings.edit')) }}">
                 <a href="{{ route('general_settings.edit') }}" class="nav-link">
                     <i class="link-icon" data-feather="message-square"></i>
                     <span class="link-title">@lang('General Settings')</span>
                 </a>
             </li>


             <li class="nav-item">
                 <a href="https://www.Petzania.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
                     <i class="link-icon" data-feather="hash"></i>
                     <span class="link-title">Documentation</span>
                 </a>
             </li>
         </ul>
     </div>
 </nav>
