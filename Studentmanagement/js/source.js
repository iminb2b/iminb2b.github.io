getData();

var ok=0;
$(function(){
	$(".info").validate({
		rules: {
			name:{
				required: true,
				minlength: 3,
			},
			email:{
				required: true,
				email: true,

			},
			addr: {
				required: true,
			},
			phone:{
				required: true,
				digits: true,
				minlength: 9,
			},
			gender:{
				required:true,
			}
		},
		messages:{
		}, errorElement: "p",
		submitHandler: function(){
			let name = $("#name").val();
			let email = $('#email').val();
			let phone = $('#phone').val();
			let addr = $('#addr').val();
			let gender= $('#male:checked').val()??$('#female:checked').val() ;
			let id=$('#index').val()?? '';
			let unique = checkEmail(email, id);
			if(unique ==1){

				storeData(id, name, email, phone, addr, gender);
				document.getElementById('unique').style.display = 'none';
   				getData();
			}else if(unique==0){
				document.getElementById('unique').style.display = 'block';
			}
			
		}
	});
});
function checkEmail (email, id){
	let unique = 1;
   
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	for(i = 0; i < students.length ; i++){
		if(i==id){
			unique=1;
		}
		if(email == students[i].email){
			unique = 1;
		}
	}
	return unique;

}

function deleteStudent(index){
	if(confirm('Are you sure to delete this student?')){
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	index--;
	students.splice(index,1);
	localStorage.setItem('students', JSON.stringify(students));
	}
	getData();
}

function editStudent(id) {
	
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	document.getElementById('index').value = id; 
	document.getElementById('name').value = students[id].name; 
	document.getElementById('email').value = students[id].email; 
	document.getElementById('phone').value = students[id].phone; 
	document.getElementById('addr').value = students[id].addr; 
	if(students[id].gender==1)
	document.getElementById('male').checked = 'checked';
	else 
	document.getElementById('female').checked = 'checked';
	
    console.log(id);
}
function storeData(id,name, email, phone, addr, gender){
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
		if(!id){
		students.push({
			name: name, 		
			email:email, 
			phone:phone,
			gender:gender,
			addr: addr
		});
		}else{
			students[id]= {
				name: name,
				email:email, 
				phone:phone,
				gender:gender,
				addr: addr
			}

		}
	localStorage.setItem('students', JSON.stringify(students));
}


$('#reset').click(function(){
	document.getElementById('index').value = null;
	document.getElementById('name').value = null;
	document.getElementById('email').value = null;
	document.getElementById('phone').value = null;
	document.getElementById('addr').value = null;
	document.getElementById('male').checked = null;
	document.getElementById('female').checked = null;
	document.getElementById('unique').style.display = 'none';

})

function miniForm(){
	$('form').toggle();

}
function filter(){
	let filter = $('select').val();
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	let drawTable = '';
	let id =0;
	if (filter== 1||filter ==2) {
		
		students.forEach((student,index) => {
			let studentId = index;
			let display="";
			let gender = student.gender == 1 ? 'male' : 'female';
			if(student.gender==filter){
				display="";
				++id;
			}else{
				display="display:none";
			}
			if(id%2==0){
				bg= "gray";
			}else{
				bg="white";
			}
			drawTable += `
			<tr class=${bg} style=${display} onclick"editStudent(${index})"> 
				<td class="check" ><input type="checkbox" unchecked class="checkB box${index}"></td>
				<td class="id">${id}</td>
				<td class="name">${student.name}</td>
				<td class="email">${student.email}</td>
				<td class="phone">${student.phone}</td>
				<td class="addr">${student.addr}</td>
				<td class="gender">${gender}</td>
				<td class="action">
					<a href='#' onclick="editStudent(${index})">edit</a>
					<a href='#' onclick="deleteStudent(${index})">Delete</a>

				</tr>`;

	})
	document.getElementById('tbody').innerHTML = drawTable;
	}else{
		students.forEach((student,index) => {
			let studentId = index;
			let gender = student.gender == 1 ? 'male' : 'female';
			if(index%2==1){
				bg= "gray";
			}else{
				bg="white";
			}

			drawTable += `
			<tr onclick="editStudent(${index})" class=${bg} > 
				<td class="check" ><input type="checkbox" unchecked class="checkB box${index}"></td>
				<td class="id">${++index}</td>
				<td class="name">${student.name}</td>
				<td class="email">${student.email}</td>
				<td class="phone">${student.phone}</td>
				<td class="addr">${student.addr}</td>
				<td class="gender">${gender}</td>
				<td class="action">
					<a href='#' onclick="editStudent(${index})">edit</a>
					<a href='#' onclick="deleteStudent(${index})">Delete</a>

				</tr>`;

	})
	document.getElementById('tbody').innerHTML = drawTable;
	}
	
}
function selectAll(ok){
	let check= document.getElementsByClassName("checkB");
	$('.checkB').attr('checked', 'true');
}

function getData(){
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	document.getElementById("all").checked = false;
	let drawTable = '';
	students.forEach((student,index) => {
			let studentId = index;
			let gender = student.gender == 1 ? 'male' : 'female';
			if(index%2==1){
				bg= "gray";
			}else{
				bg="white";
			}

			drawTable += `
			<tr onclick="editStudent(${index})" class=${bg} > 
				<td class="check" ><input type="checkbox" unchecked class="checkB box${index}"></td>
				<td class="id">${++index}</td>
				<td class="name">${student.name}</td>
				<td class="email">${student.email}</td>
				<td class="phone">${student.phone}</td>
				<td class="addr">${student.addr}</td>
				<td class="gender">${gender}</td>
				<td class="action">
					<a href='#' onclick="editStudent(${index})">edit</a>
					<a href='#' onclick="deleteStudent(${index})">Delete</a>

				</tr>`;

	})
	document.getElementById('tbody').innerHTML = drawTable;
}
function delStudent(index){
	if(confirm('Are you sure to delete these students?')){
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	let del=[];
	for(i=0; i< $('.checkB').length; i++){
		let box = '.box'+i;
		let c =$(box).is(":checked");
		if( c == true){
			del.push(i);
		}
	}
	if(del.length==i){
		students = [];
	}else{
		for(j = 0; j< del.length ; j++){
		let d=del[j];
		students.splice(d,1);

		}
	}
	
	localStorage.setItem('students', JSON.stringify(students));
	}
	getData();
}
function findStudent(){
	let find = $("#search").val();
	let getData = localStorage.getItem('students');
	let students = getData ? JSON.parse(getData) : [];
	let id=0;
	let drawTable = '';
	
	students.forEach((student,index) => {
			let gender = student.gender == 1 ? 'male' : 'female';
		 	console.log()
			if(student.name.includes(find)||student.email.includes(find)||student.phone.toString().includes(find)||student.addr.includes(find)){
				display="";
				++id;
			}else{
				display="display:none";
			}
			if(id%2==0){
				bg= "gray";
			}else{
				bg="white";
			}
			drawTable += `
			<tr class=${bg} style=${display} onclick"editStudent(${index})"> 
				<td class="check" ><input type="checkbox" unchecked class="checkB box${index}"></td>
				<td class="id">${id}</td>
				<td class="name">${student.name}</td>
				<td class="email">${student.email}</td>
				<td class="phone">${student.phone}</td>
				<td class="addr">${student.addr}</td>
				<td class="gender">${gender}</td>
				<td class="action">
					<a href='#' onclick="editStudent(${index})">edit</a>
					<a href='#' onclick="deleteStudent(${index})">Delete</a>

				</tr>`;

	})
	document.getElementById('tbody').innerHTML = drawTable;
}

function autoCreate(){
	let number = $("#number").val();

	let names=["Hang Nguyen", "Minh Nguyen", "Hung Tran", "Seo Eun Kwang", "Lee Min Hyuk", "Lee Chang Sub", "Yook Sung Jae","Peniel Shin", "Im Hyun Sik", "Jung Il Hoon" ];
	let emails=["mail1@gmail.com","mail2@gmail.com", "mail3@gmail.com", "mail4@gmail.com", "mail5@gmail.com" ];
	let addresses=["9 Faulkner Crescent, North york", "37 Buckland Road", "24 Feland Crescent","622 Brookhaven Drive","8 Petiole Road", "133 Victory Drive"];
	for(i=0; i<number; i++){
		let name=  names[Math.floor(Math.random() * 9) ];
		let email= emails[Math.floor(Math.random() * 4) ];
		let phone=Math.floor((Math.random() * 999999999) +100000000);
		let gender=Math.floor((Math.random() * 2) +1);
		let addr=addresses[Math.floor(Math.random() * 5) ];
		let id='';

		storeData(id, name, email, phone, addr, gender);
	}
	getData();
}