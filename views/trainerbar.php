<?php 
 $pokemon = Pokemon::getPokemon();
?>

<div id="left-bar">
	<!-- Pull Trainer Name -->
	<h3>Trainer Name</h3>
<!-- Loop through Pokemon -->
<?php foreach($pokemon as $pObject) { ?>
	<div class="box-container" id="player<?php echo $pObject->Name; ?>XX">
		<h4><?php echo $pObject->Name; ?><span class=""></span></h4>
		<p><img class="pokemon-sprite" src="http://www.pokestadium.com/sprites/xy/<?php echo strtolower($pObject->Name); ?>.gif" alt="<?php echo $pObject->Name; ?>"></p>
		<div data-curr="15" data-max="20" class="hpBar"><div class="bar"></div></div>
	</div>
<button onclick="takeDamage('player<?php echo $pObject->Name; ?>XX','4')">Hurt <?php echo $pObject->Name; ?></button>
<button onclick="healPokemon('player<?php echo $pObject->Name; ?>XX','4')">Heal <?php echo $pObject->Name; ?></button>
<?php } ?>

</div>