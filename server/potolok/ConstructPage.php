<?php


class ConstructPage {

	public $blocks = '';

	function __construct( $blocks ) {
		$this->blocks = $blocks;
	}

	function blocksAssembly () {
		foreach ($this->blocks as $block) {
			if ($block['service-blocks-wrap-select'] == 'form') {
				echo get_template_part('template-parts/form');
				continue;
			}

			if ($block['service-blocks-wrap-select'] == 'how-we-work') {
				echo get_template_part('template-parts/service', 'how-we-work');
				continue;
			}

			if ($block['service-blocks-wrap-select'] == 'we-in-number') {
				echo get_template_part('template-parts/service', 'we-in-number');
				continue;
			}

			$param = array('data' => $block);
			echo get_template_part('template-parts/service', $block['service-blocks-wrap-select'], $param);
		}
	}


	function debugShowFields() {
		get_pr( $this->blocks );
	}

}