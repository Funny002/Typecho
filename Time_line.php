<?php
/**
 * Time_line
 * 
 * @package custom
 */
?>
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
