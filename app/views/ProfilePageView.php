<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>User Profile for <?=$user['username']?></h1>
		</div>
		
		<p><?=anchor('ProfilePage/edit/'.$user['id'], 'EDIT')?></p>
		<ul>
			<li>Username: <?=$user['username']?></li>
			<li>Email Address: <?=$user['email_address']?></li>
			<li>First Name: <?=$user['first_name']?></li>
			<li>Last Name: <?=$user['last_name']?></li>
		</ul>
	</div>
</div>


