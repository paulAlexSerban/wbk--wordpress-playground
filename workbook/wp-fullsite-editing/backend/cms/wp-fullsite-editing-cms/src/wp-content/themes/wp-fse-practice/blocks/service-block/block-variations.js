/**
 * Block Variations for Custom Fields Display
 * 
 * Registers block variations that can display custom field values
 * Using existing WordPress blocks - no build system required
 */

(function() {
    const CATEGORY_NAME = 'phoenix-art-school';

    if (!wp || !wp.blocks || !wp.data) {
        console.warn('WordPress blocks or data not available. Block variations not registered.');
        return;
    }

    const { registerBlockVariation } = wp.blocks;

    // /**
    //  * Service Details Block Variation
    //  * Creates a group block variation that displays service custom fields
    //  */
    // registerBlockVariation('core/group', {
    //     name: 'phoenix-service-details',
    //     title: 'Service Details',
    //     description: 'Display service custom fields in a formatted layout',
    //     category: CATEGORY_NAME,
    //     icon: 'admin-tools',
    //     keywords: ['service', 'custom', 'fields', 'phoenix'],
    //     attributes: {
    //         className: 'phoenix-service-details-block'
    //     },
    //     scope: ['inserter'],
    //     isActive: ['className'],
    //     innerBlocks: [
    //         ['core/heading', {
    //             level: 3,
    //             content: 'Service Information',
    //             style: {
    //                 color: {
    //                     text: '#007cba'
    //                 }
    //             }
    //         }],

    //         ['core/paragraph', {
    //             content: '<strong>Price:</strong> <span class="phoenix-field" data-field="service_price">[Service Price]</span>'
    //         }],
    //         ['core/buttons', {}, [
    //             ['core/button', {
    //                 text: 'Enroll Now',
    //                 backgroundColor: 'vivid-cyan-blue',
    //                 textColor: 'white'
    //             }]
    //         ]]
    //     ]
    // });

    /**
     * Query Loop Template for Services
     */
    // registerBlockVariation('core/query', {
    //     name: 'phoenix-services-loop',
    //     title: 'Services Query Loop',
    //     description: 'Display a list of services with custom fields',
    //     category: CATEGORY_NAME,
    //     icon: 'admin-tools',
    //     keywords: ['services', 'loop', 'query', 'phoenix'],
    //     attributes: {
    //         query: {
    //             postType: 'services',
    //             perPage: 6,
    //             offset: 0,
    //             order: 'desc',
    //             orderBy: 'date'
    //         }
    //     },
    //     scope: ['inserter'],
    //     innerBlocks: [
    //         ['core/post-template', {}, [
    //             ['core/group', {
    //                 style: {
    //                     spacing: { 
    //                         padding: {
    //                             top: 'var:preset|spacing|30',
    //                             bottom: 'var:preset|spacing|30',
    //                             left: 'var:preset|spacing|30',
    //                             right: 'var:preset|spacing|30'
    //                         }
    //                     }
    //                 },
    //                 backgroundColor: 'base',
    //                 className: 'service-loop-item'
    //             }, [
    //                 ['core/post-title', {
    //                     level: 3,
    //                     isLink: true,
    //                     style: {
    //                         color: {
    //                             text: '#007cba'
    //                         }
    //                     }
    //                 }],

    //                 ['core/paragraph', {
    //                     content: '<strong>Price:</strong> <span class="phoenix-field" data-field="service_price">[Price]</span>',
    //                     className: 'phoenix-meta-field-display'
    //                 }],
    //                 ['core/post-excerpt'],
    //                 ['core/read-more']
    //             ]]
    //         ]],
    //         ['core/query-pagination', {}, [
    //             ['core/query-pagination-previous'],
    //             ['core/query-pagination-numbers'],
    //             ['core/query-pagination-next']
    //         ]],
    //         ['core/query-no-results', {}, [
    //             ['core/paragraph', {
    //                 content: 'No services found.'
    //             }]
    //         ]]
    //     ]
    // });

    /**
     * Register block category for Phoenix Art School
     * This ensures our variations appear in a dedicated category
     */
    wp.blocks.setCategories([
        ...wp.blocks.getCategories(),
        {
            slug: CATEGORY_NAME,
            title: 'Phoenix Art School Services',
            icon: 'art'
        }
    ]);

})();
