/* Survey Javascript */
jQuery(document).ready(function($) {
	
	var counts = $("[id^=Q]").length;
	if(counts < 4) {
		SequenceControl(true);
	}
	
	$('#addQuestion').click(function(){
		var number = Number($('#qnumber').val());
		var i = Number(number +1); 
		$('#qnumber').val(i); 
		$('#Q'+ number ).after('<div id="Q'+ i +'" class="questions"><div class="row">'+
			'<div class="col-lg-6">'+
				'<label for="">Question'+ i +' Title</label>'+
				'<input type="text" class="form-control" name="qTitle'+ i +'">'+
				'</div>'+
				'<div class="col-lg-6">'+
				'<label for="">Question'+ i +' Description</label>'+
				'<input type="text" class="form-control" name="qDescription'+ i +'">'+
				'</div>'+
				'</div>'+
				'<div class="row ">'+
				'<div class="col-lg-6">'+
				'<label for="">Question'+ i +' Type</label>'+
				'<select class="form-control" id="qType'+ i +'" name="qType'+ i +'">'+
					'<option value="" selected disabled>Question Type</option><option value="1">T/F</option>'+
					'<option value="2">Multiple Choice & Signle Answer</option>'+
					'<option value="3">Multiple Choice & Multiple Answers</option>'+
					'<option value="4">Open & End</option>'+
					'</select>'+
				'</div><br>'+
			'</div><div class="row options">'+
			'</div><div class="row toggles">'+
			'</div>'+
			/*
			'<div class="col-lg-6">'+
					'<label>Is it mandatory?</label>'+
					'<select class="form-control" name="qMandatory'+ i +'">'+
						'<option value="1">YES</option>'+
						'<option value="0">NO</option>'+
					'</select>'+
				'</div>'+
			 '<div class="col-lg-6">'+
				'<label for="">Question1 Is Sequence?</label>'+
				 '<select class="form-control" id="IsSequence'+ i +'">'+
								  '<option value="1">YES</option>'+
								  '<option value="0" selected>NO</option>'+
				'</select>'+
			'</div>'+
			*/
			/*
		'<div class="row">'+
			'<div class="col-lg-6"><a class="button'+i+'" id="deleteQuestion">Delete Question</a></div>'+
		'</div></div>');	
		*/
		'</div>');
		if(number >= 2) {
			SequenceControl(false);
			//$('#IsSequence').prop("disabled", false);
		}
	});
					
	$('body').on('change', '[id^=qType]', function() {
		var j = $(this).attr("id").replace('qType', ''); 
		if(($('#OptionsTF'+ j ).text().length ===0) && $('#qType'+ j ).val()=="1"){
			$('#Q'+ j + " > .options" ).replaceWith('<div class="row options" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsTF'+ j +'">Options'+ j +' Settings</label>'+
			'<input type="text" id="'+j+'OptionCount1" class="form-control" name="oValue'+ j +'.1" placeholder="OptionValue" value="TRUE">'+
			'<input type="text" id="'+j+'OptionCount2" class="form-control" name="oValue'+ j +'.2" placeholder="OptionValue" value="False">'+
				'</div><div class="col-lg-6">'+
				'<div class="SequenceQDorp'+j+'"></div>'+
			'</div>');
			/*
			$('#Q'+ j ).append('<br><div class="row" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsTF'+ j +'">Options'+ j +' Settings</label>'+
			'<input type="text" class="form-control" name="oValue'+ j +'.1" placeholder="OptionValue" value="TRUE">'+
			'<input type="text" class="form-control" name="oValue'+ j +'.2" placeholder="OptionValue" value="False">'+
				'</div>'+
			'</div>');
			*/
		}
				   
		if(($('#OptionsMCSA'+ j ).text().length ===0)&&$('#qType'+ j).val()=="2"){
			$('#Q'+ j + " > .options" ).replaceWith('<div class="row options" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsMCSA'+ j +'">Options'+ j +' Settings</label>'+
			'<input type="text" id="'+j+'OptionCount1" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
			'<input type="text" id="'+j+'OptionCount2" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
			'<input type="text" id="'+j+'OptionCount3" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
			'<input type="text" id="'+j+'OptionCount4" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
			'<input type="text" id="'+j+'OptionCount5" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
				'</div><div class="col-lg-6">'+
				'<div class="SequenceQDorp'+j+'"></div>'+
			'</div>');
			/*
			$('#Q'+ j ).append('<br><div class="row" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsMCSA'+ j +'">Options'+ j +' Settings</label>'+
			'<input type="text" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
				'</div>'+
			'</div>');
			*/
		}
		var counts = $("[id^=Q]").length - 1;
		
		var toggleText = '<div class="col-lg-6">'+
            '<label for="">Is it mandatory?</label>'+
            '<select class="form-control" name="qMandatory'+j+'">'+
                              '<option value="1">YES</option>'+
                              '<option value="0" selected>NO</option>'+
		    '</select>'+
        '</div>'+
	     '<div class="col-lg-6">'+
            '<label for="">Question'+j+' Is Sequence?</label>';
		
		//var toggleText = this.responseText;
        toggleText = toggleText + '<label for="">Question'+j+' Is Sequence?</label>';
		if(counts >= 3) {
			toggleText = toggleText + '<select class="form-control" id="IsSequence'+j+'">';
		} else {
			toggleText = toggleText + '<select class="form-control" id="IsSequence'+j+'" disabled>';
		}
        toggleText = toggleText + '<option value="1">YES</option>'+
            '<option value="0" selected>NO</option>'+
            '</select>'+
        '</div>';
		$('#Q'+ j + " > .toggles").html(toggleText);
	});
	
	$('[class^=deletebutton]').click(function() {
		var N = $(this).attr("class").replace('deletebutton', '');
		$("#deleteform form input").val(N);
	});
	
	$('#deleteQuestion').click(function() {
		var counts = $("[id^=Q]").length - 1;
		if(counts == 3) {
			SequenceControl(true);
		}
		if(counts > 1) {
			$('#Q'+ counts).replaceWith('');
			var number = Number($('#qnumber').val());
			var i = Number(number - 1); 
			$('#qnumber').val(i);
		}
	});
	
	$('#IsSequenceTotal').change(function() {
		var sequence = $('#IsSequenceTotal').val();
		if(sequence == "1") {
			var number = Number($('#qnumber').val());
			for(var i = 1; i <= number; i++) {
				var counts = $("[id^="+i+"OptionCount]").length;
				var NextQString = '<label for="">Question'+ i +'\'s next</label>';
				for(var t = 1; t <= counts; t++) {
					NextQString = NextQString + CreateDropDown(i, number,t);
				}
				$('.SequenceQDorp'+i+'').html(NextQString);
			}
		} else {
			var number = Number($('#qnumber').val());
			for(var i = 1; i <= number; i++) {
				$('.SequenceQDorp'+i+'').html("");
			}
		}
		//alert("Number is: "+counts);
	});
	
	/*
	$('[id^=IsSequence]').change(function() {
		var j = $(this).attr("id").replace('IsSequence', ''); 
		var sequence = $('#IsSequence'+j).val();
		if(sequence == "1") {
			var counts = $("[id^="+j+"OptionCount]").length;
			alert("Number is: "+counts);
			//$('.SequenceQDorp').html()
		} else {
			
		}
	});
	*/
});

/* Enable/disable sequence */
function SequenceControl(EnDis) {
	$('[id^=IsSequence]').prop("disabled", EnDis);
}

/* Create Next qeustion dropdown list */
function CreateDropDown(CurrentQ, numberQ, NthOption) {
	var NextOption = '<select class="form-control" id="qNext'+CurrentQ+'" name="'+CurrentQ+'qNext'+NthOption+'">';
	var num = 0;
	for(var i = CurrentQ; i < numberQ; i++) {
		num = i + 1;
		if(num == (CurrentQ+1)) {
			NextOption = NextOption + '<option value="'+num+'" selected>'+num+'</option>';
		} else {
			NextOption = NextOption + '<option value="'+num+'">'+num+'</option>';
		}
	}
	if(num == 0) {
		NextOption = NextOption + '<option value="0" selected disable>No further options</option>';
	}
	NextOption = NextOption + '</select>';
	return NextOption;
}