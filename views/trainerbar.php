<?php 

if (!self::loggedIn())
{
	return;
}
$pokemonModel = new TrainerPokemon();
 $pokemon = $pokemonModel->getTrainersPokemon($_SESSION["TrainerId"]);
?>

<div id="left-bar">
	<!-- Pull Trainer Name -->
	<h3><?php echo $_SESSION["Name"];?></h3>
<!-- Loop through Pokemon -->
<?php foreach($pokemon as $pObject) { 
$pokemonMoves = $pObject->getMoveSet();
	?>
	<div class="box-container" id="<?php echo $_SESSION["Name"].$pObject->Name.$pObject->idCapturedPokemon; ?>">
		<h4><?php echo $pObject->Name; ?> Lvl <?php echo $pObject->Level; ?><span class=""></span></h4>
		<p><img class="pokemon-sprite" src="http://www.pokestadium.com/sprites/xy/<?php echo strtolower($pObject->Name); ?>.gif" alt="<?php echo $pObject->Name; ?>"></p>
		<div data-curr="<?php echo $pObject->CurrentHP; ?>" data-max="<?php echo $pObject->MaxHP; ?>" class="hpBar"><div class="bar"></div></div>
	</div>
	<div>
		<?php foreach($pokemonMoves as $move):?>
			<button onclick="showInfo(this)" data-power="<?php echo $move->MovePower;?>" data-type="<?php echo $move->Type;?>"><?php echo$move->Name;?></button>
		<?php endforeach;?>
	</div>
<button onclick="takeDamage('<?php echo $_SESSION["Name"].$pObject->Name.$pObject->idCapturedPokemon; ?>','4')">Hurt <?php echo $pObject->Name; ?></button>
<button onclick="healPokemon('<?php echo $_SESSION["Name"].$pObject->Name.$pObject->idCapturedPokemon; ?>','4')">Heal <?php echo $pObject->Name; ?></button>
<?php } ?>

</div>
<div id="popup" class="popup">
	<div class="close">X</div>
	<div class="inner-popup">
	</div>
	</div>