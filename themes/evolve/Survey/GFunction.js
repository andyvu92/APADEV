/* Survey Javascript */

 jQuery(document).ready(function($) {
				
				 $('#addQuestion').click(function(){
					var number = Number($('#qnumber').val());
					var i = Number(number +1); 
					$('#qnumber').val(i); 
					$('#Q'+ number ).after('<br><div id="Q'+ i +'"><div class="row">'+
						 '<div class="col-lg-6">'+
							'<label for="">Question'+ i +' Title</label>'+
							'<input type="text" class="form-control" name="qTitle'+ i +'">'+
						'</div>'+
						'<div class="col-lg-6">'+
							'<label for="">Question'+ i +' Description</label>'+
							'<input type="text" class="form-control" name="qDescription'+ i +'">'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						 '<div class="col-lg-6">'+
							'<label for="">Question'+ i +' Type</label>'+
							 '<select class="form-control" id="qType'+ i +'" name="qType'+ i +'">'+
											  '<option value="" selected disabled>Question Type</option><option value="1">T/F</option>'+
											  '<option value="2">Multiple Choice & Signle Answer</option>'+
											  '<option value="3">Multiple Choice & Multiple Answers</option>'+
											  '<option value="4">Open & End</option>'+
							'</select>'+
						'</div>'+
						
					
						 '<div class="col-lg-6">'+
							'<label>Is it mandatory?</label>'+
							'<select class="form-control" name="qMandatory'+ i +'">'+
											  '<option value="1">YES</option>'+
											  '<option value="0">NO</option>'+
							'</select>'+
						'</div>'+
					'</div><div class="row">'+
						 '<div class="col-lg-6">'+
							'<label for="">Question1 Is Sequence?</label>'+
							 '<select class="form-control" id="IsSequence'+ i +'">'+
											  '<option value="1">YES</option>'+
											  '<option value="0" selected>NO</option>'+
							'</select>'+
						'</div>'+
						 
					'</div></div>');	
					});
			 $('body').on('change', '[id^=qType]', function() {
					var j = $(this).attr("id").replace('qType', ''); 
                    if(($('#OptionsTF'+ j ).text().length ===0) && $('#qType'+ j ).val()=="1"){
					  $('#Q'+ j ).append('<br><div class="row" id="optionSettings'+ j +'"><div class="col-lg-6">'+
					'<label id="OptionsTF'+ j +'">Options'+ j +' Settings</label>'+
					'<input type="text" class="form-control" name="oValue'+ j +'.1" placeholder="OptionValue" value="TRUE">'+
					'<input type="text" class="form-control" name="oValue'+ j +'.2" placeholder="OptionValue" value="False">'+
						'</div>'+
			        '</div>');
				   }
                   			   
				    if(($('#OptionsMCSA'+ j ).text().length ===0)&&$('#qType'+ j).val()=="2"){
					  $('#Q'+ j ).append('<br><div class="row" id="optionSettings'+ j +'"><div class="col-lg-6">'+
					'<label id="OptionsMCSA'+ j +'">Options'+ j +' Settings</label>'+
					'<input type="text" class="form-control" name="oValue'+ j +'" placeholder="OptionValue">'+
						'</div>'+
			        '</div>');
				   }
				    
				  
				}); 		  
});
