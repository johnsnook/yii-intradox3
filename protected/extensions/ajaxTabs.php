<?php

Yii::import('booster.widgets.TbTabs');

class ajaxTabs extends TbTabs {

	/**
	 * @var bool Reload the tab content each time the tab is clicked. Default: load only once
	 */
	public $reload = false;

	public function run() {
		$id = $this->id;

		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(
				__CLASS__ . '#' . $id . '_ajax', '
                function TbTabsAjax(e) {

                    e.preventDefault();

                    var $eTarget = $(e.target);
                    var $tab = $($eTarget.attr("href"));
                    var ctUrl = $eTarget.data("tab-url");

                    if (ctUrl != "" && ctUrl !== undefined) {
                        $.ajax({
                            url: ctUrl,
                            type: "POST",
                            dataType: "html",
                            cache: false,
                            success: function (html) {
                                $tab.html(html);
                            },
                            error: function () {
                                alert("Request failed");
                            }
                        });
                    }
                    if(' . ($this->reload ? 0 : 1) . '){
                        $eTarget.data("tab-url", "");
                    }
                    return false;
                }'
		);
		$this->events['shown'] = 'js:TbTabsAjax';

		parent::run();
	}

}

?>