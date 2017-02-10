$(document).ready(function(){
	
	if($('.data').length){
		$(".data").datepicker({ 
			dateFormat: "dd/mm/yy",
			firstDay: 1,
			dayNames: ["DOMENICA", "LUNEDI", "MARTEDI", "MERCOLEDI", "GIOVEDI", "VENERDI", "SABATO"],
			dayNamesMin: ["DO", "LU", "MA", "ME", "GI", "VE", "SA"],
			dayNamesShort: ["DOM", "LUN", "MAR", "MER", "GIO", "VEN", "SAB"],
			monthNames: ["GENNAIO", "FEBBRAIO", "MARZO", "APRILE", "MAGGIO", "GIUGNO", "LUGLIO", "AGOSTO", "SETTEMBRE", "OTTOBRE", "NOVEMBRE", "DICEMBRE" ],
			monthNamesShort: ["GEN", "FEB", "MAR", "APR", "MAG", "GIU", "LUG", "AGO", "SET", "OTT", "NOV", "DIC"],
			showButtonPanel: true,
			closeText: "Chiudi",

		});
	}

	if($('textarea').length){
		$('textarea').each(function(){
			resizeTextarea($(this));
		});
		$('textarea').on('click keyup change', function(){
			resizeTextarea($(this));
		});
	}

	if($("#uploadform").length){
		Dropzone.options.uploadform = {
			paramName: "file",		//Nome input utilizzato per il trasferimento
			maxFilesize: 10000, 	//Dimensione in megabyte
			url: '/upload', 		//URL controller upload
			addRemoveLinks: true,	//Link per rimozione file caricato	
			acceptedFiles: '.mp4,.avi', //Tipi di file accettati
			dictDefaultMessage: 'Trascina i file qui per caricarli',
			dictInvalidFileType: 'Formato file non valido',
			dictFileTooBig: 'Max {{maxFilesize}}MB - File troppo grande ({{filesize}}MB)',
			dictCancelUpload: 'Stop',
			dictCancelUploadConfirmation: 'Fermare l\'upload?',
			dictRemoveFile: 'Rimuovi',
		};
	}
		
});

function resizeTextarea(textarea){
	var scrollLeft = window.pageXOffset || (document.documentElement || document.body.parentNode || document.body).scrollLeft;
	var scrollTop  = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;

	textarea.css('height', 0+'px');
	var new_height=textarea.get(0).scrollHeight;
	textarea.css('height', new_height+'px');
	
	window.scrollTo(scrollLeft, scrollTop);
}

