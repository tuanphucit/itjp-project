<div id="header">
		<div class = header_left>
			<ul class="navigation">
			<li class="selected first">
				<?php echo $html->link(__("Home",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
				?>
				</li>
			<li>
				<?php echo $html->link(__("Office",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
				?>
			</li>
			<li>
				<?php echo $html->link(__("Booking",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
				?>
			</li>
			<li>
				<?php echo $html->link(__("Contact",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
				?>
			</li>
			<li>
				<?php echo $html->link(__("About us",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
				?>
			</li>

			</ul>
		
		</div>
        <div class="header-right">
        <?php
            echo sprintf(__("User:", true));
            echo '<span>|<span>';
			echo $html->link(__("Profile",true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
            echo ' <span>|</span> ';
            echo $html->link(__('My booking',true),array('plugin'=>null,'controller'=>'users','action'=>'view'));
            echo '<span>|<span>'; 
            echo $html->link('Logout',array('plugin' => null,'controller'=>'users','action'=>'logout'));
        	
            ?>
        </div>

</div>