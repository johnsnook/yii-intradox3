<?php
/* @var $super_id integer */

$uid = Yii::app()->user->id;
$buttlabel = (Super::model()->isFavorite($super_id, $uid) ? 'Remove from' : 'Add to') . ' favorites';
$butticon = (Super::model()->isFavorite($super_id, $uid) ? 'star' : 'star-empty');

echo CHtml::ajaxButton($buttlabel, "index.php?r=favorite/toggleFavorite&super_id=$super_id&person_id=$uid", [
	'type' => 'POST',
	'dataType' => 'json',
	'icon' => $butticon,
	'success' => "faveButtSuccess"
]);
?>
<script language="javascript" type="text/javascript">
	function faveButtSuccess(data) {
		if (data.is == true) {
			var h = $('button#favoriteButton span').removeClass('glyphicon-star-empty').addClass('glyphicon-star')[0].outerHTML;
			$('button#favoriteButton').html(h + ' Remove from' + ' favorites');
		}
		else
		{
			var h = $('button#favoriteButton span').removeClass('glyphicon-star').addClass('glyphicon-star-empty')[0].outerHTML;
			$('button#favoriteButton').html(h + ' Add to' + ' favorites');
		}
	}

</script>