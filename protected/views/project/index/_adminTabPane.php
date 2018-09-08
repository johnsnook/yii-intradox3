<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <div class="row">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', [
            #'type' => 'pills',
            'htmlOptions' => ['class' => 'pull-left'],
            'buttonType' => 'link',
            'stacked' => true,
            'buttons' => [
                ['label' => 'Syncronize Pods', 'context' => 'none', 'icon' => 'import', 'url' => ['import/syncLdapPods']],
                ['label' => 'Nuke Database', 'icon' => 'fire', 'context' => 'danger', 'url' => ['project/nuclearOption']],
            ],
        ]);
        ?>
    </div>

</div>