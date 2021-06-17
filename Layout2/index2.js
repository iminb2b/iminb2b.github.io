function change(page){
	switch(page){
		case 'dot1':
			document.getElementById('cmt1').style.display = 'flex';
			document.getElementById('cmt2').style.display = 'none';
			document.getElementById('cmt3').style.display = 'none';
			break;
		case 'dot2':
			document.getElementById('cmt2').style.display  = 'flex';
			document.getElementById('cmt1').style.display  = 'none';
			document.getElementById('cmt3').style.display  = 'none';
			console.log('ok');
			break;
		case 'dot3':
			document.getElementById('cmt3').style.display  = 'flex';
			document.getElementById('cmt2').style.display  = 'none';
			document.getElementById('cmt1').style.display  = 'none';
			break;
	}
}

function showNav(){
	console.log('hlkfhlsdjc');

	document.getElementById('nav1').style.display= 'block';
}