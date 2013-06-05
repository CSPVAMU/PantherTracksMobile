function getsettings(callback){
	 $.ajax({
		url: "http://pvamu.hazar.us/php/studentsettings.php",
		async: false,
		dataType: 'json',
		success: callback,
		dataType: "json" 
	});
}
function settings() {
	if( $("h1.name3")!=null ){
		$.post("http://pvamu.hazar.us/php/getName.php", function(data) {
			var name=data;
			$("h1.name3").html(name);
		});
	}
	getsettings(function(data){
		var code;
		var defaulthours=data[1];
		var logs=data[0];
		var i;
		var j= new Array();
		for (i=6; i<19; i++){
			if(i==defaulthours)
				j[i]="selected";
			else
				j[i]="unselected";
		}
		code='<div style="width:320px; ">';
		code+='<ul class="rounded"><li  style="background-color:#4a2e6b" >Default Hours <select style="width:50px" name="defaultHours" id="defaultHours" class="dropdown">';
        code+='<option value="6" '+j[6]+'>6</option>';
	    code+='<option value="7" '+j[7]+'>7</option>';
		code+='<option value="8" '+j[8]+'>8</option>';
		code+='<option value="9" '+j[9]+'>9</option>';
		code+='<option value="10" '+j[10]+'>10</option>';
		code+='<option value="11" '+j[11]+'>11</option>';
		code+='<option value="12  '+j[12]+'">12</option>';
		code+='<option value="13" '+j[13]+'>13</option>';
		code+='<option value="14" '+j[14]+'>14</option>';
		code+='<option value="15" '+j[15]+'>15</option>';
		code+='<option value="16" '+j[16]+'>16</option>';
		code+='<option value="17" '+j[17]+'>17</option>';
		code+='<option value="18" '+j[18]+'>18</option></select></li></ul>';
		code+='<ul class="rounded"><li style="background-color:#4a2e6b">Logs<span class="toggle"><input type="checkbox" id="logs" name="logs" value="1" '+logs+'/></span></li></ul>';
		code+='</div>';
		$("div.settings").html(code);
	
	});
}