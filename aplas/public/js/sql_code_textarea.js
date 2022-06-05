// load javascript saat halaman terbuka
window.addEventListener('DOMContentLoaded', function (e) {
	textAreaSqlCodeMirror();
});


// function untuk textEditMirror
function textAreaSqlCodeMirror() {
	console.log('aku jlan');
	// load html element (textarea) by id 
	var textareaSql = document.getElementById('textareasql');
	CodeMirror.fromTextArea(textareaSql, {
		lineNumbers: true, // menampilkan nomer
		styleActiveLine: true,
		mode: 'text/x-sql', // text/x-mysql untuk mysql
		theme: 'dracula', // tema 
		smartIndent: true,
		matchTags: { bothTags: true },
		autoCloseTags: true, // auto close tag ex: <b>Open tag|closed tag</b>
		// mode: "text/x-mysql",
		// lineNumbers: true,
		indentWithTabs: true,
		// smartIndent: true,
		// lineNumbers: true,
		matchBrackets: true,
		autofocus: true,
		extraKeys: { "Ctrl-Space": "autocomplete" },
		hintOptions: {
			tables: {
				users: { name: null, score: null, birthDate: null },
				countries: { name: null, population: null, size: null }
			}
		}
	});
}
