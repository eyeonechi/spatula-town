/* INFO20003 Database Systems
 * Semester 2 2016
 * Assignment 3
 * Javascript
 * Ivan Ken Weng Chee
 * 736901
 * ichee@student.unimelb.edu.au
 */

 // Loads elements corresponding to tab criteria
function switchTab(event, tab) {
	var tabcontents = document.getElementsByClassName('tabcontent');
	var tablinks = document.getElementsByClassName('tablink');
	for (var i = 0; i < tabcontents.length; i ++) {
		tabcontents[i].style.display = 'none';
		tablinks[i].className = tablinks[i].className.replace(' active', '');
	}
	document.getElementById(tab).style.display = 'block';
	if (event) {
		event.currentTarget.className += ' active';
	}
	updateSummary(tab);
}

function updateSummary(tab) {
	var inputfields = document.getElementsByClassName('inputfield');
	var summaryfields = document.getElementsByClassName('summaryfield');
	for (var i = 0; i < summaryfields.length; i ++) {
		summaryfields[i].value = inputfields[i].value;
	}
}