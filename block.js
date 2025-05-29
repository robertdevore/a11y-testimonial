(function() {
	const { __ } = wp.i18n;
	const { registerBlockType } = wp.blocks;
	const { RichText } = wp.blockEditor;

	registerBlockType('a11y/testimonial', {
		edit({ attributes, setAttributes }) {
			const { quote, author, company } = attributes;

			return wp.element.createElement(
				'section',
				{ className: 'a11y-testimonial-block' },
				wp.element.createElement(
					'label',
					{ className: 'screen-reader-text', htmlFor: 'testimonial-quote' },
					__('Testimonial Quote', 'a11y-testimonial')
				),
				wp.element.createElement(RichText, {
					tagName: 'p',
					id: 'testimonial-quote',
					value: quote,
					onChange: (value) => setAttributes({ quote: value }),
					placeholder: __('Enter testimonial quote...', 'a11y-testimonial')
				}),
				wp.element.createElement(
					'label',
					{ className: 'screen-reader-text', htmlFor: 'testimonial-author' },
					__('Author Name', 'a11y-testimonial')
				),
				wp.element.createElement(RichText, {
					tagName: 'strong',
					id: 'testimonial-author',
					value: author,
					onChange: (value) => setAttributes({ author: value }),
					placeholder: __('Author name...', 'a11y-testimonial')
				}),
				wp.element.createElement(
					'label',
					{ className: 'screen-reader-text', htmlFor: 'testimonial-company' },
					__('Company Name (optional)', 'a11y-testimonial')
				),
				wp.element.createElement(RichText, {
					tagName: 'span',
					id: 'testimonial-company',
					value: company,
					onChange: (value) => setAttributes({ company: value }),
					placeholder: __('Company name...', 'a11y-testimonial')
				})
			);
		},

		save() {
			// Dynamic block — rendering handled in PHP
			return null;
		}
	});
})();
