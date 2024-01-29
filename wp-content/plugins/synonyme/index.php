<?php
/*
  Plugin Name: Synonyme 
  Description: Crud operation
  Version: 1.0
  Author : Prince Imran
*/

register_activation_hook(__FILE__, 'table_creator');
function table_creator()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'synonyme';
    $sql = "DROP TABLE IF EXISTS $table_name ;
            CREATE TABLE $table_name(
                id int(11) NOT NULL AUTO_INCREMENT,
                name TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY id(id)
            )$charset_collate;";
    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);
}
add_action("admin_menu", "da_display_esm_menu");

function da_display_esm_menu()
{
    add_menu_page("SYNONYME", "SYNONYME", "manage_options", "syn-list", "da_syn_list_callback");
    add_submenu_page("syn-list", "Synonyme List", "Synonyme List", "manage_options", "syn-list", "da_syn_list_callback");
    add_submenu_page("syn-list", " ", " ", "manage_options", "add-syn", "da_syn_add_callback");
    add_submenu_page(null, "Update Synonyme", "Update Synonyme", "manage_options", "update-syn", "da_syn_update_callback");
    add_submenu_page(null,"Delete Employee",'Delete Employee','manage_options','delete-syn',"da_syn_delete_callback");
}

function da_syn_list_callback()
{   
    ?>

    <a href="admin.php?page=add-syn" class="page-title-action">Add New</a>
    <?php
    echo "<h2>Synonyme List </h2>";
    global $wpdb;
    $table_name= $wpdb->prefix."synonyme";
    $synonyme=$wpdb->get_results(
        $wpdb->prepare(
            "select * FROM $table_name",""),ARRAY_A
        );
        if(count($synonyme)>0):?>
        <div>
            <table border="1">
                <tr>
                    <th>SR.NO</th>
                   <th>Name</th>
                    <th>Action</th>
                </tr>
                <?php $i=1;
                foreach($synonyme as $index =>$synonyme):?>
                    <tr>
                        <td><?php echo $synonyme['id'] ;?></td>
                        <td><?php echo $synonyme['name'] ;?></td>
                        <td>
                            <a href="admin.php?page=update-syn&id=<?php echo $synonyme['id'];?>">Edit</a>
                            <a href="admin.php?page=delete-syn&id=<?php echo $synonyme['id'];?>">Delete</a>
                        </td>
                    
                    </tr>
                <?php endforeach;?>
            

            </table>
        </div>

    <?php
      endif;
     
 
}
function da_syn_add_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "synonyme";
    $msg = "";

    if (isset($_REQUEST['submit'])) {
        

 
        $wpdb->insert("$table_name", [
            "name" => $_REQUEST['name']

        ]);
        if ($wpdb->insert_id > 0) {
            $msg = 'Saved successfullay';

           ?>
            <script>
              location.href="<?php  echo site_url();?>/wp-admin/admin.php?page=syn-list";
            </script>
              
           <?php



            
        } else {
            $msg = 'Failed to save';
        }
    }

 ?>
    <h4><?php echo $msg; ?></h4>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="w-50 m-auto  p-5 ">
        <h1>Add New Synonyme</h1>

        <form id="form" method="post">
            <div class="mb-3 w-50  ">
                <label for="exampleInpuSynonyme" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInpuSynonyme" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php

}

function da_syn_update_callback(){
    global $wpdb;
    $table_name = $wpdb->prefix . "synonyme";
    $msg = "";
    $id = isset($_REQUEST['id'])? intval($_REQUEST['id']) :"";
    if (isset($_REQUEST['update'])) {
    
         
        if(!empty($id)){
            
 
        $wpdb->update("$table_name", [
            "name" => $_REQUEST['name']

        ],[
            "id" => $id
        ]);
        $msg ="Data updated";
        ?>
        <script>
              location.href="<?php  echo site_url();?>/wp-admin/admin.php?page=syn-list";
            </script>

            <?php
        
    }
    }
    $synonyme_update=$wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name where id = %d",$id
        ),ARRAY_A
    )

 ?>
    <h4><?php echo $msg; ?></h4>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="w-50 m-auto  p-5 ">
        <h1>Add New Synonyme</h1>

        <form id="form" method="post">
            <div class="mb-3 w-50  ">
                <label for="exampleInpuSynonyme" class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $synonyme_update['name'] ;?>" class="form-control" id="exampleInpuSynonyme" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
}

function da_syn_delete_callback(){
    global $wpdb;
    $table_name=$wpdb->prefix."synonyme";
    $id = isset($_REQUEST['id'])? intval($_REQUEST['id']):"";

    if(isset($_REQUEST['delete'])){
        if($_REQUEST['conf']=='yes'){
            $row_exits = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT * FROM $table_name WHERE  id =%d ",$id
                ),ARRAY_A
            );
            if(count($row_exits)>0){
                $wpdb->delete("$table_name",array(
                    'id'=>$id,
                ));
            }
        }
        ?>
        <script>
            location.href="<?php  echo site_url();?>/wp-admin/admin.php?page=syn-list";
        </script>
        <?php
    }


    ?>
    <form action="" method="post">
        <p>
            <label for="">Are your sure want to delete</label>
            <input type="radio" name="conf" value="yes" id="">Yes
            <input type="radio" name="conf" id="" value="no" checked>No
        </p>
        <p>
            <button type="submit" name="delete">Delete</button>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </p>
    </form>

    <?php
}