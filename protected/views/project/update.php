<?php
//'dpProjectEmployees' => $dpProjectEmployees,
//'dpProjectGuests' => $dpProjectGuests,
//'dpEmployees' => $dpEmployees,
//'dpGuests' => $dpGuests,

echo $this->renderPartial('_form', [
    'model' => $model,
    'dpProjectEmployees' => $dpProjectEmployees,
    'dpProjectGuests' => $dpProjectGuests,
    'dpEmployees' => $dpEmployees,
    'dpGuests' => $dpGuests,
]);
?>
<script type="text/javascript">
    var poot = 500;
    $(function () {
        if ($("#Project_restricted").val() == "1") {
            $("#project_person_div").show(poot);
        }
        $("#Project_restricted").change(function () {
            if ($("#Project_restricted").prop("checked")) {
                $("#project_person_div").show(poot);
            } else
            {
                $("#project_person_div").hide(poot);
            }
        });
        initFix();
        buttonFixer();

        // Here's where we'll handle removing a user, 
        // 1st ajax the db call
        // 2nd updating the interface

        //Here's where we'll handle adding a user
        // 1st ajax the db call
        // 2nd updating the interface

    });

    function initFix() {
        $("#project_people #person").each(function (index, element) {
            $("#people #person[data-id='" + $(element).attr('data-id') + "']").detach();
        });
    }

    function buttonFixer() {
        $('#people i#removeButton').hide();
        $('#people i#addButton').show();
        $('#project_people i#removeButton').show();
        $('#project_people i#addButton').hide();
    }

    function addPersonToProject(id) {
        $.ajax({
            url: "<?= $this->createUrl('addPersonToProject') ?>",
            data: {
                'id':<?= $model->id ?>,
                'person_id': id
            },
            error: function (xhr, error) {
                console.debug(xhr);
                console.debug(error);
            },
            success: function (data) {
                if (data.success) {
                    var x = $('#people [data-id="' + id + '"]');
                    x.appendTo("#project_people[data-userlevel='" + x.attr('data-userlevel') + "'] .items")
                            .fadeIn();

                    $('#people [data-id="' + id + '"]').hide().detach();
                    buttonFixer();
                }
            },
            dataType: "json"
        });
    }

    function removePersonFromProject(id) {

        $.ajax({
            url: "<?= $this->createUrl('removePersonFromProject') ?>",
            data: {
                'id':<?= $model->id ?>,
                'person_id': id
            },
            success: function (data) {
                if (data.success) {
//                $('#project_people [data-id="' + id + '"]')
//                    .hide()
//                    .detach()
//                    .appendTo("#people")
//                    .fadeIn();
                    var x = $('#project_people [data-id="' + id + '"]');
                    x.appendTo("#people[data-userlevel='" + x.attr('data-userlevel') + "'] .items")
                            .fadeIn();
                    $('#project_people [data-id="' + id + '"]').hide().detach();


                    buttonFixer();
                }
            },
            error: function (xhr, error) {
                console.debug(xhr);
                console.debug(error);
            },
            dataType: "json"
        });
    }
    function showUsers() {
        alert('anus');
    }

</script>