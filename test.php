<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Category = new category();
                        $categories = $Category->getAllCategory();
                        if ($categories) {
                            debugger($categories,true);
                        }
?>