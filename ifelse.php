<?php
if ($condition):
do_something();
elseif ($another_condition):
do_something_else();
else:
do_something_different();
endif;
?>
<?php if ($condition): ?>
<p>Do something in HTML</p>
<?php elseif ($another_condition): ?>
<p>Do something else in HTML</p>
<?php else: ?>
<p>Do something different in HTML</p>
<?php endif; ?>