<!-- choose a theme file -->
<?php
	$url = base_path() . path_to_theme('inceptio') . '/templates/pages/techDoc';
	$docsId = 114;
	$n = getNodeFromId($docsId);
	$pdfs = getValue($n->field_documents["und"]);
?>
<link rel="stylesheet" href="<?php print $url ?>/tablesorter/css/theme.blue.css">
<script type="text/javascript" src="<?php print $url ?>/tablesorter/js/jquery.tablesorter.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="<?php print $url ?>/tablesorter/js/jquery.tablesorter.widgets.js"></script>

<div style="padding: 20px;">
	<table id="myTable" class="tablesorter tablesorter-blue">
		<thead>
		<tr>
			<th>Title</th>
			<th>Link</th>
			<th>Doc. Size</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($pdfs as $pdf): $url = getUrlFile($pdf["field_document"]);?>
			<tr>
				<td><?php print getValue($pdf["field_title"]) ?></td>
				<td><a href="<?php print($url["url"])?>" target="_blank">Download Document</a> </td>
				<td><?php print(round($url["size"]/1000));?>KB</td>
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