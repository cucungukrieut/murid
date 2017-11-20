

function msgbox(title, content) {
	$("body").append("<div id=\'msgbox\' title=\""+title+"\" style=\"padding:10px;\"> "+content+" </div>");
	$('#msgbox').dialog({ width: 500,modal:"true", buttons:{ Ok: function() { $("body").append('<meta http-equiv="refresh" content="0">');}}}).hide().show("bounce");
};

function tmpmsgbox(title, content) {
	$("body").append("<div id=\'msgbox\' title=\""+title+"\" style=\"padding:10px;\"> "+content+" </div>");
	$('#msgbox').dialog({ width: 500,modal:"true", buttons:{ Ok: function() { $(this).remove(); }}}).hide().show("bounce");
};



function msgbox1(title, content) {
	$("body").append("<div id=\'msgbox\' title=\""+title+"\" style=\"padding:10px;\"> "+content+" </div>");
	$('#msgbox').dialog({ width: 500,modal:"true"}).hide().show("bounce");
};

function tmpmsgbox1(title, content) {
	$("body").append("<div id=\'msgbox\' title=\""+title+"\" style=\"padding:10px;\"> "+content+" </div>");
	$('#msgbox').dialog({ width: 500,modal:"true"}).hide().show("bounce");
};



function sel() {

    $("select").searchable();

};
