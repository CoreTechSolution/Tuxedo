<?php /* Template Name: Plan Your Event */ ?>
<?php get_header(); ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12"> 
                <div class="container">
                    <h1 class="innerSectionHeader"><?php the_title(); ?></h1>
                    <p style="text-align: center;">We need your event details to plan and prepare your order.</p>
                    <form id="forms" method="post" action="<?php bloginfo('url'); ?>/checkout/">
                        <div class="section group">
                            <div class="col span_4_of_12"></div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>When is it?</label>
                                    <input type="text" id="datepicker1" name="event_date" placeholder="Choose a Date" />
                                </div>
                            </div>
                            <div class="col span_4_of_12"></div>
                        </div>
                        <div class="section group">
                            <div class="col span_4_of_12"></div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>What is the name of the event?</label>
                                    <input type="text" name="event_name" placeholder="Choose a Name" />
                                </div>
                            </div>
                            <div class="col span_4_of_12"></div>
                        </div>
                        <div class="section group">
                            <div class="col span_4_of_12"></div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>What type of event is it?</label>
                                    <select name="event_type">
                                        <option value="">Select Event Type</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Prom/Formal">Prom/Formal</option>
                                        <option value="Special Event">Special Event</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col span_4_of_12"></div>
                        </div>
                        <div class="section group">
                            <div class="col span_4_of_12"></div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <input type="submit" name="create_event" value="CREATE EVENT" />
                                </div>
                            </div>
                            <div class="col span_4_of_12"></div>
                        </div>
                    </form>
                </div>                         
	        </div>
	    </div>
	</div>
</div>
<script>
jQuery(document).ready(function(){
    jQuery('#forms').validate({
        rules: {
            event_date: {
                required: true
            },
            event_name: {
                required: true
            },
            event_type: {
                required: true
            }
        },
        messages: {
            
        }
    })
});
</script>
<?php get_footer(); ?>