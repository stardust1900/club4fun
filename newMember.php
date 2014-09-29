<?php
    include 'header.php';
?>
<P>
<H2>New Member:</H2>
<P>
<form method="post" action="addMember.php">
<input type="text" maxlength="255" size="30" name="name" />
<input type = "submit" value="Add Member"  />
</form>
<?php 
    include 'footer.php';
?>