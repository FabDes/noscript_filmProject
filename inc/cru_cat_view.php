<div class="frameCat">
	<h3>Gestion des catégories :</h3>
	<h4 id="validationCru"><?php if (isset($validationCru)) {echo $validationCru;} ?></h4>
	<h4 id="helpbox">Ajouter une catégorie</h4>
	<form action="" method="post">
	    <select name="categorie" size="1" id="catSelection">
	    	<option value="new">Nouvelle catégorie</option>
	    	<?php foreach ($selectCategory as $key => $value) : ?>
		    	<option value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option> 		
	    	<?php endforeach; ?>
		</select>
		<br>
   
    	<input type="text" name="renameCategorie">
    	<br>
    	
    	<button type="submit">Valider</button>
    </form>
</div>
<!-- SELECT ON CHANGING OPTIONS -->
<script type="text/javascript">
	var catSelection = document.getElementById("catSelection");
	var helpbox = document.getElementById("helpbox");
	catSelection.addEventListener("change", function() {
		var indexOption = catSelection.selectedIndex;
		var selectedText = catSelection.options[catSelection.selectedIndex].text;
		//console.log(indexOption);
		//console.log(selectedText);
		if (indexOption == "0") {
			helpbox.textContent = "Ajouter une nouvelle catégorie";
			helpbox.classList.add("helpboxAnim");
		}
		else {
			helpbox.textContent = "Modifier : " + selectedText;
			helpbox.classList.add("helpboxAnim");
		}
	});
</script>