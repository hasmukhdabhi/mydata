<form action="" method="post">
    <tr>
        <td><input type="text" value="AUTO_GENERATED" disabled></td>
        <td><input type="text" id="name" name="name" placeholder="Enter your name"></td>
        <td><input type="text" id="email" name="email" placeholder="Enter your email"></td>
        <td><button id="submit" name="submit" type="submit">INSERT</button></td>
    </tr>
</form>

<?php
if (isset($_POST['insert'])) {
    global $wpdb;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $table = $wpdb->prefix . 'crud_list';

    $wpdb->insert(
        $table,
        array(
            'name' => $na,
            'address' => $ad,
        )
    );
    echo "inserted";
}
