<?php


class ConstructPage {

	public $blocks = '';

	function __construct( $blocks, $turbo ) {
		$this->blocks = $blocks;
		$this->turbo = $turbo;
	}

	function blocksAssembly () {
		foreach ($this->blocks as $block) {
			if (!$this->turbo) {
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
			}


			$param = array('data' => $block, 'turbo' => $this->turbo);
			echo get_template_part('template-parts/service', $block['service-blocks-wrap-select'], $param);
		}
	}


	function debugShowFields() {
		get_pr( $this->blocks );
	}

}