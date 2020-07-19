<?php

if(!isset($person)) {
  redirect_to(url_for('/staff/patients/index.php'));
}
?>

<form class="user">
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      First Name 
      <input type="text" name="fname" class="form-control form-control-user" value="<?php html( h($person['fname']) ); ?>" placeholder="">
    </div>
    <div class="col-sm-6">
       Middle Name 
      <input type="text" name="mname" class="form-control form-control-user"  value="<?php html( h($person['mname']) ); ?>" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
       Last Name 
      <input type="text" name="lname" class="form-control form-control-user" value="<?php html( h($person['lname']) ); ?>" placeholder="">
    </div>
    <div class="col-sm-6">
        Mobile Number
      <input type="text" name="mobile_number" class="form-control form-control-user" value="<?php echo html( h($person['mobile_number']) ); ?>" placeholder="">
    </div>
  </div>
  <div class="form-group">
     Address
    <input type="text" name="address" class="form-control form-control-user" value="<?php html( h($person['address']) ); ?>" placeholder="">
  </div>
  <div class="form-group">  
    Details                                          
    <textarea id="w3review" name="details" class="form-control form-control-user" value="<?php html( h($person['details']) ); ?>" ><?php html( h($person['details']) ); ?></textarea>
  </div>

 <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">                         
      <div class="dataTables_length" id="dataTable_length">
         <label>
            Status 
            <select aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
              <?php foreach(Person::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
                <option value="<?php echo $cond_id; ?>" <?php // if($person->status == $cond_id) { echo 'selected'; } ?> ><?php echo $cond_name; ?></option>
              <?php } ?>
            </select>
         </label>
      </div>
    </div>
  </div>
  <hr> 
</form>