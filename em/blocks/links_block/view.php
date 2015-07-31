<section class="links-block links-block--full">
	<div class="links-block__container">

			<div class="table-div table-div--links">

				<div class="table-div__row" data-count="<?php echo sizeof($block->repeaters['links_block_items']); ?>">

					<?php $block->data['span_total'] = 0; foreach($block->repeaters['links_block_items'] as $k => $p): 

					//lets not show any others past the span total of 4
					if($block->data['span_total']==4) continue;

					//create new instance of the link block, by passing in the $p array from ACF
					$link_block = new Block($p);
					$link_block->set_background_image('links_block_item_background');

					$block->data['span_total'] += $p['links_block_item_span'];
					?>

		            <div class="table-div__col table-div__col--span<?php echo $p['links_block_item_span'];?>">

		                <?php 
		                //generate tmp file name from link template type
						$link_block->data['template_path'] = get_template_directory().'/em/blocks/links_block/templates/'.$link_block->fields['links_block_item_template'].'.php';

						//lets check if template exists and include it
						if(file_exists($link_block->data['template_path'])){
							include($link_block->data['template_path']);
						}
						else {
							continue;
						}
		                ?>

		                </div><!-- end of table div col -->
						
					<?php endforeach; ?>
	            
	             </div><!-- end of table div row -->

	        </div><!-- end of links block table div -->

	</div><!-- end of links block container -->
</section> <!-- end of links block section -->