<?php

function employee_insert()
{
    //echo "insert page";
?>
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form name="frm" action="#" method="post">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="nm"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="adrs"></td>
                </tr>
                <tr>
                    <td>Desigination:</td>
                    <td><select name="des">
                            <option value="Developer">Developer</option>
                            <option value="Designer">Designer</option>
<<<<<<< HEAD
=======
                            <option value="marketing">Marketing</option>
                            <option value="hr">HR</option>
>>>>>>> c8e8f583c0ece295cb11b8ea884fdbf0933ff020
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mob no:</td>
                    <td><input type="number" name="mob"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Insert" name="ins"></td>
                </tr>
            </form>
        </tbody>
    </table>
    <?php
    if (isset($_POST['ins'])) {
        global $wpdb;
        $nm = $_POST['nm'];
        $ad = $_POST['adrs'];
        $d = $_POST['des'];
        $m = $_POST['mob'];
        $table_name = $wpdb->prefix . 'employee_list';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'address' => $ad,
                'role' => $d,
                'contact' => $m
            )
        );
        echo "inserted";
        // wp_redirect( admin_url('admin.php?page=page=Employee_List'),301 );

        //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
        //  header("http://google.com");
    ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing" />
<?php
        exit;
    }
}

?>