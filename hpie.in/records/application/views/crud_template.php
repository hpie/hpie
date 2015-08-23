<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

<?php
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<!-- Beginning header -->
    <div>
        <a href='<?php echo site_url('main/centers')?>'>Centers</a> |
        <a href='<?php echo site_url('main/centerContacts')?>'>Center Contacts</a> |
        <a href='<?php echo site_url('main/centerTransact')?>'>Center Details</a> |
        <a href='<?php echo site_url('main/centerFacility')?>'>Center Facility</a> |
        <a href='<?php echo site_url('main/centerAssets')?>'>Center Assets</a> |
        <a href='<?php echo site_url('main/centerFaculty')?>'>Center Faculty</a> |
        <a href='<?php echo site_url('main/students')?>'>Manage Students</a> |
        <a href='<?php echo site_url('main/courses')?>'>Manage Courses</a> |
        <a href='<?php echo site_url('main/enrollments')?>'>Enroll Students</a>

    </div>
<!-- End of header-->
    <div style='height:20px;'></div>
    <div>
        <?php echo $output; ?>

    </div>
<!-- Beginning footer -->
<div>Footer</div>
<!-- End of Footer -->
</body>
</html>