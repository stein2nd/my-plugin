declare module '@wordpress/block-editor' {
    import type { HTMLAttributes } from 'react';

    type BlockProps = HTMLAttributes<HTMLElement> & Record<string, unknown>;

    export function useBlockProps(props?: BlockProps): BlockProps;

    export namespace useBlockProps {
        function save(props?: BlockProps): BlockProps;
    }
}
