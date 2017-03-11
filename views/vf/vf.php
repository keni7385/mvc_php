<h1>Risposte Vero o Falso</h1>
<table style="width:80%">
	<tr>
		<th>#</th>
		<th>Testo</th>
		<th>Risposta</th>
		<th>Mostra</th>
	</tr>
	<?php 
		$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/views/vf/verofalso.xml") or die("Errore: impossibile caricare file risposte");
		$id = 0;
		foreach($xml->children() as $question){
			$id++;
			echo '<tr>
				<td>'.$id.'</td>
				<td><span id="dom'.$id.'" '. (($question["difficult"] == "1") ? 'class="difficult"' : '') .'>'.$question->title.'</span></td>
				<td><span id="ris'.$id.'" class="ris">'.$question->answer.'</span></td>
				<td><button type="button" id="butt'.$id.'"onclick="toogleAnswer('.$id.');">Show '.$id.'</button></td>
			</tr>';
		}
	?>	
</table>

<script>
function toogleAnswer(idRis) {
	var elem = document.getElementById("ris"+idRis);
	var butt = document.getElementById("butt"+idRis);
	if(elem.style.visibility == "visible") {
		elem.style.visibility = "hidden";
		butt.innerHTML = "Show " + idRis;
	}
	else {
		elem.style.visibility = "visible";
		butt.innerHTML = "Hide_ " + idRis;
	}
	return false;
}
</script>