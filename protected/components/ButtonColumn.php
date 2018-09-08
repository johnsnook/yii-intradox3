<?php

Yii::import("booster.widgets.TbButtonColumn", true);

/**
 * ButtonColumn class file.
 * Extends {@link booster.widgets.TbButtonColumn}
 */
class ButtonColumn extends TbButtonColumn {

	/**
	 * Renders a link button.
	 * @param string $id the ID of the button
	 * @param array $button the button configuration which may contain 'label', 'url', 'imageUrl' and 'options' elements.
	 * See {@link buttons} for more details.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data object associated with the row
	 */
	protected function renderButton($id, $button, $row, $data) {
		if (isset($button['visible']) && !$this->evaluateExpression($button['visible'], array('row' => $row, 'data' => $data)))
			return;
		$label = isset($button['label']) ? $this->evaluateExpression($button['label'], array('data' => $data)) : $id;
		$url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
		$options = isset($button['options']) ? $button['options'] : array();
		if (!isset($options['title']))
			$options['title'] = $label;

		// Start of modification
		if (isset($options['evaluateOptions'])) {
			foreach ($options['evaluateOptions'] as $key => $value) {
				$options[$value] = $this->evaluateExpression($options[$value], array('data' => $data, 'row' => $row));
			}

			unset($options['evaluateOptions']);
		}
		if (isset($button['evalicon']))
			$button['icon'] = $this->evaluateExpression($button['evalicon'], array('data' => $data, 'row' => $row));
		// END of modifications

		if (isset($button['icon']) && $button['icon']) {
			if (strpos($button['icon'], 'icon') === false && strpos($button['icon'], 'fa') === false) {
				$button['icon'] = 'glyphicon glyphicon-' . implode('glyphicon-', explode(' ', $button['icon']));
			}
			echo CHtml::link('<i class="' . $button['icon'] . '"></i>', $url, $options);
		} else if (isset($button['imageUrl']) && is_string($button['imageUrl'])) {
			echo CHtml::link(CHtml::image($button['imageUrl'], $label), $url, $options);
		} else {
			echo CHtml::link($label, $url, $options);
		}
	}

}
