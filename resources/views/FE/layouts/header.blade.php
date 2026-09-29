 <!-- Header -->
 <nav class="navbar animated slideInDown">
     <div class="navbar-left">
         <a href="{{ url('/') }}" class="navbar-brand" title="{{ $siteSettings['site_title'] ?? 'Kool Nguyen' }} – Photography / Visual stories">
             @if (!empty($siteSettings['site_logo']))
                 <img src="{{ asset('public/storage/' . $siteSettings['site_logo']) }}" alt="{{ $siteSettings['site_title'] ?? 'Kool Nguyen' }}" style="max-height: 42px; max-width: 180px; object-fit: contain;">
             @else
                <span class="brand-name">{{ $siteSettings['site_title'] ?? 'Kool Nguyen' }}</span>
                <span class="brand-tagline">Photography / Visual stories</span>
             @endif
         </a>
     </div>
     <div id="open-overlay-nav" class="hamburger">
         <span class="hamburger__line"></span>
         <span class="hamburger__line"></span>
         <span class="hamburger__line"></span>
     </div>
 </nav>
 <!-- /Header -->
 <!-- Overlay Menu -->
 <div class="popup popup__menu">
     <div class="popup-inner">
         <div class="dl-menu__wrap dl-menuwrapper">
             <ul class="dl-menu dl-menuopen">
                 <li>
                     <a href="{{ url('/') }}" data-i18n="menu.home">Home</a>
                 </li>
                 <li><a href="{{ url('about') }}" data-i18n="menu.about">About Me</a></li>
                 <li>
                     <a href="{{ url('gallery') }}" data-i18n="menu.works">Works</a>
                 </li>
                 <li>
                     <a href="{{ url('blog') }}" data-i18n="menu.blog">Blog</a>
                 </li>
                 <li><a href="{{ url('contact') }}" data-i18n="menu.contact">Contact</a></li>
                 <li>
                     <button class="theme-toggle theme-toggle-menu" type="button" aria-label="Switch to light theme"
                         aria-pressed="false">
                         <i class="theme-toggle__icon theme-toggle__icon_sun fa fa-sun-o" aria-hidden="true"></i>
                         <i class="theme-toggle__icon theme-toggle__icon_moon fa fa-moon-o" aria-hidden="true"></i>
                         <span class="theme-toggle__label">Light Mode</span>
                     </button>
                 </li>
                 <li>
                     <button class="language-toggle" id="language-toggle" type="button"
                         aria-label="Switch to Vietnamese" aria-pressed="false">
                         <span class="language-toggle__option language-toggle__option_en">EN</span>
                         <span class="language-toggle__option language-toggle__option_vi">VI</span>
                     </button>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- /Overlay Menu -->
