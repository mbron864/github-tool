<div class="ui menu">
	<a class="header item" href="/github-tool">
		Github Tool
	</a>
	<div class="menu right">
		<?php if ($_SESSION['access_token']): ?>
			<a  class="item"
				href="/github-tool/oauth/github.php?action=login">
				Sign Out
			</a>
		<?php else: ?>
			<a  class="item"
				href="/github-tool/oauth/github.php?action=login">
				Login
			</a>
		<?php endif; ?>
	</div>
</div>