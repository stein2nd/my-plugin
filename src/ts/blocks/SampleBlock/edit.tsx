import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import React from 'react';

export default function Edit() {
    const blockProps = useBlockProps();

    return (
        <div {...blockProps}>
            <p>{__('Hello from the block editor!', 'my-plugin')}</p>
        </div>
    );
}