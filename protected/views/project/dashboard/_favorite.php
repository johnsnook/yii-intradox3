<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <h4>Favorite Intradox objects</h4>

    <?php
    foreach ($dataProvider->getData() as $record):
        $url = $this->createUrl($record->route . '/view', ['id' => $record->id]);
        ?>
        <a href="<?= $url ?>" class="btn btn-sq ">
            <i class="<?= $record->glyph ?>" style="font-size: 5em"></i><br/>
            <?= SnookTools::truncate($record->title, 30) ?>
        </a>
        <?php
    endforeach;



//    $this->widget('booster.widgets.TbListView', array(
//        'dataProvider' => $dataProvider,
//        'itemView' => '//favorite/_superview',
//        'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}<h2>{items}</h2>{pager}</div></div>'
//    ));
    ?>
</div>
<script>
    var fg = $('a.btn.btn-sq').css('color');
    var bg = $('a.btn.btn-sq').css('background-color');
    $('a.btn.btn-sq').hover(function (event) {
        $(this).find('i:before').css('color', bg);
        $(this).css('background-color', fg);
    }, function (event) {
        $(this).find('i:before').css('color', fg);
        $(this).css('background-color', bg);
    });
</script>