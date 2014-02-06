<div class="categories view">
<h2><?php  echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>                    
                    <?php
                        if(!empty($category['Menu'])){
                    ?>
                    <table>
                        <?php
                            foreach($category['Menu'] as $menu){
                                echo '<tr><td><img src="'.(Configure::read('BaseURL')).'uploads/'.$menu['img'].'" title="'.$menu['title'].'"/>'.
                                        '<div>'.$menu['title'].'</div></td></tr>';
                            }
                        ?>
                    </table>
                        <?php }?>
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($category['Category']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$category['Category']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
	</dl>
</div>
