$(window).on('load',function(){
var bars = $('.hpBar');
for(var x=0; x < bars.length; x++) {
	triggerHP(bars[x]);
}

$(".close").click(function(){
	$("#popup").hide();
});

});

function takeDamage(target,amount) {
	var hpBar = $('#'+target).find('.hpBar')[0];
	var curr = $(hpBar).attr('data-curr');
	var nhp = curr - amount;
	if(nhp < 0) {
		nhp = 0;
	}
	$(hpBar).attr('data-curr',nhp);
	triggerHP(hpBar);
}

function healPokemon(target,amount) {
	var hpBar = $('#'+target).find('.hpBar')[0];
	var curr = $(hpBar).attr('data-curr');
	var max = $(hpBar).attr('data-max');
	var nhp = +curr + +amount;
	if (+nhp > max) {
		nhp = max;
	}
	$(hpBar).attr('data-curr',nhp);
	triggerHP(hpBar);
}

function triggerHP(target) {
	var hp = $(target).attr('data-curr');
	var max = $(target).attr('data-max');
	var ratio =  100 * (hp/max);
	$(target).find('.bar')[0].style.width = ratio +'%';
	if(ratio > 50) {
		$($(target).find('.bar')[0]).removeClass("hurt");
		$($(target).find('.bar')[0]).removeClass("crit");
	} else if(ratio > 15) {
		$($(target).find('.bar')[0]).addClass("hurt");
		$($(target).find('.bar')[0]).removeClass("crit");
	} else {
		$($(target).find('.bar')[0]).removeClass("hurt");
		$($(target).find('.bar')[0]).addClass("crit");
	}
	var parent = $(target).parents('.box-container')[0];
	if(hp == 0) {
		var name = $(parent).find('h4 span');
		$(name).addClass('fainted');
		var img = $(parent).find('img');
		$(img).addClass('fainted');
	}
	else{
		var name = $(parent).find('h4 span');
		$(name).removeClass('fainted');
		var img = $(parent).find('img');
		$(img).removeClass('fainted');
	}
}


function showInfo(e) {
	console.log(e);
	var attk = 12;
	var def = 11;
	var buff = 0;
	var mp = parseInt($(e).attr('data-power'));
	var type = parseInt($(e).attr('data-type'));
	var effective = 1;
	var dmg = calcDmg(attk,def,buff,mp,type,effective);
	var effective = .5;
	var notdmg = calcDmg(attk,def,buff,mp,type,effective);
	var effective = 2;
	var superdmg = calcDmg(attk,def,buff,mp,type,effective);
	var string = '<div><h3>Example Damage Chart</h3></div>';
	string +='<div>Super Effective Damage Amount '+superdmg+'</div>';
	string +='<div>Regular Damage Amount '+dmg+'</div>';
	string +='<div>Not Effective Damage Amount '+notdmg+'</div>';
	$('.inner-popup').html(string);
	$('#popup').show();

	//((atk + move power +/- buff) * Effective) - (def +/- buff)
}
function calcDmg(attk,def,buff,mp,type,effective) {
	return ((attk + mp + buff) * effective) - (def - buff);
}