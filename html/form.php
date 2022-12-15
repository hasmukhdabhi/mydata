<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form method="get">
        <label for="fname">First name:</label>
        <input type="text" name="fname"><br><br>
        
        <label for="lname">last name:</label>
        <input type="text" name="lname"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="pwd"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email"><br><br>
        
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday"><br><br>
        
        <label for="datemin">Enter a date after 2000-01-01:</label>
        <input type="date" id="datemin" name="datemin" min="2000-01-02"><br><br>
        
        <label for="datemax">Enter a date before 1980-01-01:</label>
        <input type="date" id="datemax" name="datemax" max="1979-12-31"><br><br>
        
        <label for="favcolor">Select Your Color</label>
        <input type="color" id="favcolor" name="favcolor" value="#f0000"><br><br>
        
        <label for="birthdaytime">Birthday (date and time)</label>
        <input type="datetime-local" id="birthdaytime" name="birthdaytime"><br><br>
        
        <label for="file">Select a File</label>
        <input type="file" id="file" name="file"><br><br>
        
        <input type="image" src="" width="150" height="50"><br><br>
        <label for="fname">First name:</label>
        <input type="text" name="fname">
        <input type="hidden" id="custid" name="custid"><br><br>
        
        <label for="quantity">Quantity (between 1 to 10)</label>
        <input type="number" id="quantity" name="quantity" min="1" max="10"><br><br>
        
        <label for="textarea">Comment</label>
        <input type="textarea" id="textarea" width="100" height="30"><br><br>
        
        <label for="vol">volume (between 0 to 100)</label>
        <input type="range" id="vol" name="vol" min="0" max="100"><br><br>
        
        <label for="gsearch">Google Search</label>
        <input type="search" id="gsearch" name="gsearch"><br><br>

        <label for="">Time</label>
        <input type="time" id="time" name="time"><br><br>

        <label for="week">week</label>
        <input type="week" id="week" name="week"><br><br>
        
        <input type="submit" name="submit">
        <input type="reset" name="reset">
    </form>


</body>

</html>