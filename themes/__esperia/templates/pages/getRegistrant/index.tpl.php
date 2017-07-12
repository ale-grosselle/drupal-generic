<?php
	$url = base_path() . path_to_theme('inceptio') . '/templates/pages/getRegistrant';
	$reg = getAllNodes("registrant");
?>

<link rel="stylesheet" href="<?php print $url ?>/tablesorter/css/theme.blue.css">
<script type="text/javascript" src="<?php print $url ?>/tablesorter/js/jquery.tablesorter.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="<?php print $url ?>/tablesorter/js/jquery.tablesorter.widgets.js"></script>

<div style="padding: 20px;">
	<table id="myTable" class="tablesorter tablesorter-blue">
		<thead>
		<tr>
			<th>Name Surname</th>
			<th>Company</th>
			<th>User Details</th>
			<th>Ticket Details</th>
			<th>Other Details</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($reg as $r):?>
			<tr>
				<td>
					<?php print getValue($r->field_name) . " " . getValue($r["field_surname"]); ?>
				</td>
				<td>
					<?php print getValue($r["field_companyname"]); ?>
				</td>
				<td>
					Phone: <?php print getValue($r["field_phone"]); ?> <br/>
					Mobile: <?php print getValue($r["field_mobile"]); ?> <br/>
					Mail: <?php print getValue($r["field_mail"]); ?> <br/>
					Address: <?php print getValue($r["field_address"]); ?> <br/>
				</td>
				<td>
					Payment type: <?php print getValue($r["field_payment_type"]); ?> <br/>
					Ticket Chosen: <?php print getValue($r["field_tickets"]); ?> <br/>
					Ticket Price: <?php print getValue($r["field_ticket_price"]); ?> <br/>
					Ticket Type: <?php print getValue($r["field_tickets_type"]); ?>
				</td>
				<td>
					Wants Shuttle:  <?php print getValue($r["field_wantsshuttle"]); ?> <br/>
					Stay In Hotel:  <?php print getValue($r["field_stayinhotel"]); ?> <br/>
					Conference Trip:  <?php print getValue($r["field_conferencefieldtrip"]); ?> <br/>
					Have Paper:  <?php print getValue($r["field_havepaper"]); ?> <br/>
					Paper Session: <?php print getValue($r["field_havepaperinsession"]); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(function(){
		$("#myTable").tablesorter();
	});
</script>