
<?php
$QuestionList = ListQuestions(1);
print_r($QuestionList);
?>


  <?php  for($i=0; $i<sizeof($QuestionList); $i++):  ?>
   <div id="question<?php echo $QuestionList[$i][0]; ?>" class='question row <?php if($i!=0) echo "display-none";?>'>
        <div class="col-lg-12">
           <label class="questionLabel"><?php echo $QuestionList[$i][1]; ?></label>
           <input type="hidden" name="QID" value="<?php echo $QuestionList[$i][0]; ?>">
		</div>
        <div class="col-lg-12">
		    <?php foreach($QuestionList[$i][3] as $option)
			   echo '<label id="label'.$option[2].'" class="optionLabel">'.$option[1].'</label>';
			
			?>
		</div>
    </div>
  <?php endfor;?>
	
	

 
