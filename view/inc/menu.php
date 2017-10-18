<header id="header" class="alt">
	<h1><a href="index.html">Spectral</a></h1>
	<nav id="nav">
		<ul>
			<li class="special">
				<a href="#menu" class="menuToggle"><span>Menu</span></a>
				<div id="menu">
					<ul>
						<li class="
						<?php if($_GET['module'] === 'main')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="<?php amigable('?module=main'); ?>">Home</a></li>

						<li class="
						<?php if($_GET['module'] === 'generic')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="index.php?module=generic">Generic</a></li>

						<li class="
						<?php if($_GET['module'] === 'elements')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="index.php?module=elements">Elements</a></li>

						<li class="
						<?php if($_GET['module'] === 'bills')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="<?php amigable('?module=bills&function=form_bills'); ?>">Create Bills</a></li>

						<li class="
						<?php if($_GET['module'] === 'list_bills')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="<?php amigable('?module=listbills&function=list_bills'); ?>">List Bills</a></li>
						<li class="
						<?php if($_GET['module'] === 'contact')
										 echo'active';
									else
										 echo 'deactivate';
						?>"><a href="<?php amigable('?module=contact&function=view_contact'); ?>">Contact</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
