<?php
Yii::import('booster.widgets.TbGridView');

class SnookGrid extends TbGridView {

    public function renderFilter() {
        echo "<tr class=\"{$this->filterCssClass}\">\n";
        ?>
        <label for="documentMultiFilter" class="col-lg-2" style="text-align: right">Filter by: </label><input id="documentMultiFilter" class="col-md-8" type="text"/><button id="documentMultiSearchButton"><span class="glyphicon glyphicon-filter"></span>  Search</button>

        <?php
        echo "</tr>\n";
    }

}
?>