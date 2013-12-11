<!DOCTYPE html>
<html>
<head>
	<title><?php echo strip_tags($TITLE); ?></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php

		if ($HEAD) {
			echo $HEAD;
		}

	?>
</head>
<body>

	<header role="banner" class="site-header">
		<a class="site-logo" href="http://www.usgs.gov/" title="U.S. Geological Survey">U.S. Geological Survey</a>
		<a class="jumplink-navigation" href="#site-sectionnav">Jump to Navigation</a>
	</header>

	<main role="main" class="page" aria-labelledby="page-header">
		<header class="page-header" id="page-header">
			<h1><?php echo $TITLE; ?></h1>
		</header>

		<div class="page-content">
			<?php

				// setup include guard
				$TEMPLATE = true;
				// include original page for content
				include($_SERVER['SCRIPT_FILENAME']);

			?>
		</div>

		<footer class="page-footer">
			<p>
				<a href="/contactus/<?php
						if ($CONTACT) {
							echo '?to=' . $CONTACT;
						}
					?>">Questions or comments?</a>
			</p>

			<?php
				if (isset($SOCIAL)) {
					$pageUrl = ($_SERVER['HTTPS'] !== 'Off' ? 'https://' : 'http://') .
							$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

					$replacements = array(
							'{URL}' => htmlspecialchars($pageUrl),
							'{TITLE}' => htmlspecialchars($TITLE));

					echo '<nav class="page-social" aria-label="Share this page">';
					foreach ($SOCIAL as $link) {
						echo ' <a' .
								' href="' . htmlspecialchars(strtr($link['url'], $replacements)) . '"' .
								' title="Share using ' . htmlspecialchars($link['name']) . '"' .
								' class="' . $link['class'] . '"' .
								' data-link-template="' . htmlspecialchars($link['url']) . '"' .
								'>' . htmlspecialchars($link['name']) . '</a>';
					}
					echo '</nav>';
				}
			?>
		</footer>
	</main>

	<footer class="site-footer">
		<?php

			if ($NAVIGATION) {
				echo '<nav' .
						' id="site-sectionnav"' .
						' class="site-sectionnav"' .
						' aria-label="Section Navigation"' .
						'>' . $NAVIGATION . '</nav>';
			}

			if ($SITE_SITENAV) {
				echo '<nav class="site-sitenav" aria-label="Site Navigation">' .
						$SITE_SITENAV . '</nav>';
			}

		?>

		<form class="site-search" role="search" action="http://search.usa.gov/search" method="get" accept-charset="UTF-8">
			<input name="utf8" type="hidden" value="✓"/>
			<input name="affiliate" type="hidden" value="usgs"/>
			<input id="query" name="query" type="search" placeholder="Search..." title="Search"/>
			<label for="sitelimit_site"><input id="sitelimit_site" name="sitelimit" type="radio" value="<?php echo $SITE_URL; ?>" checked="checked"/> This site only</label>
			<label for="sitelimit_all"><input id="sitelimit_all" name="sitelimit" type="radio" value=""/> All USGS</label>
			<button type="submit">Search</button>
		</form>

	</footer>

	<?php

		if ($SITE_COMMONNAV) {
			echo '<nav class="site-commonnav"><hr/>' . $SITE_COMMONNAV . '</nav>';
		}

		// load requirejs and template javascript before $FOOT
		echo '<script data-main="/template/js/index.js" src="/requirejs/require.js"></script>';

		if ($FOOT) {
			echo $FOOT;
		}

	?>
</body>
</html>
