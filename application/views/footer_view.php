<footer>
	
</footer>
<script src="<?php echo base_url();?>style/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>style/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>style/bootstrap-3.3.6-dist/js/npm.js"></script>
<script>
	function confirmation_equipment(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo ekipējumu?")
		if (answer)
			location.href=<?php base_url()?>"delete_equipment/" + id
	}
	function confirmation_rarity(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo ierakstu?")
		if (answer)
			location.href=<?php base_url()?>"delete_rarity/" + id
	}
	function confirmation_type(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo ierakstu?")
		if (answer)
			location.href=<?php base_url()?>"delete_type/" + id
	}
	function confirmation_news(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo ierakstu?")
		if (answer)
			location.href=<?php base_url()?>"delete_news/" + id
	}
	function confirmation_post(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo rakstu?")
		if (answer)
			location.href=<?php base_url()?>"delete_post/" + id
	}
	function confirmation_comment(id){
		var answer = confirm ("Vai Jūs tiešām gribat izdzēst šo komentāru?")
		if (answer)
			location.href=<?php base_url()?>"../delete_comment/" + id
	}
</script>
</body>
</html>