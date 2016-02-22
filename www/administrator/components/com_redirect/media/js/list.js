/**
 * @version		$Id: list.js 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

window.addEvent('domready',function(){
	// handle list boxes
	$$('input.checklist-toggle').each(function(toggle){
		toggle.addEvent('click',function(e){
			$$('td.checklist input').each(function(input){
				if ((input.checked == true) && (this.checked == false)) {
					input.form.boxchecked.value--;
				}
				if ((input.checked == false) && (this.checked == true)) {
					input.form.boxchecked.value++;
				}
				input.checked = this.checked;
			}, this);
		});
	});
});