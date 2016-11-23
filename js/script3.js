var data = [];
var adddata = [];
var prev_val;
var scol = 0;
var login = false;
var addr = '';
var fadd = false;
var isMobile = false;
var mfaucet = false;
var timestart;
var farch = false;
var fref = false;
var activetooltip;

$( document ).ready(function() {

	timestart = $.now();
	
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ) isMobile = true;

	$("#addr").tooltipster({ theme: 'tt-shadow', debug: false });
	
	addr = $("#addr").val();
	if(check(addr)) {
		$("#addr").addClass("addrok");
		login = true;
		getFP();
		$("#addr").tooltipster('disable');
	} else $("#addr").tooltipster('enable');
	
	scol = $.cookie("sortby");
	if(scol===undefined) scol = 0;
	setsortby();

	$("#addr").change(function(){
		addr = $(this).val();
		if(check(addr)) {
			$(this).addClass("addrok");
			$("#maintable").load('index.php?id=17', { addr:addr, sortby:scol, referal:referal }, function(){ tableloaded(); });
			$("#hiddentable").load('index.php?id=13', { addr:addr, sortby:scol }, function(){ hiddentableloaded(); });
			$.cookie('addr', addr);
			login = true;
			getFP();
			$("#addr").tooltipster('disable');
		} else {
			$("#maintable").load('index.php?id=17', { addr:'', sortby:sortby, referal:referal }, function(){ tableloaded(); });
			$("#hiddentable").html('');
			//$("#hiddentable").load('index.php?id=5', function(){ hiddentableloaded(); });
			$.removeCookie('addr');
			login = false;
			$(this).removeClass("addrok");
			$("#addr").tooltipster('enable');
		}
		//console.log($(this).val());
	});

	$("#copy").tooltipster({ theme: 'tt-shadow', debug: false });
	
	$("#copy").click(function() {
		$("#addr").select();
		document.execCommand("copy");
		return false;
	});

	var interval = setInterval(tick,60000);
	tableloaded();
	hiddentableloaded();
	
// add
	$('#badd').click(function(){
		if(!checklogin()) return;
		if(!fadd) {
			$(this).text('Add');
			$(this).width('40px');
			$('#acon2').addClass('aconv');
			$('#ainp').show();
			$('#addaddr').focus();
			$('#aclose').show();
			fadd = true;
		} else {
			if($("#addaddr").val()=='') {
				$("#addaddr").tooltipster('content', 'Enter faucet address');
				$("#addaddr").tooltipster('enable');
				$("#addaddr").tooltipster("show");
				setTimeout(function(){ $("#addaddr").tooltipster('disable'); }, 2000);
				return;
			}
			if($("#addrew").val()=='') {
				$("#addrew").tooltipster('content', 'Enter reward');
				$("#addrew").tooltipster('enable');
				$("#addrew").tooltipster("show");
				setTimeout(function(){ $("#addrew").tooltipster('disable'); }, 2000);
				return;
			}
			if($("#addper").val()=='') {
				$("#addper").tooltipster('content', 'Enter period');
				$("#addper").tooltipster('enable');
				$("#addper").tooltipster("show");
				setTimeout(function(){ $("#addper").tooltipster('disable'); }, 2000);
				return;
			}
			adddata.push({ url:$("#addaddr").val(), rew:$("#addrew").val(), per:$("#addper").val() });
			sendadddata();
			aclose();
		}
	});
	$('#aclose').mouseenter(function(e) { $('#iclose').show('fast'); });
	$('#aclose').mouseleave(function(e) { $('#iclose').hide('fast'); });
	$('#aclose').click(function(e) { aclose(); });
	
	$("#addrew, #addper").focus(function(){ prev_val = $(this).val() });
	$("#addrew, #addper").change(function(){
		checklogin();
		var tv = parseInt($(this).val());
		if(isNaN(tv) || tv<=0) $(this).val(prev_val);
	});
	$("#addaddr, #addrew, #addper").tooltipster({ theme: 'tt-shadow' });
	
	setInterval(function(){
		if(!mfaucet) {
			if(!farch) location.reload();
			else fref = true;
			//$("#maintable").load('index.php?id=17', { addr:addr, sortby:scol, referal:referal }, function(){ tableloaded(); });
			//$('#b2').load('index.php?id=20');
		}
	}, 300000);

	$("#mfback, #mfbacktop").click(function(e) {
        if(mfaucet) {
			$("#mfback").hide();
			var frame = document.getElementById("idmframe");
			frame.src = "about:blank";
			mfaucet = false;
			if($('#ftmr').text()=='') {
				$("#maintable").load('index.php?id=17', { addr:addr, sortby:scol, referal:referal }, function(){ tableloaded(); });
			}
		}
    });
	
	$("#mfcont").click(function(e) {
        return false;
    });
	
});
///////////////////// aclose
function aclose() {
	$('#acon2').removeClass('aconv');
	$('#ainp').hide();
	$('#badd').width('120px');
	$('#badd').text('Add faucet');
	$('#aclose').hide();
	fadd = false;
}
///////////////////// setsortby
function setsortby() {
	$(".hbut").each(function(){ $(this).removeClass("hbuton") });
	$("#hb"+scol).addClass("hbuton");
}
function sortby() {
	var fid = null;
	var faf = $("#tb0").find(":focus");
	if(faf!==undefined) {
		fpar = faf.parents('.trbot');
		if(fpar!==undefined) {
			var id = fpar.attr('id');
			if(id!==undefined) fid = id.substr(1);
		}
	}
	if(typeof(scol)=='string') scol = parseInt(scol);
	var tbdata = [];
	var adtr = $("#adm").prop('outerHTML');
	$("#adm").prop('outerHTML','');
	var mtr = $("#tb0").find("tr");
	if(scol!=2) {
		var by;
		switch(scol) {
		case 0:
			by = '.rew'; break;
		case 1:
			by = '.per'; break;
		case 3:
			by = '.rat'; break;
		}
		mtr.each(function() {
			if($(this).attr('id')=='f0') return;
			if(scol>0) var vt0 = parseInt($(this).find('.rew').val());
			else var vt0 = parseInt($(this).find('.per').val());
			var e = $(this).find(by);
			var vt = scol<2 ? e.val() : e.text();
			var v = parseInt(vt);
			var trhtml = $(this).prop('outerHTML');
			if(scol>0) tbdata.push([ v, trhtml, vt0 ]);
			else tbdata.push([ v, trhtml ]);
		});
	} else {
		mtr.each(function() {
			if($(this).attr('id')=='f0') return;
			var vt0 = parseInt($(this).find('.rew').val());
			//console.log($(this).find('.rew').val());
			var c = $.cookie($(this).find('a').text());
			var v = 0;
			if(c!==undefined) {
				var t = $.now() - c;
				var p = parseInt($(this).find('.per').val()) * 60000;
				var v = p - t;
				if(v<0) v = 0;
			}
			var trhtml = $(this).prop('outerHTML');
			tbdata.push([ v, trhtml, vt0 ]);
		});
	}
	switch(scol) {
	case 0:
		tbdata.sort(function(a,b) { 
			var res = b[0] - a[0];
			if(res!=0) return res;
			return a[2] - b[2];
		});
		break;
	case 1:
		tbdata.sort(function(a,b) {
			var res = a[0] - b[0];
			if(res!=0) return res;
			return b[2] - a[2];
		});
		break;
	case 2:
		tbdata.sort(function(a,b) {
			var res = a[0] - b[0];
			if(res!=0) return res;
			return b[2] - a[2];
		});
		break;
	case 3:
		tbdata.sort(function(a,b) {
			var res = b[0] - a[0];
			if(res!=0) return res;
			return b[2] - a[2];
		});
		break;
	}
	var i = 0;
	var adpos = 0;
	if(mtr.length>=30) adpos = Math.floor(mtr.length / 2);
	mtr.each(function() {
		if($(this).attr('id')=='f0') return;
		if((i+1)==adpos) $(this).prop('outerHTML', adtr + tbdata[i][1]);
		else $(this).prop('outerHTML', tbdata[i][1]);
		i++;
	});
	tableloaded(true);
	if(fid) $('#f'+fid).find('.af').toggleClass('focused');
}
////////////////////////// tableloaded
function tableloaded(f) {
	// one
	$("#a0").click(function(e) {
		if(!mfaucet) {
        	$("#mfback").show();
			mfaucet = true;
			data.push({ id:0, col:6, val:0 });
			senddata(6);
		}
    });
	
	// another
	$(".rew, .per").tooltipster({ content:"Click to edit", theme: 'tt-shadow', debug: false });
	$(".tmr").tooltipster({ content:'', theme: 'tt-shadow' });
	
	$(".af").click(function(){
		$(".af").each(function() { $(this).removeClass('focused'); });
		var par = $(this).parents('tr');
		var nm = $(this).text();
		var c = $.cookie(nm);
		if(c===undefined) {
			$.cookie(nm, $.now(), { expires: 2 });
			$(this).addClass('lt');
			par.addClass('lt');
			if(scol==2) sortby();
			else tick();
		}
		var id = par.attr('id').substr(1);
		data.push({ id:id, col:6, val:0 });
		senddata(6);
	});

	if(!isMobile) {
		$(".tmr").dblclick(function(e){
			tmrclick(this,e);
		});
	} else {
		$(".tmr").mousedown(function(e){
			if( e.button != 2 ) return;
			tmrclick(this,e);
		});
	}
	
	$(".rew, .per, #addr").focus(function(){ prev_val = $(this).val() });
	$(".rew").change(function(){
		if(!checklogin()) { $(this).val(prev_val); return; }
		var tv = parseInt($(this).val());
		if(isNaN(tv) || tv<=0) $(this).val(prev_val);
		else {
			$(this).val(tv);
			$(this).attr('value', tv);
			$(this).blur();
			var par = $(this).parents('.trbot');
			var id = par.attr('id').substr(1);
			data.push({ id:id, col:1, val:tv });
			senddata();
			if(scol==0) sortby();
		}
	});
	$(".per").change(function(){
		if(!checklogin()) { $(this).val(prev_val); return; }
		var tv = parseInt($(this).val());
		if(isNaN(tv) || tv<=0) $(this).val(prev_val);
		else {
			$(this).val(tv);
			$(this).attr('value', tv);
			$(this).blur();
			var par = $(this).parents('.trbot');
			var id = par.attr('id').substr(1);
			data.push({ id:id, col:2, val:tv });
			senddata();
			if(scol==1) sortby();
			tick();
		}
	});
	$(".rew, .per, #addr").keydown(function(event){
		if(event.which==13) $(this).blur();
		if(event.which==27) { $(this).val(prev_val); $(this).blur(); }
	});
	
	$(".but, .butm").mousedown(function(){ $(this).addClass('butd') });
	$(".but, .butm").mouseup(function(){ $(this).removeClass('butd') });
	$(".but, .butm").mouseleave(function(){ $(this).removeClass('butd') });
	$(".but").click(function(){ if(!checklogin()) return; rating(this,1) });
	$(".butm").click(function(){ if(!checklogin()) return; rating(this,-1) });
	setratcol();

	$(".hbut").tooltipster({ content:"Click to sort", theme: 'tt-shadow', debug: false });
	$(".hbut").click(function(){
		scol = parseInt($(this).attr("id").substr(2));
		$.cookie("sortby", scol);
		setsortby();
		sortby();
	});

	$(".rem").each(function(){ $(this).tooltipster({ content:'Hide', theme: 'tt-shadow', debug: false }) });
	$(".butremadd").mouseenter(function(){ $(this).find("img").show() });
	$(".butremadd").mouseleave(function(){ $(this).find("img").hide() });
	$(".rem").click(function(e) {
        if(!checklogin()) return;
		var par = $(this).parents('.trbot');
		var id = par.attr('id').substr(1);
		$.removeCookie(par.find('a').text());
		par.prop('outerHTML','');
		data.push({ id:id, col:4, val:-1 });
		senddata(2);
		setcount();
    });

	// info tooltip
	$('.eninfo').each(function(){
        var par = $(this).parents('tr');
		var sid = par.attr('id');
		if(sid===undefined) return;
		var id = parseInt(sid.substr(1));
		$(this).tooltipster({content:'Loading..',contentAsHTML:true,theme:'tt-shadow',position:'right',functionBefore:function(inst,continueTooltip){
			continueTooltip();
			activetooltip = inst;
			if(inst.data('ajax')!=='cached') $.get("index.php?id=34", { fid:id }, function(data){inst.tooltipster('content',data).data('ajax','cached');});
		}});
	});
	
	setsortby();
	tick();
	setcount();
}
/////////////// setcount
function setcount() {
	var cf = $('.af').length;
	$('#fcount').html(cf+' faucets');
}
////////////// tmrclick
function tmrclick(th,e) {
	var t = $(th).text();
	var par = $(th).parents('.trbot');
	var a = par.find("a");
	var nm = a.text();
	if(t!='Ready') {
		$(th).text('Ready');
		$.removeCookie(nm);
		par.removeClass('lt');
		a.removeClass('lt');
		if(scol==2) sortby();
		else tick();
		if(isMobile) var st = 'Long press to start timer';
		else {
			$(th).tooltipster('option','contentAsHTML',true);
			var st = 'Double click to start timer<br><span style="font-size:9px;color:#888">with SHIFT: set timer on 30 minutes</span>';
		}
		$(th).tooltipster('content', st);
	} else {
		var t = $.now();
		if(e.shiftKey && !isMobile) {
			var per = parseInt(par.find(".per").val());
			if(per>=30) {
				per = (per - 29) * 60000;
				t -= per;
			}
		}
		$.cookie(nm, t, { expires: 2 });
		par.addClass('lt');
		a.addClass('lt');
		if(scol==2) sortby();
		else tick();
		if(isMobile) var st = 'Long press to reset timer';
		else var st = 'Double click to reset timer';
		$(th).tooltipster('content', st);
	}
}
////////////// hiddentableloaded
function hiddentableloaded() {
	$(".butremadd").mouseenter(function(){ $(this).find("img").show() });
	$(".butremadd").mouseleave(function(){ $(this).find("img").hide() });
	$(".add").each(function(){ $(this).tooltipster({ content:'Add to list', theme: 'tt-shadow', debug: false }) });
	$(".del").each(function(){ $(this).tooltipster({ content:'Delete', theme: 'tt-shadow', debug: false }) });
	
	$(".add").click(function(e) {
		var par = $(this).parents('.trbot');
		var par0 = $(par).parent();
		var id = par.attr('id').substr(1);
		//$(this).tooltip('close');
		par.prop('outerHTML','');
		data.push({ id:id, col:4, val:0 });
		senddata(1);
		var tr = $(par0).find('tr');
		if(tr.length==1) $('#hiddata').prop('outerHTML','');
	});
	$(".del").click(function(e) {
		var par = $(this).parents('.trbot');
		var id = par.attr('id').substr(1);
		//$(this).tooltip('close');
		par.prop('outerHTML','');
		data.push({ id:id, col:4, val:-10 });
		senddata();
	});
	
	$("#buthiddata").click(function(){
		if($("#hidtable").css('display')=='none') {
			$("#hidtable").show();
			document.getElementById('hiddentable').scrollIntoView();
		} else $("#hidtable").hide();
	});
}
///////////// checklogin
function checklogin() {
	//if(login)
		return true;
	//$("#addr").tooltipster("show");
	//setTimeout(function(){
	//	$("#addr").tooltipster('hide');
		//$("#addr").attr('title','');
	//}, 2000);
	//return false;
}
/////////////////
function rating(el, n) {
	var par = $(el).parents('.trbot');
	var re = par.find(".rat");
	var r = parseInt(re.text()) + n;
	if(r>=-100 && r<= 100) {
		re.text(r);
		if(r>0) { re.addClass("ratp"); re.removeClass("ratm"); }
		else if(r<0) { re.addClass("ratm"); re.removeClass("ratp"); }
		else { re.removeClass("ratp"); re.removeClass("ratm"); }
		var id = par.attr('id').substr(1);
		data.push({ id:id, col:3, val:r });
		senddata();
		if(scol==3) sortby();
	}
}
/////////////////
function senddata(ld) {
	var addr = $("#addr").val();
	if(ld!=6) { if(!check(addr)) return; }
	else { if(!check(addr)) addr = 'null'; }
	var c = data.length - 1;
	for(i=c;i>=0;i--) { if(!data[i]) data.splice(i,1) }
	c = data.length;
	for(i=0;i<c;i++) {
		$.ajax({ url:'index.php?id=3',
		data: { addr: addr, fid:data[i]['id'], col:data[i]['col'], val:data[i]['val'], n:i },
		type: 'POST' }
		)
		.done(function(json){
			var n = $.parseJSON(json).ok;
			data[n] = null;
			if(ld==1) $("#maintable").load('index.php?id=17', { addr:addr, sortby:scol, referal:referal }, function(){ tableloaded(); });
			if(ld==2) $("#hiddentable").load('index.php?id=13', { addr:addr }, function(){ hiddentableloaded(); });
		})
		.fail(function(){ setTimeout(function(){ senddata(ld) }, 60000) });
	}
}
///////////////// sendadddata
function sendadddata() {
	var addr = $("#addr").val();
	if(!check(addr)) return;
	var c = adddata.length - 1;
	for(i=c;i>=0;i--) { if(!adddata[i]) adddata.splice(i,1) }
	c = adddata.length;
	for(i=0;i<c;i++) {
		$.ajax({ url:'index.php?id=10',
		data: { addr:addr, url:adddata[i]['url'], rew:adddata[i]['rew'], per:adddata[i]['per'], n:i },
		type: 'POST' }
		)
		.done(function(json){
			var n = $.parseJSON(json).ok;
			adddata[n] = null;
			$("#maintable").load('index.php?id=17', { addr:addr, sortby:scol, referal:referal }, function(){ tableloaded(); });
		})
		.fail(function(){ setTimeout(function(){ sendadddata(ld) }, 60000) });
	}
}
/////////////////
function tick() {
	var fr = false;
	var mint = 1000;
	$(".af").each(function() {
		var par = $(this).parent().parent();
		var tmr = par.find(".tmr");
		var nm = $(this).text();
		var c = $.cookie(nm);
		if(c!==undefined) {
			var r = Math.round(($.now() - c) / 60000);
			var per = parseInt(par.find(".per").val()) + 1;
			if(per<=r) {
				par.find(".tmr").text('Ready');
				$.removeCookie(nm);
				// change class
				par.removeClass('lt');
				$(this).removeClass('lt');
				if(isMobile) var st = 'Long press to start timer';
				else {
					tmr.tooltipster('option','contentAsHTML',true);
					var st = 'Double click to start timer<br><span style="font-size:9px;color:#888">with SHIFT: set timer on 30 minutes</span>';
				}
				tmr.tooltipster('content', st);
				fr = true;
				if(scol==2) sortby();
			} else {
				var t = per - r;
				var h = Math.floor(t/60);
				var m = t - (h*60);
				if(m<10) m = '0'+m;
				tmr.text(h+':'+m);
				par.addClass('lt');
				$(this).addClass('lt');
				if(isMobile) var st = 'Long press to reset timer';
				else var st = 'Double click to reset timer';
				tmr.tooltipster('content', st);
				if(mint>t) mint = t;
			}
		} else {
			var tmr = par.find(".tmr");
			tmr.text('Ready');
			if(isMobile) var st = 'Long press to start timer';
			else {
				tmr.tooltipster('option','contentAsHTML',true);
				var st = 'Double click to start timer<br><span style="font-size:9px;color:#888">with SHIFT: set timer on 30 minutes</span>';
			}
			tmr.tooltipster('content', st);
			// change class
			par.removeClass('lt');
			$(this).removeClass('lt');
			fr = true;
		}
    });
	// f
	var mleft = ftmr - Math.round(($.now()-timestart)/60000);
	if(mleft<=0) {
		var bal = parseInt($('#f0').find('.fbal').text().replace('( ',''));
		if(bal>=1500) {
			$('#ftmr').text('Ready');
			$('#f0').removeClass('lt');
			$('#a0').removeClass('lt');
			fr = true;
		} else {
			$('#ftmr').text('');
			//$('#f0').addClass('lt');
			//$('#a0').addClass('lt');
		}
	} else {
		var h = Math.floor(mleft/60);
		var m = mleft - (h*60);
		if(m<10) m = '0'+m;
		$('#ftmr').text(h+':'+m);
		$('#f0').addClass('lt');
		$('#a0').addClass('lt');
		if(mint>mleft) mint = mleft;
	}
	
	if(fr) document.title = 'Ready - Faucet Rotator';
	else {
		var h = Math.floor(mint/60);
		var m = mint - (h*60);
		if(m<10) m = '0'+m;
		document.title = h+':'+m+' - Faucet Rotator';
	}
}
////////////////
function getFP() {
	if(addr=='') return;
	new Fingerprint2().get(function(result, components){
		if(result.length==0) return;
	  	$.ajax({ url:'index.php?id=30',
			data: { addr:addr, fp:result },
			type: 'POST' });
	});	
}
////////////////check(address)
function check(address) {
  var decoded = base58_decode(address);     
  if (decoded.length != 25) return false;

  var cksum = decoded.substr(decoded.length - 4); 
  var rest = decoded.substr(0, decoded.length - 4);  

  var good_cksum = hex2a(sha256_digest(hex2a(sha256_digest(rest)))).substr(0, 4);

  if (cksum != good_cksum) return false;
  return true;
}
////////////////
function setratcol() {
	$(".rat").each(function() {
        var r = parseInt($(this).text());
		if(r>0) { $(this).addClass("ratp"); $(this).removeClass("ratm"); }
		else if(r<0) { $(this).addClass("ratm"); $(this).removeClass("ratp"); }
		else { $(this).removeClass("ratp"); $(this).removeClass("ratm"); }
    });
}
///////////////////
function base58_decode(string) {
  var table = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
  var table_rev = new Array();

  var i;
  for (i = 0; i < 58; i++) {
    table_rev[table[i]] = int2bigInt(i, 8, 0);
  } 

  var l = string.length;
  var long_value = int2bigInt(0, 1, 0);  

  var num_58 = int2bigInt(58, 8, 0);

  var c;
  for(i = 0; i < l; i++) {
    c = string[l - i - 1];
    long_value = add(long_value, mult(table_rev[c], pow(num_58, i)));
  }

  var hex = bigInt2str(long_value, 16);  

  var str = hex2a(hex);  

  var nPad;
  for (nPad = 0; string[nPad] == table[0]; nPad++);  

  var output = str;
  if (nPad > 0) output = repeat("\0", nPad) + str;

  return output;
}

function hex2a(hex) {
    var str = '';
    for (var i = 0; i < hex.length; i += 2)
        str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
    return str;
}

function a2hex(str) {
    var aHex = "0123456789abcdef";
    var l = str.length;
    var nBuf;
    var strBuf;
    var strOut = "";
    for (var i = 0; i < l; i++) {
      nBuf = str.charCodeAt(i);
      strBuf = aHex[Math.floor(nBuf/16)];
      strBuf += aHex[nBuf % 16];
      strOut += strBuf;
    }
    return strOut;
}

function pow(big, exp) {
    if (exp == 0) return int2bigInt(1, 1, 0);
    var i;
    var newbig = big;
    for (i = 1; i < exp; i++) {
        newbig = mult(newbig, big);
    }

    return newbig;
}

function repeat(s, n){
    var a = [];
    while(a.length < n){
        a.push(s);
    }
    return a.join('');
}