<?php
class MiniFormEnd extends CWidget
{
 
  
   
 
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){//.($this->width-$this->titlewidth-28)
		$newform='
				</td>
				<td class="fcl"></td>
			</tr>
			<tr>
			<td class="fbr"><img src="images/fbr.png" alt="formright" /></td>
			<td class="fbc"></td>
			<td class="fbl"><img src="images/fbl.png" alt="formleft" /></td>
			</tr>
		</table>
		
		
		';
	
		echo $newform;
    }
}