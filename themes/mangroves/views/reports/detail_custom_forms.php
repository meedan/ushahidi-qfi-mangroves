<?php if (count($form_field_names) > 0) { ?>
<div class="report-custom-forms-text">
<table>
<?php
	foreach ($form_field_names as $field_id => $field_property)
	{
		if ($field_property['field_type'] == 8)
		{
			echo "</table>";

			if (isset($field_propeerty['field_default']))
			{
				echo "<div class=\"" . $field_property['field_name'] . "\">";
			}
			else
			{
				echo "<div class=\"custom_div\">";
			}

			echo "<h2>" . $field_property['field_name'] . "</h2>";
			echo "<table>";

			continue;
		}
		elseif ($field_property['field_type'] == 9)
		{
			echo "</table></div>";
			continue;
		}

		echo "<tr>";

		// Get the value for the form field
		$value = $field_property['field_response'];

		// Check if a value was fetched
		if ($value == "")
			continue;

		if ($field_property['field_type'] == 1 OR $field_property['field_type'] > 3)
		{
			// Text Field
			// Is this a date field?
			echo "<td><strong>" . html::specialchars($field_property['field_name']) . ": </strong></td>";
			echo "<td class=\"answer\">$value</td>";
			if ($field_property['field_name'] == 'SENSOR ID') {
			?>
			<tr><td>
                        <ul class="demo-streams clearfix unstyled" style="list-style: none; padding: 5px; font-weight: bold;">
                                <li class="demo-stream">Air <span class="stream-1"></span>&deg;C</li>
                                <li class="demo-stream">Water <span class="stream-2"></span>&deg;C</li>
                        </ul></tr></td>
                        <script>
                                var $feedid;
                                var $hasValue;
                                $.ajax({
				    type: 'GET',
				    url: 'http://api.cosm.com/v2/feeds?key=-72s90Uk4eCTIeEyL_YTFxF4ZQCSAKxRZmdsVTQ5OCtFaz0g&user=huslage&q=<?php echo $value; ?>',
				    dataType: 'json',
				    success: function(data) { 
					    $feedid = data.results[0].id;
					    if(typeof data.results[0].datastreams[0]['current_value']==='undefined'){
						$hasValue=false;}
				 	    else {$hasValue=true;}
				    },
				    data: {},
				    async: false
				});
                                // Set your API key first                                                              
                                cosm.setKey( "-72s90Uk4eCTIeEyL_YTFxF4ZQCSAKxRZmdsVTQ5OCtFaz0g" );                                                       
				if($hasValue) {
	                                $('.demo-streams .stream-1').cosm('live', { feed: $feedid, datastream: 'air' });      
        	                        $('.demo-streams .stream-2').cosm('live', { feed: $feedid, datastream: 'water' });
				} else {		
                                        $('.demo-streams .stream-1').html("--");
                                        $('.demo-streams .stream-2').html("--");
				};
                        </script>
			<?php
			}
		}
		elseif ($field_property['field_type'] == 2)
		{
			// TextArea Field
			echo "<td><strong>" . html::specialchars($field_property['field_name']) . ": </strong></td>";
			echo "<td class=\"answer2\">$value</tr>";
		}
		elseif ($field_property['field_type'] == 3)
		{
			echo "<td><strong>" . html::specialchars($field_property['field_name']) . ": </strong></td>";
			echo "<td class=\"answer3\">" . date('M d Y', strtotime($value)) . "</td>";
		}
		//echo "</div>";
		echo "</tr>";
	}
?>
</table>
</div>
<?php } ?>