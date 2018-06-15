<?php /* Template Name: Get States */ ?>
<?php
if(isset($_POST["country"])){
    $country = $_POST["country"];
    global $woocommerce;
    $states = $woocommerce->countries->get_states($country);
    //print_r($states);
    if(!empty($states)) {
?>
<div>
    <label>State/Province/County</label>
    <select name="state">
        <option>Select State/Province/County</option>
        <?php 
            $state_arr = $states;
            foreach($state_arr as $key=>$data) {
        ?>
        <option value="<?php echo $key; ?>"><?php echo $data; ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>
<?php } ?>