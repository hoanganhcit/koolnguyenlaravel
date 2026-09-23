 <!-- Header -->
 <nav class="navbar animated slideInDown">
     <div class="navbar-left">
         <a href="{{ url('/') }}" class="navbar-brand" title="Kool Nguyen – Photography / Visual stories">
             <span class="brand-name">Kool Nguyen</span>
             <span class="brand-tagline">Photography / Visual stories</span>
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
