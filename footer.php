<footer>
	<div class="footer row">
		<div class="col-5">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Pied de page')):?><?php endif ?>
		</div>
		<div class="col-6 menuFooterContainer">
			<?php wp_nav_menu(array('theme_location'=>'Menu footer', 'menu_class'=>'menu-footer'));?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= get_template_directory_uri() ?>/script.js"></script>
</body>
</html>
