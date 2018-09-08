<?php
// This is a simple example that loads a css files and makes it a bit more
// effective and shows a special feature with multiple properties with the
// same name
// Include the parser
include('../cssparser.php');
// Create an instance of the parser
$css = new CSSParser();
// Read the css
$data = file_get_contents('http://id3.newfields.com/themes/snook/css/candy-box.css');
//.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form
// Add the css data to the parser
$cssIndex = $css->ParseCSS($data);
// Print out the more effective css
echo "<pre>";
$shit = $css->GetCSSArray($cssIndex);
//var_dump($shit);
//echo $css->GetCSS($cssIndex);
echo "</pre>";
?>
<style>
    .item{
        color: <?= $shit[".navbar-default .navbar-nav > li > a"]['color'] ?>;
        font-family:<?= $shit["body"]['font-family'] ?>
    }

</style>
<body style="background-color: <?= $shit[".navbar-default"]["background-color"] ?>">
    <?php var_dump($shit[".navbar-default .navbar-nav > li > a"]); ?>
    <span class="item">butts</span>

</body>
