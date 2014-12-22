<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
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