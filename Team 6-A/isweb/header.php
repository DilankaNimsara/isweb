<div class="fixed1" style="opacity: 0.5">
	<div class="header">
		<img src="img/logo.png" align="right" width="180px">
		<div class="t3">
			Online Jobs

		</div>
				<?php
			if (isset($_SESSION['login_user'])) {
				echo "<form method=post action=controllers/logout.php>
							<input  type=\"submit\" name=\"logout\" value=\"LogOut\" align=\"right\" style=\"width:200px;margin-left:1500px;\" >
						</form>	
					";		
			}
		?>
		
	</div>
</div>

<div style="margin-top: 12%; margin-left:3%;">