<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
$counter++;
?>
<tr>
    <th class="td-sno"><?php echo $counter; ?></th>
    <th class="td-btn">
        <a class="btn btn-sm btn-success has-tooltip page-modal" title="Ver registro" href="<?php print_link("oficios/view/$rec_id"); ?>">
            <i class="icon-eye"></i> Ver
        </a>
        <a class="btn btn-sm btn-info has-tooltip page-modal" title="Editar este registro" href="<?php print_link("oficios/edit/$rec_id"); ?>">
            <i class="icon-pencil"></i> Editar
        </a>
    </th>
    <td class="td-oficio"><a href="<?php print_link("oficios/view/$data[id]") ?>"><?php echo $data['oficio']; ?></a></td>
    <td class="td-data"> <?php echo $data['data']; ?></td>
    <td class="td-pauta"> <?php echo $data['pauta']; ?></td>
    <td class="td-destinatario">
        <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("contatos/view/" . urlencode($data['destinatario'])) ?>">
            <i class="icon-eye"></i> <?php echo $data['contatos_nome'] ?>
        </a>
    </td>
    <td class="td-andamento"> <?php echo $data['andamento']; ?></td>
</tr>
<?php 
}
?>
<?php
} else {
?>
<td class="no-record-found col-12" colspan="100">
    <h4 class="text-muted text-center ">
        Nenhum Registro Encontrado
    </h4>
</td>
<?php
}
?>
