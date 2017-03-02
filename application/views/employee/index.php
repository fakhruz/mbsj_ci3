<?php
/**
 * Created by PhpStorm.
 * User: fakhruzzaman
 * Date: 01/03/17
 * Time: 11:32 AM
 */?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 well">
        <?php
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("employee/search", $attr);?>
        <div class="form-group">
            <div class="col-md-6">
                <input class="form-control" id="employee_name" name="employee_name" placeholder="Search for Employee Name..." type="text" value="<?php echo set_value('book_name'); ?>" />
            </div>
            <div class="col-md-6">
                <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                <a href="<?php echo base_url(). "index.php/employee/index"; ?>" class="btn btn-primary">Show All</a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php

$template = array(
    'table_open' => '<table class="table table-border">'
);

$this->table->set_template($template);

$this->table->set_heading('Id', 'Firstname', 'Lastname');

if(sizeof($employee) > 0) {
    foreach($employee as $re) {
        $this->table->add_row($re->id, $re->first_name, $re->last_name);
    }
}

echo $this->table->generate();

?>
<p><?php echo $links; ?></p>
