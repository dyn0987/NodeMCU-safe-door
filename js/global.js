//read data send from js file
$('input#gesturepwd-submit').on('click', function() {
	
	var name='ned';
	$.post('ajax/grab.php',(name: name); function(data) {
		$('div#gesturepwd').text(data);
		));
		)
	//var name = $('input#gesturepwd').val(); //event handler
	
});
}