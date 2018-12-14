$(document).ready(function(){
	$("#no_reg").keyup(function(){
		var noreg = $("#no_reg").val();
		$.ajax({
			url:"views/checkin/cek_participants.php",
			type:"POST",
			data:"noreg="+noreg,
			dataType:"JSON",
			success:function(msg){
				$("#typereg").html(msg.typereg);
				$("#addpaper").html(msg.addpaper);
				$("#title").html(msg.title);
				$("#firstname").val(msg.first_name);
				$("#lastname").val(msg.last_name);
				$("#email").val(msg.email);
				$("#phone").val(msg.phone);
				$("#sex").html(msg.sex);
				$("#organization").val(msg.organization);
				$("#address").val(msg.address);
				$("#cc1").html(msg.cc1);
				$("#state").val(msg.state);
				$("#town").val(msg.town);
				$("#postalcode").val(msg.postalcode);
				$("#orgphone").val(msg.orgphone);
				$("#remark").val(msg.remark);
				$("#cc").html(msg.type_payment);
				$("#vaid").html(msg.vaid);
			}
		});
		return false;
	});
});

function validate(field){
	var valid = ".0123456789"
	var ok = "yes";
	var temp;
	for (var i=0; i<field.value.length; i++) {
		temp = "" + field.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if(ok == "no"){
		alert("Insert Numeric");
		field.value="";
		field.focus();
		field.select();
	}
}

$(function(){
	var vcode=$("#vcode").val();
	var acode=$("#acode").val();
	if(vcode=="Yes"){
		$("#invitation_code").show();
	}else{
		$("#vcode").change(function(){
			var vcode=$("#vcode").val();
			
			if(vcode=="Yes"){
				$("#invitation_code").show();
			}else{
				$("#invitation_code").hide();
			}
		});
	}
	
	if(acode=="Yes"){
		$("#affiliation").show();
	}else{
		$("#acode").change(function(){
			var acode=$("#acode").val();
			
			if(acode=="Yes"){
				$("#affiliation").show();
			}else{
				$("#affiliation").hide();
			}
		});
		
	}
	
	$("#country").change(function(){
		var country=$("#country").val();
		
		$.ajax({
			url:"selectstate.php",
			type:"POST",
			data:"country="+country,
			success:function(msg){
				$("#state").html(msg);
			}
		});
		return false;
	});
	
	$("#state").change(function(){
		var state=$("#state").val();
		
		$.ajax({
			url:"selectcity.php",
			type:"POST",
			data:"state="+state,
			success:function(msg){
				$("#city").html(msg);
			}
		});
		return false;
	});
	
});

function tandaPemisahTitik(b){var _minus=false;if(b<0)_minus=true;b=b.toString();b=b.replace(".","");b=b.replace("-","");c="";panjang=b.length;j=0;for(i=panjang;i>0;i--){j=j+ 1;if(((j%3)==1)&&(j!=1)){c=b.substr(i-1,1)+"."+ c;}else{c=b.substr(i-1,1)+ c;}}
if(_minus)c="-"+ c;return c;}
function numbersonly(ini,e){if(e.keyCode>=49){if(e.keyCode<=57){a=ini.value.toString().replace(".","");b=a.replace(/[^\d]/g,"");b=(b=="0")?String.fromCharCode(e.keyCode):b+ String.fromCharCode(e.keyCode);ini.value=tandaPemisahTitik(b);return false;}
else if(e.keyCode<=105){if(e.keyCode>=96){a=ini.value.toString().replace(".","");b=a.replace(/[^\d]/g,"");b=(b=="0")?String.fromCharCode(e.keyCode-48):b+ String.fromCharCode(e.keyCode-48);ini.value=tandaPemisahTitik(b);return false;}
else{return false;}}
else{return false;}}else if(e.keyCode==48){a=ini.value.replace(".","")+ String.fromCharCode(e.keyCode);b=a.replace(/[^\d]/g,"");if(parseFloat(b)!=0){ini.value=tandaPemisahTitik(b);return false;}else{return false;}}else if(e.keyCode==95){a=ini.value.replace(".","")+ String.fromCharCode(e.keyCode-48);b=a.replace(/[^\d]/g,"");if(parseFloat(b)!=0){ini.value=tandaPemisahTitik(b);return false;}else{return false;}}else if(e.keyCode==8||e.keycode==46){a=ini.value.replace(".","");b=a.replace(/[^\d]/g,"");b=b.substr(0,b.length-1);if(tandaPemisahTitik(b)!=""){ini.value=tandaPemisahTitik(b);}else{ini.value="";}
return false;}else if(e.keyCode==9){return true;}else if(e.keyCode==17){return true;}else{return false;}}
function bersihPemisah(ini){a=ini.toString().replace(".","");return a;}

function fnHitung(nama_id) {
    var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById(nama_id).value)))); /*input ke dalam angka tanpa titik*/
    if (document.getElementById(nama_id).value == "") {
        document.getElementById(nama_id).focus();
        return false;
    }else if (angka >= 1) {
        document.getElementById(nama_id).focus();
        document.getElementById(nama_id).value = tandaPemisahTitik(angka) ;
        return false;
    }
}

$('#btn_cari_peserta').click(function(){
	var cari_peserta = $('#cari_peserta').val();

	$.ajax({
		url:"views/onsite/cek_peserta.php",
		type:"POST",
		data:"cari_peserta="+cari_peserta,
		dataType:"json",
		success:function(msg){
			//console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				$('[name=id_member]').val(msg.id);
				$('[name=no_reg]').val(msg.no_reg);
				$('[name=title]').val(msg.title);
				$('[name=firstname]').val(msg.first_name);
				$('[name=lastname]').val(msg.last_name);
				$('[name=email]').val(msg.email);
				$('[name=email]').attr('readonly','readonly');
				$('[name=phone]').val(msg.phone);
				$('[name=name_sertificate]').val(msg.name_sertificate);
				$('[name=organization]').val(msg.organization);
				$('[name=address]').val(msg.street_address);
				$('[name=cc1]').val(msg.country);
				$('[name=state]').val(msg.state);
				$('[name=town]').val(msg.city);
				$('[name=postalcode]').val(msg.postal_code);
				$('[name=remark]').val(msg.remark);
			}
		}
	});
	return false;
});

Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};	

$(".send-email").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/registration/transactionreg/send_email.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});

$(".send-receipt").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/registration/transactionreg/send_receipt.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});

$(".send-email-sponsor").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/sponsor/send_email.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});

$(".send-receipt-sponsor").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/sponsor/send_receipt.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});


$(".send-email-tour").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/tour/send_email.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});

$(".send-receipt-tour").click(function(){
	var id_tran = $(this).attr("data-id-tran");

	$.ajax({
		url:"views/tour/send_receipt.php",
		type:"get",
		data:"code="+id_tran,
		dataType:"json",
		success:function(msg){
			console.log(msg);
			if(msg.gagal){
				alert(msg.gagal);
			}else{
				alert(msg.sukses);
				document.location.reload();
			}
		}
	});
	return false;
});

$("#delete-image").click(function(){
	var id_pages = $(this).attr("data-id");

	$.ajax({
		url:"views/cms_program/delete_image.php",
		type:"post",
		data:"id_pages="+id_pages,
		success:function(msg){
			alert(msg);
			window.location.reload();
			return false;
		}
	});
	return false;
});

$("#delete-image-sponsor").click(function(){
	var id_sponsor = $(this).attr("data-id");

	$.ajax({
		url:"views/cms_sponsor/delete_image.php",
		type:"post",
		data:"id_sponsor="+id_sponsor,
		success:function(msg){
			alert(msg);
			window.location.reload();
			return false;
		}
	});
	return false;
});

$('input[name="pages_type"]').click(function(){
	if($(this).attr('row-headlines')>6){
		if($(this).is(':checked')){
			$('#dataHeadline').show();
		}else{
			$('input[name="headlines_id"]').val('');
		}
	}
});

$('a[href="#close"]').click(function(){
	$('input[name="pages_type"]').attr('checked',false);
	$('#dataHeadline').hide();
	return false;
});

$('a[href="#select"]').click(function(){
	var id_headline = $(this).attr('id');
	$('input[name="headlines_id"]').val(id_headline);
	$('#dataHeadline').hide();
	return false;
})