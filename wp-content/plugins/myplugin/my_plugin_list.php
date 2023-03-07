<?php
// insert table 

// if (isset($_POST['submit'])) {
//     global  $wpdb;
//     $name = $_POST['name'];
//     $email = $_POST['email'];

//     $wpdb->query("INSERT INTO $table(name,email) VALUES('$name','$email')");

//     echo "<script>location.replace('admin.php?page=crud.php');</script>";
// }
?>

<div class="wrap">
    <h2>CRUD Operations</h2>
    <table class="wp-list-table widefat striped">
        <thead>
            <tr>
                <th width="25%">ID</th>
                <th width="25%">Name</th>
                <th width="25%">Email Address</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<?php
global $wpdb;
$table = $wpdb->prefix . 'crud_list';
$user = $wpdb->get_results("SELECT * FROM $table");

foreach ($user as $print) {
?>
    echo "
    <tr>
        <td width='25%'>$print->id</td>
        <td width='25%'>$print->name</td>
        <td width='25%'>$print->email</td>
        <td width='25%'>
            <a href='admin.php?page=crud.php&upt=$print->id'>
                <button type='button'>UPDATE</button>
            </a>
            <a href='admin.php?page=crud.php&del=$print->id'>
                <button type='button'>DELETE</button>
            </a>
        </td>
    </tr>
    ";
<?php }
?>