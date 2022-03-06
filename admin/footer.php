
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript">
	function showstatus(){
		var statuscontainer = document.getElementById('statuscontainer');
		var showbtn = document.getElementById('showbtn');
		console.log(statuscontainer);
		if (statuscontainer.style.display === "none") {
			statuscontainer.style.display = "block";
			showbtn.innerHTML = "Hide Status";
		}else{
			statuscontainer.style.display = "none";
			showbtn.innerHTML = "Show Status";
		}
	}
</script>
<div class="text-light bg-dark" style="height:40px;padding:10px">
		<div style="text-align:center;margin-top: 5px;font-size:12px">Copyright &copy; 2022 Ambulance Management System Made by Gaurav SP, Basavaraj M And Karthikkiran S</div>
	</div>
</div>
</body>
</html>