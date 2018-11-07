<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
  */
?>
<h6> Juan Martinez 30% </h6>
<h6> Miguel SR 25% </h6>
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2><?= __('Pedidos') ?></h2>
			<h3><?= h('Agente') ?> <?= h($agente_label) ?> Comisiones: <?= h($pagadas) ?></h3>
		</div>

		
			<?= $this->Form->create($this, ['type' => 'post', 'url' => '/salesorders/togglePaid']); ?>

			<table class="table table-striped table-hover" id="results">

				<thead>
					<tr>
						<th scope="col">Comision pagada</th>
						<th scope="col">Pedido</th>
						<th scope="col">F.procesamiento</th>
						<th scope="col">Cliente</th>
						<th scope="col">PO num</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Titulo Pedido</th>
						<th scope="col">Agente</th>
						<th scope="col">Factura</th>
						<th scope="col">Pago del cliente</th>
						<th scope="col">Total</th>
						<th scope="col">Costo</th>
						<th scope="col">Margen MXN (x Factura)</th>
						<th scope="col">Margen % (x Factura)</th>
						<th scope="col">Margen MXN (Pedido)</th>
						<th scope="col">Margen % (Pedido)</th>
						<th scope="col">Comision</th>
						<th scope="col">Fecha pago comision</th>             
					</tr>
				</thead>
				<tbody>
				<?php foreach ($sos as $so): ?>
				<tr>
					<td>
					<?php 
						if("pagado" == $pagadas) {
							echo $this->Form->checkbox('quote_num['.$so->folio_c.'][check]', ['hiddenField' => false]);
						} else {
						
							echo $this->Form->checkbox('quote_num['.$so->folio_c.'][check]', ['hiddenField' => false, 'checked'=> ($so->commission_paid_c == 1?'checked':'')]); 
						}
					?>
					</td>
					<td><?= h($so->folio_c) ?></td>
					<td><?= h($so->date_processed_c) ?></td>
					<td><?= h($so->account_name) ?></td>
					<td><?= h($so->num_orden_compra_cliente_c) ?></td>
					<td><?= 
					
					$this->Number->format( $so->margin_perc, [
						'precision' => 2,
						'after' => ' %']);  
					
					?></td>
					<td><?= h($so->name) ?></td>
					<td><?= h($so->assigned_user_name) ?></td>

					<td><?php  foreach ($so->invoices as $id => $inv): ?>
					<?= @h($inv['serie'].(int)$inv['folio']); ?><br>
					<?php endforeach; ?> </td>
					
					<td><?php foreach ($so->invoices as $id => $inv): ?>
					<?= h($inv['paid']); ?><br>
					<?php endforeach; ?> </td>
					
					<td><?php foreach ($so->invoices as $id => $inv): ?>
					<?= 
					
					 $this->Number->format( $inv['total_siva'], [
						'precision' => 2,
						'before' => '$ ']);
					
					?><br>
					<?php endforeach; ?> </td>
					
					<td><?php foreach ($so->invoices as $id => $inv): ?>
					<?=
					
					$this->Number->format( $inv['cost'], [
						'precision' => 2,
						'before' => '$ ']);
					
					?><br>
					<?php endforeach; ?> </td>
					
					<td><?php foreach ($so->invoices as $id => $inv): ?>
					<?= 
					
					$this->Number->format( $inv['margin_mxn'], [
						'precision' => 2,
						'before' => '$ ']);
						
					?><br>
					<?php endforeach; ?> </td>
					
					<td><?php foreach ($so->invoices as $id => $inv): ?>
					<?= 
					
					$this->Number->format( $inv['margin_perc'], [
						'precision' => 2,
						'after' => ' %']);
					
					?><br>
					<?php endforeach; ?> </td>
					
					<td>
					<?=
					
					$this->Number->format( $so->margin, [
						'precision' => 2,
						'before' => '$ ']);
						
					?></td>
					
					<td><?= 
					
					$this->Number->format( $so->margin_perc, [
						'precision' => 2,
						'after' => ' %']); 
						
					?></td>
					
					<td>
					<?= $this->Form->select('commission['.$so->folio_c.']', ['30'=>'30','25'=>'25','45'=>'45']) ?>
					<?= $this->Form->hidden('quote_num['.$so->folio_c.'][id]', ['value'=>$so->id]) ?>
					</td>
					
					<td><?= h($so->commission_pay_date_c) ?></td>
					
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	
    <?= $this->Form->hidden('agente', ['value'=>$agente_label]) ?>
    <?= $this->Form->hidden('status', ['value'=>$pagadas]) ?>
    <?= $this->Form->submit('Enviar') ?>
    <?= $this->Form->end(); ?>
	</div>
	</div>
<script>
$(document).ready(function() {
    
    
    var table = $('#results').DataTable( {
    dom: 'Blftip',
	"lengthMenu": [50,100,150,200,500],
	
   	buttons: [
        { extend:'excel',  exportOptions: { 
			
			format: {
			            body: function(data, row, col) {
			                
			                if (col == 16) {
			                	
			                    return table
			                            .cell( {row: row, column: col} )
			                            .nodes()
			                            .to$()
			                            .find(':selected')
			                            .text()
			                } else if (col == 0) {
			                	
			                    if(false == $(table.cell( {row: row, column: col}).nodes().to$().find('input')).prop('checked') ) {
			                    	return 0;
			                    } else {
			                    	return 1;
			                    }
			                    
			                } else {
			                	var s = '<p>' + data + '</p>';
			                	
			                    return $(s).text();
			                }
			            }
			        }

			 } 
		}
    ]
});
    
    

 	$("form").on("submit",function(){
 	
 		table.$("tr").each(function(index, nRow){
 		
 			if($("input", nRow)[0].checked == true) {
		 		var nHidden = document.createElement( 'input' );
		            nHidden.type = 'hidden';
		            nHidden.name = $("input", nRow)[0].name;
		            nHidden.value = $("input", nRow)[0].value;
		            
		        $("form").append( nHidden );
		        
		        var nHidden = document.createElement( 'input' );
		            nHidden.type = 'hidden';
		            nHidden.name = $("input", nRow)[1].name;
		            nHidden.value = $("input", nRow)[1].value;
		            
		        $("form").append( nHidden );
		        
		        var nHidden = document.createElement( 'input' );
		            nHidden.type = 'hidden';
		            nHidden.name = $("select", nRow).attr("name");
		            nHidden.value = $("select", nRow).val();
		            
		        $("form").append( nHidden );
		        
		    }    
	          
	      
	       
 		});

          
    });
} );

 
   

</script>