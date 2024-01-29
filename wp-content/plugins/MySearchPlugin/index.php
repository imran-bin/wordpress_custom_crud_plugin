<?php

/*
Plugin Name: My Search Plugin
Description: Add custom search options to WooCommerce.
Version: 1.0
Author: Your Name
*/

// Add a new menu item under WooCommerce
function add_custom_submenu()
{
  add_submenu_page('woocommerce','My Search Plugin','MySearchPlugin','manage_options','my-search-plugin','my_search_plugin_page',);
  add_submenu_page(null,'','','manage_options','overview','overview_callback');
  add_submenu_page(null,'','','manage_options','searchbar','searchbar_callback');
  add_submenu_page(null,'','','manage_options','searchlogic','search_logic_callback');
  add_submenu_page(null,'','','manage_options','index','index_callback');
}

add_action('admin_menu', 'add_custom_submenu', 99);

function my_search_plugin_page()
{ ?>
  <form method="post" id="mainform" action="" enctype="multipart/form-data">
    <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
      <a href="admin.php?page=overview" class="nav-tab nav-tab-active">Over view</a>
      <a href="admin.php?page=searchbar" class="nav-tab ">Search bar</a>
      <a href="admin.php?page=searchlogic" class="nav-tab ">Search Logic</a>
      <a href="admin.php?page=index" class="nav-tab ">Index</a>
    </nav>   
</div>
 
  </form>
<?php }
function overview_callback(){

  my_search_plugin_page();
   ?>
   <h2>Plugin status indicator: <small class="text-success">Active</small></h2>
   <h2>Quick Statistic: <small>Face v2</small></h2>


<?php
}

function searchbar_callback(){
  my_search_plugin_page();
  echo "search bar setting";
}

function search_logic_callback(){
  my_search_plugin_page();
  echo "search logic";
}
function index_callback()  {
  my_search_plugin_page();
  echo "index";
}


 


