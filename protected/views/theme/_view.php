<?php
/*
  Yii::import('application.vendor.CSSParser');
  $css = new CSSParser();

  $cssfiletext = file_get_contents('http://id3.newfields.com/themes/snook/css/' . $data->bootstrap_file . '.css');
  //.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form
  // Add the css data to the parser
  $cssIndex = $css->ParseCSS($cssfiletext);
  $shit = $css->GetCSSArray($cssIndex);
  $selector = $data->invert_nav ? '.navbar-inverse' : '.navbar-default';
  $css = ".theme-{$data->id}{
  color: " . $shit[$selector . " .navbar-nav > li > a"]['color'] . ";
  font-family:{$shit["body"]['font-family']};
  font-size:{$shit["body"]['font-size']};
  background-color: {$shit[$selector]["background-color"]};
  }
  .theme-{$data->id} a{
  color: {$shit[".navbar-default .navbar-nav > li > a"]['color']};
  }";
  $theme = Theme::model()->findByPk($data->id);
  $theme->css = $css;
  $theme->save();
 *
 */
?>
<style>
<?php
echo $data->css;
?>
</style>
<div class="view theme-<?= $data->id ?>" >
    <?= CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)) ?><br/>
</div>