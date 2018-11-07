<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
  */
?>
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h3><?= __('Pedidos') ?></h3>
			<h4><?= h('Agente') ?> <?= h($agente_label) ?> Comisiones: <?= h($pagadas) ?></h4>
		</div>
		<div>
			<p></p>
			<p><strong>Nota:</strong> Si deseas guardar un pedido como no pagado, se requiere dejar sin marcar la casilla de Comision pagada</p>
			<p></p>
		</div>
    
	<?= $this->Form->create($this, ['type' => 'post', 'url' => '/salesorders/save']); ?>
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
           		<?= $this->Form->checkbox('quote_num['.$so->id.']', ['checked'=> 'checked']) ?>
           		</td>
                <td>&nbsp;<?= h($so->folio_c) ?></td>
                <td>&nbsp;<?= h($so->date_processed_c) ?></td>
                <td><?= h($so->account_name) ?></td>
                <td>&nbsp;<?= h($so->num_orden_compra_cliente_c) ?></td>
                <td><?= 
                
                $this->Number->format( $so->margin_perc, [
				    'precision' => 2,
				    'after' => ' %']);  
                
                ?></td>
                <td><?= h($so->name) ?></td>
                <td><?= h($so->assigned_user_name) ?></td>

                <td>&nbsp;<?php  foreach ($so->invoices as $id => $inv): ?>
                <?= h($inv['serie'].(int)$inv['folio']); ?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;<?php foreach ($so->invoices as $id => $inv): ?>
    			<?= h($inv['paid']); ?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;<?php foreach ($so->invoices as $id => $inv): ?>
    			<?= 
    			
    			 $this->Number->format( $inv['total_siva'], [
				    'precision' => 2,
				    'before' => '$ ']);
    			
    			?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;<?php foreach ($so->invoices as $id => $inv): ?>
    			<?=
    			
    			$this->Number->format( $inv['cost'], [
				    'precision' => 2,
				    'before' => '$ ']);
    			
    			?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;<?php foreach ($so->invoices as $id => $inv): ?>
    			<?= 
    			
    			$this->Number->format( $inv['margin_mxn'], [
				    'precision' => 2,
				    'before' => '$ ']);
				    
				?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;<?php foreach ($so->invoices as $id => $inv): ?>
    			<?= 
    			
    			$this->Number->format( $inv['margin_perc'], [
				    'precision' => 2,
				    'after' => ' %']);
    			
    			?><br>
                <?php endforeach; ?> </td>
                
                <td>&nbsp;
                <?=
                
                $this->Number->format( $so->margin, [
				    'precision' => 2,
				    'before' => '$ ']);
				    
                ?></td>
                
                <td>&nbsp;
                <?= 
                
                $this->Number->format( $so->margin_perc, [
				    'precision' => 2,
				    'after' => ' %']); 
				    
				?></td>
                
                <td>&nbsp;
                <?= 
                	$this->Number->format( $so->commission, [
				    'precision' => 2,
				    'before' => '$ ']);
                
                	echo $this->Form->hidden('commission['.$so->id.']', ['value'=>$commissions_selected[$so->folio_c]]);
                ?>
                
                </td>
                
                <td>&nbsp;<?php if($so->commission_pay_date_c == '') { echo date('Y-m-d'); } else { echo $so->commission_pay_date_c; } ?></td>
                
            </tr>
            <?php endforeach; ?>
            
            <tr>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
            	 <td>&nbsp;</td>
            	<td><strong>Total a pagar:</strong></td>
            	<td><strong>
            	<?= 
                	$this->Number->format( $total_commission, [
				    'precision' => 2,
				    'before' => '$ ']);
                ?>
                </strong></td>
                <td>&nbsp;</td>
            </tr>
            
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
   	buttons: [
        { extend:'excel',  exportOptions: { 
			
			format: {
			            body: function(data, row, col) {
			                
			                if (col == 0) {
			                	
			                    if(false == $(table.cell( {row: row, column: col}).nodes().to$().find(':checkbox')).prop('checked') ) {
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
 	
 		var max = table.$("tr").length - 1;
 		
 		table.$("tr").each(function(index, nRow){
 			
 				if(index < max) {		
	 				var nHidden = document.createElement( 'input' );
			            nHidden.type = 'hidden';
			            nHidden.name = $(":checkbox", nRow).attr("name");
			            
	 					if($("input:checkbox", nRow).prop("checked") == true) {
			        	    nHidden.value = '1';
			        	} else {
			        	    nHidden.value = '0';
			        	}
			            
			        $("form").append( nHidden );
			        
			        var nHidden = document.createElement( 'input' );
			            nHidden.type = 'hidden';
			            nHidden.name = $("input[type=hidden]", nRow)[1].name;
			            nHidden.value = $("input[type=hidden]", nRow)[1].value;
			            console.log(nHidden.name);
			        $("form").append( nHidden );
			    }
		        	     
	        
 		});
    
    });
    
    
} );

</script>