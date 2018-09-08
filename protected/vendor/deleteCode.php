<script language="javascript" type="text/javascript">
    function del(controller, id) {
        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                type: "POST",
                url: '<?= Yii::app()->baseUrl ?>/index.php?r=' + controller + '/delete&id=' + id + '&ajax=true',
                datatype: 'text',
                success: function (response) {
                    window.location.href = response;
                },
            });
        } else
            return false;
    }
</script>