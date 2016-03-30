<?php
/*
Plugin Name: SchokoDB Plugin
Author: Johannes Ucel
Version: 1.0
Description: Ein Plugin fuer die SchokoDB
*/

function schokoSchnaeppchen_func() {
	global $wpdb;
	ob_start();

	$res = $wpdb->get_results('SELECT bezeichnung, gewicht, "Kunstwerk" as ist	FROM Produkt NATURAL JOIN Kunstwerk	WHERE schaetzwert<2000
		union
		SELECT bezeichnung, gewicht, "Standard" as ist FROM Produkt NATURAL JOIN Standardsortiment	WHERE preis<3;	');

		echo '<table class="table table-striped table-hover">';
		?>
		<th>
		Bezeichnung
		</th>
		<th>
		Gewicht
		</th>
		<th>
		Ist
		</th>
		<?php 
		foreach ($res as $r) {
			?>
			<tr>
			<td>	
				<?php echo $r->bezeichnung; ?>
			</td>
			<td class="small">
				<?php echo $r->gewicht; ?>g
			</td>
			<td>
				<?php echo $r->ist; ?>
			</td>
			</tr>

		<?php
	
	}
	echo '</table>';

	return ob_get_clean();
}



add_shortcode('schokoSchnaeppchen','schokoSchnaeppchen_func');

