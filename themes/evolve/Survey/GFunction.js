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
		'<div class="row">'+
			'<div class="col-lg-6"><a class="button'+i+'" id="AddOption4">AddOption</a></div>'+
		'</div>'+
		'</div>');
		if(number >= 2) {
			SequenceControl(false);
			//$('#IsSequence').prop("disabled", false);
		}
		for(var y = 1; y <= i; y++) {
			var counts = $("[id^="+y+"OptionCount]").length;
			var NextQString = '<label for="">Question'+ y +'\'s next</label>';
			for(var t = 1; t <= counts; t++) {
				var nextHTML = $("#"+y+'qNext'+t).val();
				var AnswerVal = $("#"+y+'Answer'+t).val();
				NextQString = NextQString + UpdateDropDown(y, i, t, nextHTML);
				NextQString = NextQString + '<input type="text" id="'+y+'Answer'+ t +'" class="form-control" name="'+ y +'Answer'+ t +'" value="'+AnswerVal+'">';
			}
			$('.SequenceQDorp'+y+'').html(NextQString);
		}
	});
					
	$('body').on('change', '[id^=qType]', function() {
		var j = $(this).attr("id").replace('qType', ''); 
		j = Number(j);
		var number = Number($('#qnumber').val());
		if(($('#OptionsTF'+ j ).text().length ===0) && $('#qType'+ j ).val()=="1"){
			var optionString = "";
			optionString = optionString + '<div class="row options" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsTF'+ j +'">Question'+ j +'\'s Option Settings</label>'+
			'<input type="text" id="'+j+'OptionCount1" class="form-control" name="'+ j +'oValue1" placeholder="OptionValue" value="True">'+
			'<div style="height: 34px; text-align: right; position: inherit">Answer:</div>'+
			'<input type="text" id="'+j+'OptionCount2" class="form-control" name="'+ j +'oValue2" placeholder="OptionValue" value="False">'+
			'<div style="height: 34px; text-align: right; position: inherit">Answer:</div>'+
			'</div><div class="col-lg-6">'+
			'<div class="SequenceQDorp'+j+'">'+
			'<label for="">Question'+ j +'\'s next</label>';
			for(var i = 1; i <= 2; i++) {
				optionString = optionString + CreateDropDown(j, number, i);
				optionString = optionString + '<input type="text" id="'+j+'Answer'+ i +'" class="form-control" name="'+ j +'Answer'+ i +'" placeholder="Type answer">';
			}
			optionString = optionString + '</div></div>';
			'</div></div>'
			$('#Q'+ j + " > .options" ).replaceWith(optionString);
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
			var optionString = "";
			optionString = optionString + '<div class="row options" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsMCSA'+ j +'">Question'+ j +'\'s Option Settings</label>';
			for(var i = 1; i <= 5; i++) {
				optionString = optionString + '<input type="text" id="'+j+'OptionCount'+ i +'" class="form-control" name="'+ j +'oValue'+ i +'" placeholder="OptionValue">'+
				'<div style="height: 34px; text-align: right; position: inherit">Answer:</div>';
			}
			optionString = optionString + '</div><div class="col-lg-6">'+
			'<div class="SequenceQDorp'+j+'">'+
			'<label for="">Question'+ j +'\'s next</label>';
			for(var i = 1; i <= 5; i++) {
				optionString = optionString + CreateDropDown(j, number, i);
				optionString = optionString + '<input type="text" id="'+j+'Answer'+ i +'" class="form-control" name="'+ j +'Answer'+ i +'" placeholder="Type answer">';
			}
			optionString = optionString + '</div></div>';
			optionString = optionString + '<div class="'+j+'optionAdd"></div>';
			$('#Q'+ j + " > .options" ).replaceWith(optionString);
			
			/*
			$('#Q'+ j ).append('<br><div class="row" id="optionSettings'+ j +'"><div class="col-lg-6">'+
			'<label id="OptionsMCSA'+ j +'">Options'+ j +' Settings</label>'+
			'<input type="text" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
				'</div>'+
			'</div>');
			*/
		}
		
		/*
		This should be done through adding questions.
		- this is for adding extra options without changing options.
		for(var i = 1; i <= number; i++) {
			var counts = $("[id^="+i+"OptionCount]").length;
			var NextQString = '<label for="">Question'+ i +'\'s next</label>';
			for(var t = 1; t <= counts; t++) {
				var nextHTML = ("#"+i+'qNext'+t).html();
				var AnswerVal = ("#"+i+'Answer'+t).val();
				NextQString = NextQString + UpdateDropDown(i, number, nextHTML);
				NextQString = NextQString + '<input type="text" id="'+i+'Answer'+ t +'" class="form-control" name="'+ i +'Answer'+ t +'" value="'+AnswerVal+'">';
			}
			$('.SequenceQDorp'+i+'').html(NextQString);
		}
		*/
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
	
	$('[id^=AddOption]').click(function() {
		var i = $(this).attr("id").replace('AddOption', '');
		console.log("triggered"+i);
		$("."+ i+"optionAdd").load("sites/all/themes/evolve/Survey/OptionTest.inc.php", function() {console.log("Load was performed.");});
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
		/*
		Remove this for now.
		It will destroy the software. Need more time for investigate
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
		*/
		//alert("Number is: "+counts);
	});
	
	$('[id^=label]').click(function() {
		var i = $(this).attr("id").replace('label', '');
		$('#question'+ i).removeClass("display-none");
		   
	});
	$('[id^=question]').click(function() {
		var i = $(this).attr("id").replace('question', '');
		$('#question'+ i).addClass("display-none");
		   
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
	var NextOption = '<select class="form-control" id="'+CurrentQ+'qNext'+NthOption+'" name="'+CurrentQ+'qNext'+NthOption+'">';
	NextOption = NextOption + '<option value="0">No further options</option>';
	var num = 0;
	for(var i = CurrentQ; i < numberQ; i++) {
		num = i + 1;
		if(num == (CurrentQ+1)) {
			NextOption = NextOption + '<option value="'+num+'">'+num+'</option>';
		} else {
			NextOption = NextOption + '<option value="'+num+'">'+num+'</option>';
		}
	}
	NextOption = NextOption + '</select>';
	return NextOption;
}

/* Update Next qeustion dropdown list */
function UpdateDropDown(CurrentQ, numberQ, NthOption ,Selected) {
	var NextOption = '<select class="form-control" id="'+CurrentQ+'qNext'+NthOption+'" name="'+CurrentQ+'qNext'+NthOption+'">';
	NextOption = NextOption + '<option value="0">No further options</option>';
	var num = 0;
	for(var i = CurrentQ; i < numberQ; i++) {
		num = i + 1;
		if(num == (Selected)) {
			NextOption = NextOption + '<option value="'+num+'" selected>'+num+'</option>';
		} else {
			NextOption = NextOption + '<option value="'+num+'">'+num+'</option>';
		}
	}
	NextOption = NextOption + '</select>';
	return NextOption;
}