<!-- <head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head> -->
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-teal elevation-4 sidebar-no-expand bg-navy disabled">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-teal text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black" style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">

          
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item dropdown">

                   <li class="nav-header">Spam Analytics</li>
                   <li class="nav-item">
                      <a href="./" class="nav-link nav-home">
                      <i class="nav-icon fas fa-sms"></i>
                        <p>
                          Spam Counts
                        </p>
                      </a>
                    </li>
              


                    
                    <!-- Change Page Link -->
                    <li class="nav-item">
                      <a href="../js_dashboard/Dashboard-main.html" class="nav-link nav">
                      <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                          Spam Dashboard
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?php echo base_url ?>admin/?page=about" class="nav-link nav-about">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          Developers
                        </p>
                      </a>
                    </li>
                    
                    <?php if($_settings->userdata('type') == 1): ?>
                    <li class="nav-header">Maintenance</li>
                    
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    


                    <!-- System Name Settings -->
                    <!-- <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li> -->
                    <?php endif; ?>

                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      
      
      <script>
       $(document).ready(function () {
   var page;

   page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
   page = page.replace(/\//gi, '_');

   // Check for active navigation link
   if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active');

      if ($('.nav-link.nav-' + page).hasClass('tree-item')) {
         $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active');
         $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open');
      }

      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree')) {
         $('.nav-link.nav-' + page).parent().addClass('menu-open');
      }
   }

   // Click event handler to navigate to js_dashboard
   $('.nav-link.nav-js_dashboard').click(function (event) {
      event.preventDefault(); // Prevent the default behavior of the link
      window.location.href = '<?php echo base_url ?>js_dashboard/?page=js_dashboard';
   });
});






    var page;
    $(document).ready(function(){
        page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
        page = page.replace(/\//gi,'_');

        if($('.nav-link.nav-'+page).length > 0){
            $('.nav-link.nav-'+page).addClass('active')
            if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
                $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
                $('.nav-link.nav-'+page).parent().addClass('menu-open')
            }
        }
    })
</script>

