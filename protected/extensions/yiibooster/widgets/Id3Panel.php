<?php

/**
 * ## TbPanel widget class
 *
 * @author john snook
 * @copyright Copyright &copy; Clevertech 2014-
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 */
Yii::import('booster.widgets.TbPanel');

/**
 * Slightly modified TbPanel widget.
 *
 * @see <http://getbootstrap.com/components/#panels>
 *
 * @package booster.widgets.grouping
 */
class Id3Panel extends TbPanel {

    /**
     * ### .renderHeader()
     *
     * Renders the header of the panel with the header control (button to show/hide the panel)
     */
    public function renderHeader() {

        if ($this->title !== false) {
            echo CHtml::openTag('div', $this->headerHtmlOptions);
            if ($this->title) {
                echo '<h3 style="display: inline;">';
                //$this->title = '<h1 class="panel-title" style="display: inline;">' . $this->title . '</h1>';

                if ($this->headerIcon) {
                    if (strpos($this->headerIcon, 'icon') === false && strpos($this->headerIcon, 'fa') === false)
                        $this->title = '<span class="glyphicon glyphicon-' . $this->headerIcon . '"></span> ' . $this->title;
                    else
                        $this->title = '<i class="' . $this->headerIcon . '"></i> ' . $this->title;
                }

                $this->renderButtons();
                echo $this->title . '</h3>';
            }
            echo '<div class="clearfix"></div>';
            echo CHtml::closeTag('div');
        }
    }

}
