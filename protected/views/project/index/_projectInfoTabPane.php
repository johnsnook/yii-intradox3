<div class="panel panel-default" style="border-top: 0px; padding: 20px">

    <div class="row" style="margin-top: 40px">
        <div class="col-lg-12">
            There are currently <?= Document::model()->count() ?> documents in <?= Project::model()->count() ?> projects.&nbsp;&nbsp;
            <?php
            $this->widget('booster.widgets.TbButton', [
                'label' => 'Go to projects',
                'context' => 'primary',
                'icon' => 'briefcase',
                'buttonType' => 'link',
                'url' => $this->createUrl('index'),
            ]);
            ?>
        </div>
    </div>
    <hr/>
    <div id="projects_pie"></div>
    <script type="text/javascript">
        $(document).ready(function () {
            //$(projects_pie).load('/index.php?r=project/getPie');
            $(window).resize(function () {
                $(projects_pie).load('/index.php?r=project/getPie');
            });
        });

        function labelFormatter(label, series) {
            return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white; background-color:black">' +
              label + ' : ' +
              Math.round(series.percent) +
              '%</div>';
        }

        $('a[href="#projectInfoTab"]').click(function () {
            setTimeout(function () {
                $(projects_pie).load('/index.php?r=project/getPie')
            }, 250);

        });
    </script>
</div>