<?php




require_once("../../../loader.php");

$db = new Conexion;


$search = cdp_sanitize($_REQUEST['search']);

$tables = "cdb_email_templates";
$fields = "*";

$sWhere = "name LIKE '%" . $search . "%'";


// // pagination variables
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
$per_page = 10; //how much records you want to show
$adjacents  = 4; //gap between pages after number of adjacents
$offset = ($page - 1) * $per_page;

$sql = "SELECT $fields FROM  $tables WHERE $sWhere ORDER BY name ASC";
$query_count = $db->cdp_query($sql);
$db->cdp_execute();
$numrows = $db->cdp_rowCount();


$db->cdp_query($sql . " limit $offset, $per_page");
$data = $db->cdp_registros();

$total_pages = ceil($numrows / $per_page);


if ($numrows > 0) { ?>


	<table id="zero_config" class="table table-condensed table-hover table-striped" data-pagination="true" data-page-size="5">
		<thead>
			<tr>
				<th class="header"><b><?php echo $lang['tools-template10'] ?></b></b></th>
				<th><b><?php echo $lang['tools-template11'] ?></b></th>
				<th class="text-center"><b><?php echo $lang['tools-template12'] ?></b></th>
			</tr>
		</thead>


		<?php if (!$data) { ?>
			<tr>
				<td colspan="6">
					<?php echo "
				<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='150' /></i>								
				", false; ?>
				</td>
			</tr>
		<?php } else { ?>
			<?php foreach ($data as $row) { ?>
				<tr>
					<td class="nowrap"><?php echo $row->name; ?></td>
					<td><?php echo $row->help; ?></td>
					<td class="text-center">
						<a href="templates_email_edit.php?id=<?php echo $row->id; ?>"><span class="ti-pencil"></span></a>
					</td>
				</tr>
			<?php } ?>

		<?php } ?>

	</table>


	<div class="pull-right">
		<?php echo cdp_paginate($page, $total_pages, $adjacents, $lang);	?>
	</div>
	</div>
<?php } ?>