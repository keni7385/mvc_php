<h1>Dashboard</h1>
<p>
	Ciao, <?= Session::getInstance()->get("username"); ?> | <a href="/dashboard/logout">Logout</a>
</p>
<p>
	<h3>Aggiungi qualcosa</h3>
	<form id="textInsert">
		<input type="text" id="testo" name="testo" placeholder="type something and send">
		<input type="submit" value="Send">
	</form>
</p>