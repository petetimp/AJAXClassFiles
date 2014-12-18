/*Open MoreAjaxApps/Exercises/inline-editing.js for editing. This file currently contains the same code we saw in the demo earlier.
	1.Delete the editElem() function. You won't need it.
	2.Modify the enableEditing() function so that the text of the editable elements gets surrounded with a span tag that has the ContentEditable attribute
		set to "true." Attach the saveCell() function to blur events on the new span tag. We no longer need to observe double clicks.
	3.Modify the saveCell() function so that it gets the correct value. Remember, we are now using a span rather than a form element. Also, in the 
		callback function, we no longer need to change the form field back to text.
	4.Test your solution by opening MoreAjaxApps/Exercises/Presidents.php in your browser and modifying a field. The text should blink. Refresh the page 
		to see if your change stuck.*/
function enableEditing() {
	var editableElems = getElementsByClassName(document,"editable");
	var numElems = editableElems.length;
	for (var i=0; i<numElems; i++) {
		
		editableElems[i].innerHTML="<span contenteditable='true'>" + editableElems[i].innerHTML + "</span>";
		observeEvent(editableElems[i].firstChild,"blur",saveCell);
		//editableElems[i].firstChild will be the <span> element
	}
}
function saveCell(e) {
	var target = getTarget(e);
	var td = target.parentNode;
	var tr = td.parentNode;
	var field = td.title;
	var value = target.innerHTML;//var value=target.value
	var pid = tr.id;	
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "SaveCell.php", true);
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			//td.innerHTML = target.value;
			blinkText(td,1000,"Saved","Normal");
		}
	}
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
	xmlhttp.send("field=" + field + "&value=" + value + "&pid=" + pid);
}

function blinkText(elem,time,on,off,timePast) {
	var timePast = timePast + 100 || 0;
	elem.className = (elem.className == on) ? off : on;

	if (timePast < time) {
		setTimeout(function () { blinkText(elem,time,on,off,timePast) },100);
	} else {
		elem.className = "editable";
	}
}

observeEvent(window,"load",enableEditing);
