import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import React from 'react'

export default function Save() {
    const blockProps = useBlockProps();
    
    return (
        <div {...blockProps}>
            <p>{__('Hello from the front-end!', 'my-plugin')}</p>
        </div>
    );
}