<h4>Recently accessed intradox objects</h4>
<?php
$this->widget(
    'ext.yiibooster.widgets.TbTabs', [
    'type' => 'pills', // 'tabs' or 'pills'
    'tabs' => [
        [
            'label' => 'All',
            'id' => 'allLogTab',
            'active' => true,
            'badgeOptions' => ['label' => Log::model()->GetMyLog()->getTotalItemCount()],
            'content' => $this->widget('booster.widgets.TbListView', array(
                'dataProvider' => Log::model()->GetMyLog(),
                'itemView' => '../log/_view',
                'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}{pager}</div></div>'
                ), true),
        ],
        [
            'label' => 'Projects',
            'id' => 'projectsOnlyLogTab',
            'icon' => 'briefcase',
            'badgeOptions' => ['label' => Log::model()->GetMyLog('project')->getTotalItemCount()],
            'content' => $this->widget('booster.widgets.TbListView', array(
                'dataProvider' => Log::model()->GetMyLog('project'),
                'itemView' => '../log/_view',
                'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}{pager}</div></div>'
                ), true),
        ],
        [
            'label' => 'Documents',
            'id' => 'documentsOnlyLogTab',
            'icon' => 'file',
            'badgeOptions' => ['label' => Log::model()->GetMyLog('document')->getTotalItemCount()],
            'content' => $this->widget('booster.widgets.TbListView', array(
                'dataProvider' => Log::model()->GetMyLog('document'),
                'itemView' => '../log/_view',
                'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}{pager}</div></div>'
                ), true),
        ],
    ],
    ]
);
?>
