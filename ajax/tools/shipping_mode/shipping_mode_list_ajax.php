<?php




require_once("../../../loader.php");

$db = new Conexion;


$search = cdp_sanitize($_REQUEST['search']);

$tables = "cdb_shipping_mode";
$fields = "*";

$sWhere = "";


$sWhere .= " ship_mode LIKE '%" . $search . "%'";


$sWhere .= " order by id asc";

// // pagination variables
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
$per_page = 10; //how much records you want to show
$adjacents  = 4; //gap between pages after number of adjacents
$offset = ($page - 1) * $per_page;

$sql = "SELECT $fields FROM  $tables where $sWhere";
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
				<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-shipmode11'] ?></b></th>
				<th data-hide="Description"><b><?php echo $lang['tools-shipmode12'] ?></b></th>
				<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-shipmode13'] ?></b></th>
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
					<td><?php echo $row->ship_mode; ?></td>
					<td><?php echo $row->detail; ?></td>
					<td class="text-center">
						<a href="shipping_mode_edit.php?id=<?php echo $row->id; ?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipmode15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
						<a id="item_<?php echo $row->id; ?>" onclick="cdp_eliminar('<?php echo $row->id; ?>');" class="delete" data-rel="<?php echo $row->ship_mode; ?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipmode16'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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