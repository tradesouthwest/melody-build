window.get_content_cursor = function( element, pos = 'from' ) {
		if ( document.selection ) { // IE
			var sel = document.selection.createRange();
			var selLength = document.selection.createRange().text.length;
			if(pos == 'from') {
				sel.moveStart('character', -element.value.length);
				var caret = sel.text.length - selLength;
			}
			else if(pos == 'to') {
				sel.moveStart('character', -element.value.length);
				var caret = sel.text.length;
			}
		} else if ( element.selectionStart || element.selectionStart === 0 ) { // FF, WebKit, Opera
			if(pos == 'from') {
				var caret = element.selectionStart;
			}
			else if(pos == 'to') {
				var caret = element.selectionEnd;
			}
		}

		var lines = element.value.substr(0, caret).split("\n");
		var newLength = 0, line = 0, lineArray = [];
		$.each(lines, function(key, value) {
			newLength = newLength + value.length + 1;
			lineArray[line] = newLength;
			if(caret > value.length) {
				caret -= value.length + 1
			}
			else {
				return false;
			}
			line++;
		});
        
		return {"line": line, "ch": caret};
}