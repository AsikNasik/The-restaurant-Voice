let cross = document.getElementsByClassName( 'cross' )[0];
let current_form;
let current_form_info;
let current_popup_overlay;

$(document).ready(function(){
	$('.slideshow-container').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<a class="prev">❮</a>',
		nextArrow: '<a class="next">❯</a>',
		swipe:true,
	})
})


// SLIDER
// Doesn`t work due to if another page can`t find the varibles

// var slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("doter");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}


//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// //   setTimeout(showSlides, 2000);
// }


// CLOSE POP-UPS
$( 'body' ).on( 'click', '.cross', function () {
	current_form.style.display = 'none';
	current_form_info.style.opacity = 0;
	current_popup_overlay.style.display = 'none';
	document.body.style.overflow = 'auto';

	current_form = 0;
	current_form_info = 0;
	current_popup_overlay = 0;
} );


// AUTHORIZATION
$( 'body' ).on( 'click', '#authorization', function () {
	current_form = document.getElementsByClassName( 'section_sign_in' )[0];
	current_form_info = document.getElementsByClassName( 'section_sign_in_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
// add validation to inputs
$( 'body' ).on( 'click', '#sign_in', function ( e ) {
	e.preventDefault();

	let tel = $('body').find( 'input[name="auto_tel"]' ).val();
	let pass = $('body').find( 'input[name="auto_pass"]' ).val();

	if (tel == '' && pass == ''){
		alert( 'Write your data!' );
		return false;
	}
	else if ( tel.length < 9){
		alert( 'Check your telephone!' );
		return false;
	}
	else if( pass.length < 4  ) {
		alert( 'Minimum password length is 4!' );
		return false;
	}

	let dat = {
		// 'action': 'login',
		'username': tel,
		'password': pass,
	};


	$.ajax( {
		type: 'POST',
		url: 'app/crud/login.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );


// ADD USER / REGISTRATION
$( 'body' ).on( 'click', '#registration', function () {
	current_form = document.getElementsByClassName( 'section_registration' )[0];
	current_form_info = document.getElementsByClassName( 'section_registration_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );

$( 'body' ).on( 'click', '#register_now', function () {
	current_form.style.display = 'none';
	current_form_info.style.opacity = 0;
	current_popup_overlay.style.display = 'none';

	current_form = document.getElementsByClassName( 'section_registration' )[0];
	current_form_info = document.getElementsByClassName( 'section_registration_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
} );
// add validation to inputs
$( 'body' ).on( 'click', '#register', function ( e ) {
	e.preventDefault();

	let tel = $( 'body' ).find( 'input[name="register_name"]' ).val();
	let fio = $( 'body' ).find( 'input[name="register_fio"]' ).val();
	let city = $( 'body' ).find( 'select[name="register_city"]' ).val();
	let pass = $( 'body' ).find( 'input[name="register_pass"]' ).val();
	let pass2 = $( 'body' ).find( 'input[name="register_pass2"]' ).val();

	if ( pass.length < 4 ){
		alert( 'Minimum password length is 4!' );
		return false;
	}
	else if( pass !== pass2 ) {
		alert( 'Passwords are not the same!' );
		return false;
	}
	else if(tel.length < 9)
	{
		alert( 'Check your telephone number!' );
		return false;
	}

	console.log( pass, pass2 );

	let dat = {
		'action': 'create_user',
		'username': tel,
		'fio': fio,
		'city': city,
		'pass': pass,
		'pass2': pass2,
	};


	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			if ( jsonData.success  ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );

// EDIT USER
// add select to sale(0,5,10,15) & not correct set
let tel_old;
let sale;
$( 'body' ).on( 'click', '#table_users .editF', function () {
	current_form = document.getElementsByClassName( 'section_registration_edit' )[0];
	current_form_info = document.getElementsByClassName( 'section_registration_edit_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];
	let tds = $( this ).parents( 'tr' ).find( 'td' );

	let inputs = $( '.form_registration_edit_inputs input' );
	let select = $( '.form_registration_edit_inputs select[name="city"]' );
	tel_old = $( this ).parents( 'tr' ).find( 'td' )[2].innerText;
	sale = $( this ).parents( 'tr' ).find( 'td' )[4].innerText;

	console.log(tel_old);
	console.log(sale);

	let cityId =  $( this ).parents( 'tr' ).find( '.city' ).data('id');
	select.val(cityId);

	inputs[0].value = tds.get( 2 ).innerHTML;
	inputs[1].value = tds.get( 3 ).innerHTML;
	// select[0].value = tds.get( 5 ).innerHTML;
	inputs[2].value = tds.get( 6 ).innerHTML;


	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
// post id_city, not name
$( '#save_user' ).on( 'click', function ( e ) {
	e.preventDefault();

	let tel = $( 'body' ).find( 'input[name="telephone"]' ).val();
	let fio = $( 'body' ).find( 'input[name="fio"]' ).val();
	let pass = $( 'body' ).find( 'input[name="password"]' ).val();
	let city = $( 'body' ).find( 'select[name="city"]' ).val();
	let tel_past = tel_old;
//alert(city);
	let dat = {
		'action': 'update_user',
		'tel': tel,
		'fio': fio,
		'pass': pass,
		'city': city,
		'tel_past': tel_past
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/update.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );

} );

// DELETE USER
$("body").on("click", "#table_users .delF", function(){
    let telephone = $(this).parents("tr").find('.telephone')[0].innerHTML;
	let dat = {
		'action': 'delete_user',
		'telephone': telephone
	}

    $.ajax({
        type: "POST",
        url: 'app/crud/delete.php',
        data: dat,
        success: function (response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData);
            if (jsonData.success ) {
	            window.location.reload();
            }
            else {
                alert('Invalid Credentials!');
            }
        }
    })

})

function changeYear(str){
	let date = [];

	for(let j = 6; j < str.length; j++)
	{
		date.push(str[j])
	}
	date.push('-');

	for(let j = 3; j < 5; j++)
	{
		date.push(str[j]);
	}
	date.push('-');

	for(let j = 0; j < 2; j++)
	{
		date.push(str[j]);
	}

	date = date.join('');

	return (date);
}

// ADD STAFFER
$( 'body' ).on( 'click', '#addStaffer', function () {
	current_form = document.getElementsByClassName( 'section_staff' )[0];
	current_form_info = document.getElementsByClassName( 'section_staff_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';

	let input_date = document.getElementById("set_date");
	let today = new Date();

	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0');
	let yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;

	maxDate = (yyyy - 18) + '-' + mm + '-' + dd;
	minDate = (yyyy - 80) + '-' + mm + '-' + dd;

	input_date.max = maxDate;
	input_date.min = minDate;
} );
// add validation to inputs
$( 'body' ).on( 'click', '#add_staffer', function ( e ) {
	e.preventDefault();

	let tel = $( 'body' ).find( 'input[name="telephone_st"]' ).val();
	let fio = $( 'body' ).find( 'input[name="fio_st"]' ).val();
	let birthday = $( 'body' ).find( 'input[name="birthday"]' ).val();
	let type = $( 'body' ).find( 'select[name="type_st"]' ).val();
	let pass = $( 'body' ).find( 'input[name="pass"]' ).val();
	let pass2 = $( 'body' ).find( 'input[name="pass2"]' ).val();

	if ( pass.length < 4 ){
		alert( 'Minimum password length is 4!' );
		return false;
	}
	else if( pass !== pass2 ) {
		alert( 'Passwords are not the same!' );
		return false;
	}
	else if(tel.length < 9)
	{
		alert( 'Check your telephone number!' );
		return false;
	}

	let dat = {
		'action': 'create_staff',
		'telephone': tel,
		'fio': fio,
		'birthday': birthday,
		'type': type,
		'pass': pass,
		'pass2': pass2,
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );

// EDIT STAFFER
// add setting to typeworker
let old_tel;
$( 'body' ).on( 'click', '#table_stass .editF', function (e) {
	current_form = document.getElementsByClassName( 'section_staff_edit' )[0];
	current_form_info = document.getElementsByClassName( 'section_staff_edit_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];

	let input_date = document.getElementById("set_date_edit");
	let today = new Date();

	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0');
	let yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;

	maxDate = (yyyy - 18) + '-' + mm + '-' + dd;
	minDate = (yyyy - 80) + '-' + mm + '-' + dd;

	input_date.max = maxDate;
	input_date.min = minDate;

	let lastDate =  $( this ).parents( 'tr' ).find('td')[4].innerHTML;
	let changeDate = changeYear(lastDate);

	let tds = $( this ).parents( 'tr' ).find( 'td' );
	let inputs = $( '.form_staff_edit_inputs input' );

	for ( let i = 2, j = 0; i < tds.length - 1; i++, j++ ) {

		inputs[j].value = tds.get( i ).innerHTML;
	}
	inputs[3].value = $( this ).parents( 'tr' ).find( 'td' )[6].innerHTML;
	input_date.value = changeDate;

	old_tel = $( this ).parents( 'tr' ).find('td')[2].innerHTML;

	let td_sel = $(this).parents('tr').find('.type')[0].innerText;
	let select = $('.form_staff_edit_inputs  select');
	select.val(td_sel);

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );

$( '#save_staffer' ).on( 'click', function ( e ) {
	e.preventDefault();

	let fio = $( 'body' ).find( 'input[name="fio_ste"]' ).val();
	let tel = $( 'body' ).find( 'input[name="telephone_ste"]' ).val();
	let birthday = $( 'body' ).find( 'input[name="birthdaye"]' ).val();
	let type = $( 'body' ).find( 'select[name="type_ste"]' ).val();
	let pass = $( 'body' ).find( 'input[name="passe"]' ).val();
	let tel_past = old_tel;

	let dat = {
		'action': 'update_staff',
		'telephone': tel,
		'fio': fio,
		'birthday': birthday,
		'type': type,
		'pass': pass,
		'tel_past': tel_past
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/update.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );

// DELETE STAFFER
$( 'body' ).on( 'click', '#table_stass .delF', function () {
	let telephone = $( this ).parents( 'tr' ).find( '.telephone' )[0].innerHTML;
	let dat = {
		'action': 'delete_staff',
		'telephone': telephone
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/delete.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );


// ADD TABLE
$( 'body' ).on( 'click', '#addTable', function () {
	current_form = document.getElementsByClassName( 'section_book' )[0];
	current_form_info = document.getElementsByClassName( 'section_book_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	let input_date = $('.form_book_inputs input')[0];
	let today = new Date();

	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0');
	let yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	input_date.min = today;

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
// add list-search to telephone_cl and number_staff
$( 'body' ).on( 'click', '#add_table', function ( e ) {
	e.preventDefault();



	let date = $( 'body' ).find( 'input[name="date"]' ).val();
	let time = $( 'body' ).find( 'input[name="time"]' ).val();
	let tel_cl = $( 'body' ).find( 'select[name="telephone_cl"]' ).val();
	let num_st = $( 'body' ).find( 'select[name="number_staff"]' ).val();

	if(date == null)
	{
		alert('Check the date!');
		return false;
	}
	else if(time == null)
	{
		alert('Check the time!');
		return false;
	}
	else if(tel_cl == null)
	{
		alert('Check the telephone!');
		return false;
	}
	else if(num_st == null)
	{
		alert('Check the number staffer!');
		return false;
	}

	let datetime = date + ' ' + time + ':00';

	let dat = {
		'action': 'create_service',
		'datetime': datetime,
		'telephone_cl': tel_cl,
		'number_staff': num_st,
	};

	console.log(dat);

	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );

} );

// EDIT TABLE
// add list-search to telephone_cl and number_staff
let staffer_old;
let table_old;
$( 'body' ).on( 'click', '#table_table .editF', function () {
	current_form = document.getElementsByClassName( 'section_book_edit' )[0];
	current_form_info = document.getElementsByClassName( 'section_book_edit_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];



	let tds = $( this ).parents( 'tr' ).find( 'td' );
	table_old = $( this ).parents( 'tr' ).find( 'td' );
	let inputs = $( '.form_book_edit_inputs input' );
	let staffer =$( this ).parents( 'tr' ).find( '.number_st' ).data('id');
	staffer_old = staffer;

	for ( let i = 3, j = 2; i < tds.length - 1; i++, j++ ) {

		inputs[j].value = tds.get( i ).innerHTML;
	}


	let select = $( '.form_book_edit_inputs select[name="number_staffe"]' );

	let stafferID =  $( this ).parents( 'tr' ).find( '.number_st' ).data('id');
	select.val(stafferID);
	select[0].value = staffer;

	let dateStr = $( this ).parents( 'tr' ).find( 'td' ).eq(2);
	let date = dateStr.data('date');
	let time = dateStr.data('time');

	inputs[0].value = date;
	inputs[1].value = time;

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );

$('body').on('click', '#save_table', function(e){
	e.preventDefault();

	let datetime_past = table_old[2].innerText;
	let tel_cl_past = table_old[3].innerText;
	let num_st_past = staffer_old;

	let date = $( 'body' ).find( 'input[name="datee"]' ).val();
	let time = $( 'body' ).find( 'input[name="timee"]' ).val();
	let tel = $( 'body' ).find( 'input[name="telephone_cle"]' ).val();
	let num = $( 'body' ).find( 'select[name="number_staffe"]' ).val();

	let datetime = date + ' ' + time + ':00';

	let dat = {
		'action': 'update_service',
		'datetime_past': datetime_past,
		'tel_cl_past': tel_cl_past,
		'num_st_past': num_st_past,
		'datetime': datetime,
		'tel': tel,
		'num': num
	};

	console.log(dat)
	$.ajax( {
		type: 'POST',
		url: 'app/crud/update.php',
		data: dat,
		success: function ( response ) {
			try {
				var jsonData = JSON.parse( response );
				console.log( jsonData );
				if ( jsonData.success) {
					window.location.reload();
				} else {
					alert( 'Invalid Credentials!' );
				}
			} catch ( e ) {
				alert( 'Service already exists!' );
			}
		},
	} );
})

// DELETE TABLE
$("body").on("click", "#table_table .delF", function(){
    let info = $(this).parents("tr").find(' td ');
	let staffer =$( this ).parents( 'tr' ).find( '.number_st' ).data('id');

	console.log(info[2].innerText)
	let dat = {
		'action': 'delete_service',
		'datetime': info[2].innerText,
		'tel_cl': info[3].innerText,
		'num_st': staffer
	}
	console.log(dat)

    $.ajax({
        type: "POST",
        url: 'app/crud/delete.php',
        data: dat,
        success: function (response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData);
            if (jsonData.success) {
	            window.location.reload();
            }
            else {
                alert('Invalid Credentials!');
            }
        }
    })
})

// ADD CITY
$( 'body' ).on( 'click', '#addCity', function () {
	current_form = document.getElementsByClassName( 'section_city' )[0];
	current_form_info = document.getElementsByClassName( 'section_city_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
// add validation to input name_city
$( 'body' ).on( 'click', '#add_city', function ( e ) {
	e.preventDefault();

	let name = $( 'body' ).find( 'input[name="city"]' ).val();
	let dat = {
		'action': 'create_city',
		'name': name,
	};
	console.log( dat );
	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			try {
				var jsonData = JSON.parse( response );
				console.log( jsonData );
				if ( jsonData.success) {
					window.location.reload();
				} else {
					alert( 'Invalid Credentials!' );
				}
			} catch ( e ) {
				alert( 'City already exists!' );
			}
		},
	} );
} );

// EDIT CITY
let city_old;
$( 'body' ).on( 'click', '#table_city .editF', function () {
	current_form = document.getElementsByClassName( 'section_city_edit' )[0];
	current_form_info = document.getElementsByClassName( 'section_city_edit_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];
	let tds = $( this ).parents( 'tr' ).find( 'td' );

	let inputs = $( '.form_city_edit_inputs input' );

	for ( let i = 2, j = 0; i < tds.length; i ++, j ++ ) {
		inputs[j].value = tds.get( i ).innerHTML;
	}

	city_old = $( this ).parents( 'tr' ).find( 'td' )[2].innerText;

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );

$('body').on('click', '#save_city', function(e){
	e.preventDefault();

	// previous data
	let name_last = city_old;
	// new data
	let name = document.getElementsByName('city_edit')[0].value;

	let dat = {
		'action': 'update_city',
		'name': name,
		'name-last': name_last
	};
	$.ajax( {
		type: 'POST',
		url: 'app/crud/update.php',
		data: dat,
		success: function ( response ) {
			try {
				var jsonData = JSON.parse( response );
				console.log( jsonData );
				if ( jsonData.success) {
					window.location.reload();
				} else {
					alert( 'Invalid Credentials!' );
				}
			} catch ( e ) {
				alert( 'City already exists!' );
			}
		},
	} );
})

// DELETE CITY
$( 'body' ).on( 'click', '#table_city .delF', function () {
	let city = $( this ).parents( 'tr' ).find( '.city' )[0].innerHTML;

	let dat = {
		'action': 'delete_city',
		'name': city,
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/delete.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success  ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );


// ADD REVIEW
// add authorizated user_name from cookie
$( 'body' ).on( 'click', '#leave_review', function () {
	current_form = document.getElementsByClassName( 'section_review' )[0];
	current_form_info = document.getElementsByClassName( 'section_review_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
// add validation
$('body').on('click', '#send_review', function(e){
	e.preventDefault();

	let tel = $( 'body' ).find( 'input[name="telephone"]' ).val();
	let note = $( 'body' ).find( 'textarea[name="note"]' ).val();
	let mark = $( 'body' ).find( 'input[name="mark"]' ).val();

	if ( tel.length < 9 ){
		alert( 'Check your telephone number!' );
		return false;
	}
	else if( note.length<=5 ) {
		alert( 'Add the review text!' );
		return false;
	}
	else if(mark < 0 || mark > 5)
	{
		alert( 'Incorrect mark!' );
		return false;
	}

	let dat = {
		'action': 'create_review',
		'telephone': tel,
		'note': note,
		'mark': mark
	};
	console.log( dat );
	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success  ) {
				cross.click();
				if(jsonData.reviews){
					let reviews = $('.section_reviews');
					if(reviews){
						$('.slideshow-container').slick('unslick');

						reviews.replaceWith(jsonData.reviews);
						setTimeout(function(){
							$('.slideshow-container').slick({
								slidesToShow: 1,
								slidesToScroll: 1,
								prevArrow: '<a class="prev">❮</a>',
								nextArrow: '<a class="next">❯</a>',
								swipe:true,
							})
						}, 0)
					}
				}
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
})

$( 'body' ).on( 'click', '#watch_all_reviews', function () {
	current_form = document.getElementsByClassName( 'section_city' )[0];
	current_form_info = document.getElementsByClassName( 'section_city_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );

// DELETE REVIEW
$( 'body' ).on( 'click', '#table_reviews .delF', function () {
	let tds = $( this ).parents( 'tr' ).find( 'td' );

	let dat = {
		'action': 'delete_review',
		'telephone': tds[1].innerText,
		'note': tds[2].innerText,
		'mark': tds[3].innerText,
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/delete.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success ) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );

// ADD TYPE
$( 'body' ).on( 'click', '#addType', function () {
	current_form = document.getElementsByClassName( 'section_type' )[0];
	current_form_info = document.getElementsByClassName( 'section_type_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[0];

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';

} );
// add validation
$('body').on('click', '#add_type', function(e){
	e.preventDefault();

	let name = $( 'body' ).find( 'input[name="type"]' ).val();
	let salary = $( 'body' ).find( 'input[name="salary"]' ).val();

	if (name.length < 5 || name == null)
	{
		alert( 'Check your name type!' );
		return false;
	}
	else if	( salary.length < 4 ){
		alert( 'Check the salary!' );
		return false;
	}

	let dat = {
		'action': 'create_type',
		'name': name,
		'salary': salary
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/create.php',
		data: dat,
		success: function ( response ) {
			try {
				var jsonData = JSON.parse( response );
				console.log( jsonData );
				if ( jsonData.success) {
					window.location.reload();
				} else {
					alert( 'Invalid Credentials!' );
				}
			} catch ( e ) {
				alert( 'Type already exists!' );
			}
		},
	} );
})

// EDIT TYPE
let type_old;
$( 'body' ).on( 'click', '#table_type .editF', function () {
	current_form = document.getElementsByClassName( 'section_type_edit' )[0];
	current_form_info = document.getElementsByClassName( 'section_type_edit_info' )[0];
	current_popup_overlay = document.getElementsByClassName( 'popup_overlay' )[1];
	let tds = $( this ).parents( 'tr' ).find( 'td' );

	let inputs = $( '.form_type_edit_inputs input' );

	for ( let i = 2, j = 0; i < tds.length; i ++, j ++ ) {
		inputs[j].value = tds.get( i ).innerHTML;
	}

	type_old = $( this ).parents( 'tr' ).find( 'td' )[2].innerText;

	current_form.style.display = 'inline';
	current_form_info.style.opacity = 1;
	current_popup_overlay.style.display = 'flex';
	current_popup_overlay.style.alignItems = 'center';
	document.body.style.overflow = 'hidden';
} );
$('body').on("click", '#save_type', function(e){
	e.preventDefault();

	// previous data
	let name_last = type_old;
	// new data
	let name = document.getElementsByName('typee')[0].value;
	let salary = document.getElementsByName('salarye')[0].value;
	console.log(name);
	console.log(salary);
	console.log(name_last);
	let dat = {
		'action': 'update_type',
		'name': name,
		'salary': salary,
		'name-last': name_last
	};
	$.ajax( {
		type: 'POST',
		url: 'app/crud/update.php',
		data: dat,
		success: function ( response ) {
			try {
				var jsonData = JSON.parse( response );
				console.log( jsonData );
				if ( jsonData.success) {
					window.location.reload();
				} else {
					alert( 'Invalid Credentials!' );
				}
			} catch ( e ) {
				alert( 'Type already exists!' );
			}
		},
	} );
})

// DELETE TYPE
$( 'body' ).on( 'click', '#table_type .delF', function () {
	let tds = $( this ).parents( 'tr' ).find( 'td' );

	let dat = {
		'action': 'delete_type',
		'name': tds[2].innerText
	};

	$.ajax( {
		type: 'POST',
		url: 'app/crud/delete.php',
		data: dat,
		success: function ( response ) {
			var jsonData = JSON.parse( response );
			console.log( jsonData );
			if ( jsonData.success) {
				window.location.reload();
			} else {
				alert( 'Invalid Credentials!' );
			}
		},
	} );
} );



// TABLES

// STAFF add/update/delete     --- set the typeworker to add/update
// USER  add/update/delete	   --- add select to sale(0,5,10,15) to update
								// & add validation for inputs to add
								// &  post id_city, not name to update
// TYPE add/update/delete      --- add validation to add
// CITY add/update/delete	   --- add validation to input name_city to add
// SERVICE add/update/delete   --- add list-search to telephone_cl
								// & number_staff to add/update
// REVIEW add/delete   		   --- add authorizated user_name from cookie to add
								// & add validation to add
