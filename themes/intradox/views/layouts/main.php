<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="language" content="en" />
		<?php
		CGoogleApi::register('visualization', '1.1', array('packages' => ["calendar"]));
		?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Le styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" />
		<?php
		$themeCss = 'lumen.css';
		if (!Yii::app()->user->isGuest) {
			$you = Person::model()->findByPk(Yii::app()->user->id);
			if ($you->theme_id) {
				$themeCss = $you->Theme->bootstrap_file . '.css';
			}
		}
		?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/<?= $themeCss ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/intradox3.css" />
		<?php if (isset($this->background)) : ?>
			<style>
				body
				{
					background-image: url(<?= $this->background ?>);
					background-repeat: no-repeat;
					background-attachment: fixed;
				}
			</style>
		<?php endif; ?>
        <!-- Le fav and touch icons -->
        <script type="text/javascript">
			var fontSize = <?= $you->font_size ?>;
			$(document).ready(function () {
				$('.bootbox > div').addClass('panel').css('margin-top', '0px').css('margin-bottom', '0px');
				// Maybe I should just hard code it to 30?
				navheight = parseInt($('nav').css('height')) + parseInt($('nav').css('margin-bottom'));

				$('#main-event').css('margin-top', parseInt(navheight * .4) + 'px');

				$(window).resize(function () {
					navheight = parseInt($('nav').css('height')) + parseInt($('nav').css('margin-bottom'));
					$('#main-event').css('margin-top', parseInt(navheight * .4) + 'px');
				});
				$(".panel").css("font-size", fontSize + "%", 'important')

			});

			function fontChange(amount) {
				fontSize = fontSize + amount;
				$(".panel, .panel td").css("font-size", fontSize + "%", 'important')
				var url = 'index.php?r=yourself/setFontSize&amount=' + fontSize
				$.ajax({url: url, success: function (response) {
						//data = jQuery.parseJSON(response);
						console.log(response);
					}
				});

			}
			function toggleFave(super_id, user_id) {
				var url = 'index.php?r=favorite/toggleFavorite&super_id=' + super_id + '&person_id=' + user_id;
				$.ajax({url: url, success: function (data) {
						data = jQuery.parseJSON(data);
						var i = $('a#favbut-' + data.super_id + ' i');
						if (data.is === true)
							i.removeClass('glyphicon-star-empty').addClass('glyphicon-star');
						else
							i.removeClass('glyphicon-star').addClass('glyphicon-star-empty');
					}
				});
			}
			function favoriteSuccess(data) {
				var h = '';
				//console.log(data);
				if (data.is == true) {
					h = $('button#favoriteButton span').removeClass('glyphicon-star-empty').addClass('glyphicon-star')[0].outerHTML;
					$('button#favoriteButton').html(h + ' Remove from' + ' favorites');
				} else
				{
					h = $('button#favoriteButton span').removeClass('glyphicon-star').addClass('glyphicon-star-empty')[0].outerHTML;
					$('button#favoriteButton').html(h + ' Add to' + ' favorites');
				}
			}
        </script>

    </head>
    <body>
		<?php
		if (Yii::app()->user->isGuest) {
			// Initial nav bar menu
			$navItems = [
				[
					'class' => 'booster.widgets.TbMenu',
					'type' => 'navbar',
					'htmlOptions' => ['class' => 'pull-left'],
					'items' => [
						['label' => Yii::app()->name, 'url' => ['/'], 'icon' => 'home'],
						['label' => 'About', 'icon' => 'info-sign', 'url' => ['/site/page', 'view' => 'about']],
						['label' => 'Contact', 'icon' => 'comment', 'url' => ['/site/contact']],
						['label' => 'Login', 'icon' => 'log-in', 'url' => ['/site/login']],
					]
				],
			];
		} else {

			// Initial nav bar menu is defined in Controller.php
			$themesMenu = [];
			$here = Yii::app()->request->requestUri;
			$themes = Theme::model()->findAll(['order' => 'title']);
			foreach ($themes as $theme) {
				$active = ($you->Theme->id == $theme['id']);
				$themesMenu[] = ['label' => $theme['title'], 'active' => $active, 'url' => Yii::app()->createUrl('yourself/setTheme', ['id' => $theme['id'], 'returnUrl' => $here])];
			}

			$favs = Favorite::model()->GetUserFavorites(Yii::app()->user->id);
			$glyphs = Yii::app()->params['glyphs'];
			$favsMenu = [];
			if (count($favs->getData()) > 0) {
				foreach ($favs->getData() as $fav) {
					$favsMenu[] = ['label' => $fav->title, 'icon' => $fav->glyph, 'url' => Yii::app()->createUrl($fav->route . '/view', ['id' => $fav->id])];
				}
			}
			$settingsMenu = [];
			$settingsMenu[] = ['label' => 'Report Bug on this page', 'icon' => 'fa fa-bug', 'url' => Yii::app()->createUrl('ticket/create', ['returnUrl' => $_SERVER['REQUEST_URI']])];
			if ($this->userData->userlevel == ROLE_ADMIN || $this->userData->userlevel == ROLE_USER) {
				#$settingsMenu[] = ['label' => 'Themes', 'url' => ['theme/index']];
				$settingsMenu[] = ['label' => 'IntraLib', 'icon' => 'fa fa-university', 'url' => Yii::app()->createUrl('intralib/monograph/index')];
				$settingsMenu[] = ['label' => 'Logs', 'icon' => 'tree-conifer', 'url' => Yii::app()->createUrl('log/index')];
				$settingsMenu[] = ['label' => 'People', 'icon' => 'heart', 'url' => Yii::app()->createUrl('person/index')];
				$settingsMenu[] = ['label' => 'Saved Searches', 'icon' => 'search', 'url' => Yii::app()->createUrl('documentSearch/index')];
			}
			if ($this->userData->userlevel == ROLE_ADMIN) {
				$settingsMenu[] = ['label' => 'News', 'icon' => 'fire', 'url' => Yii::app()->createUrl('news/index')];
			}
			$settingsMenu[] = ['label' => 'Tickets', 'icon' => 'fa fa-bug', 'url' => Yii::app()->createUrl('ticket/index')];
			$settingsMenu[] = ['label' => 'Your Profile', 'icon' => 'user', 'url' => Yii::app()->createUrl('yourself/update', ['id' => Yii::app()->user->id])];
			$settingsMenu[] = ['label' => 'Increase Font Size', 'icon' => 'fa fa-plus', 'url' => 'javascript:fontChange(5);'];
			$settingsMenu[] = ['label' => 'Decrease Font Size', 'icon' => 'fa fa-minus', 'url' => 'javascript:fontChange(-5);'];


			$navItems = [[
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'htmlOptions' => ['class' => 'pull-left'],
			'items' => $this->NavbarItems,
				]
			];
			$rightNavItems = [];
			if (count($favsMenu))
				$rightNavItems[] = ['label' => 'Favorites', 'icon' => 'star', 'items' => $favsMenu];

			$rightNavItems[] = ['label' => 'Themes', 'icon' => 'sunglasses', 'items' => $themesMenu];
			$rightNavItems[] = ['label' => 'Settings', 'icon' => 'cog', 'items' => $settingsMenu,];
			$rightNavItems[] = ['label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'log-out', 'url' => Yii::app()->createUrl('/site/logout')];
			$navItems[] = [
				'class' => 'booster.widgets.TbMenu',
				'type' => 'navbar',
				'htmlOptions' => ['class' => 'pull-right'],
				'items' => $rightNavItems
			];
		}


		$inverse = null;
		if (!Yii::app()->user->isGuest) {
			$inverse = $you->Theme->invert_nav ? 'inverse' : null;
		}
		$this->widget('booster.widgets.TbNavbar', [
			#'fixed' => FALSE,
			'fluid' => true,
			'type' => $inverse,
			'brand' => 'Intradox 3',
			'brandOptions' => [
				'data-toggle' => "tooltip",
				'data-placement' => "bottom",
				'data-original-title' => "Check out your Intradox Dashboard.",
				'style' => 'width:auto;margin-left: 0px;'
			],
			'brandUrl' => Yii::app()->createUrl('project/dashboard'),
			'items' => $navItems,
		]);
		?>
        <div id="main-event" class="container-fluid col-lg-12" style="">
			<?= $content ?>
        </div><!--/.fluid-container-->

    </body>
</html>
