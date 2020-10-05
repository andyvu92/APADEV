<div class="MainQuestionHolder">
<div class="SectionHolder">
<div class="activated" id="Sections1">
<h2>Find out<br />
which membership type<br />
you are:</h2>

<div class="buttons main">
<div class="next">Get started &gt;</div>
</div>
</div>

<div id="Sections2" style="display: none;"><?php apa_function_surveyquestionslist_form(); ?>
<div class="buttons main">
<div id="resetQuestion">Reset questions</div>

<div class="next hide">Get started &gt;</div>
</div>
</div>

<div id="Sections3" style="display: none;">
<div id="ProrataExplaination" style="display:none;">&nbsp;
<span class="close-popup"></span>
<div class="modal-header">
<h4>About pro-rata price</h4>
</div>

<div class="modal-body">
<p>APA membership is valid from 1 January to 31 December. If you are joining the APA during the year, you are charged a reduced pro-rata price to cover your membership from the month you join until the end of the calendar year.</p>
</div>
</div>

<h2>Your membership is:</h2>

<div class="MPcontainer"><?php echo views_embed_view('membership_type', 'block');?></div>

<div class="buttons main">
<div class="prev">Go back</div>

<div class="next">Proceed</div>
</div>
</div>

<div id="Sections4" style="display: none;">
<h2>Now, let's choose your National Groups</h2>

<div class="MPcontainer">Join an APA National Group to connect with physiotherapists working in similar areas to keep up to date with the latest research and developments.
<div class="MTcontentTitle">Here's the full list of National Groups, select which groups suit you:</div>
<?php
 apa_function_NationalGroupsMT_form();
?></div>

<div class="buttons main">
<div class="prev">Go back</div>

<div class="next">Proceed</div>
</div>
</div>

<div id="Sections5" style="display: none;">
<h2>Let's get started</h2>

<div class="MPcontainer">
<div class="MTcontentTitle">You've chosen to join the APA as a</div>

<div id="chosenTypeName">&nbsp;</div>

<div class="sep">&nbsp;</div>

<div class="MTcontentTitle">You've also added the following National Groups to your membership:</div>

<div id="chosenNGName">Not selected</div>

<div class="sep">&nbsp;</div>

<div class="MTcontentTitle">Total</div>

<div id="totalCost">&nbsp;</div>

<div id="chosenType" style="display: none;">&nbsp;</div>

<div id="chosenNG" style="display: none;">&nbsp;</div>

<div id="chosenTid" style="display: none;">&nbsp;</div>

<div id="chosenNGid" style="display: none;">&nbsp;</div>
</div>

<div class="buttons main">
<div class="prev">Go back</div>

<div class="restart">Start again</div>

<div class="Join">
<form action="/jointheapa" method="POST" name="joinQuestionForm">
<input class="TidPAss" name="MT" style="display: hidden" type="hidden" value="" />
 <input class="NGidPAss" name="NG" style="display: hidden" type="hidden" value="" />
<button type="submit">Join now</button>
</form>

</div>
</div>
</div>
</div>
</div>
