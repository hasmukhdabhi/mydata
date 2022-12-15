<!DOCTYPE html>
<html>
<title>HTML</title>
<style>
    body {
        background-color: powderblue; 
    }
    
    h1 {
        color: red;
    }

    p {
        color: blue;
    }

    a:link {
        color: "green";
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: pink;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: red;
        background-color: transparent;
        text-decoration: underline;
    }

    a:active {
        color: yellow;
        background-color: transparent;
        text-decoration: underline;
    }
</style>

<body style="background-color:powderblue;">

    <h2>The href Attribute</h2>

    <a href="https://www.w3schools.com/default.asp">Visit W3Schools</a>
    <br><br>
    <p>The <img> tag is used to embed an image in an HTML page. The src attribute specifies the path to the image to be displayed:</p>
    <img src="img_girl.jpg" alt="girl" width="250" height="350">

    <h2>style</h2>

    <p>I am normal</p>
    <p style="background-color:red;"> i am normal</p>
    <p style="color:green;"> i am normal</p>
    <p style="font-size:50px;"> i am normal</p>

    <h2>HTML Formatting Elements</h2>

    <h3><b>Bold text</b></h3>
    <br>
    <strong>Important text</strong>
    <br>
    <i>Italic text</i>
    <br>
    <em>Emphasized text</em>
    <br>
    <mark>Marked text</mark>
    <br>
    <small>Smaller text</samll>
        <br>
        <del>Deleted text</del>
        <br>
        <ins>Inserted text</ins>
        <br>
        <sub>Subscript text</sub>
        <br>
        <sup>Superscript text</sup>
        <br>
        <p>Here is a quote from WWF's website:</p>

        <blockquote cite="http://www.worldwildlife.org/who/index.html">
            For 60 years, WWF has worked to help people and nature thrive. As the world's leading conservation organization, WWF works in nearly 100 countries. At every level, we collaborate with people around the world to develop and deliver innovative solutions that protect communities, wildlife, and the places in which they live.
        </blockquote>

        <h2>Using a Full URL File Path</h2>
        <img src="https://www.w3schools.com/images/picture.jpg" alt="Mountain" style="width:300px">
</body>

</html>